<?php include_once 'dbLink.php';?>
<?php

$_REQUEST['title'] = mysqli_real_escape_string($dbLink, $_REQUEST['title']);
$_REQUEST['body'] = mysqli_real_escape_string($dbLink, $_REQUEST['body']);
$_REQUEST['id'] = mysqli_real_escape_string($dbLink, $_REQUEST['id']);

$sql = "
UPDATE article
SET title = '{$_REQUEST['title']}',
body = '{$_REQUEST['body']}'
WHERE id = '{$_REQUEST['id']}'
";

mysqli_query($dbLink, $sql);

?>

<script>

    alert('<?=$_REQUEST['id']?>번 글이 수정되었습니다.');
    //팝업창 새로고침
    document.location.replace('/do_detail_article.php?id=<?=$_REQUEST['id']?>');
    //부모창 새로고침
    opener.document.location.reload();

</script>