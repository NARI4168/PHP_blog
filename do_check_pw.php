<?php include_once 'dbLink.php';?>
<?php
$_REQUEST['id'] = mysqli_real_escape_string($dbLink, $_REQUEST['id']);
$_REQUEST['pw'] = mysqli_real_escape_string($dbLink, $_REQUEST['pw']);

$sql = "
SELECT * 
FROM article
WHERE id = '{$_REQUEST['id']}'
";
$rs = mysqli_query($dbLink, $sql);
$row = mysqli_fetch_assoc($rs);

?>

<?php

if($_REQUEST['pw']==$row['pw']) { ?>

<script>
    alert('<?=$_REQUEST['id']?>번 글이 삭제되었습니다.');
    location.replace('/do_delete_article.php?id=<?=$_REQUEST['id']?>');
</script>

<?php
} 

else {

    ?>

<script>
    alert('비밀번호를 확인해 주세요');
    document
        .location
        .replace('/check_pw.php?id=<?=$_REQUEST['id']?>');
</script>

<?php
 } 
?>