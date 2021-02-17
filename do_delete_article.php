<?php include_once 'dbLink.php';?>
<?php
$_REQUEST['id'] = mysqli_real_escape_string($dbLink, $_REQUEST['id']);

$sql = "
DELETE FROM article
WHERE id = '{$_REQUEST['id']}'
";
mysqli_query($dbLink, $sql);
?>
<script>
    //부모창 새로고침
    opener.location.reload();
    //팝업창 닫기
    self.close();
</script>