<?php include_once 'dbLink.php';?>
<?php

$_REQUEST['writer'] = mysqli_real_escape_string($dbLink, $_REQUEST['writer']);
$_REQUEST['pw'] = mysqli_real_escape_string($dbLink, $_REQUEST['pw']);
$_REQUEST['title'] = mysqli_real_escape_string($dbLink, $_REQUEST['title']);
$_REQUEST['body'] = mysqli_real_escape_string($dbLink, $_REQUEST['body']);

$sql = "
INSERT INTO article
SET regDate = NOW(),
title = '{$_REQUEST['title']}',
body = '{$_REQUEST['body']}',
pw ='{$_REQUEST['pw']}',
writer ='{$_REQUEST['writer']}'
";
mysqli_query($dbLink, $sql);

?>
<script>
    alert('새 글이 작성되었습니다.');
    location.replace('/board.php');
</script>
