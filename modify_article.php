<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Modify</title>
        <link rel="stylesheet" href="/resource/app.css">
    </head>
    <body>
    <?php include_once 'dbLink.php';?>
        <?php

$_REQUEST['id'] = mysqli_real_escape_string($dbLink, $_REQUEST['id']);

$sql = "
SELECT * 
FROM article
WHERE id = '{$_GET['id']}'
";
$rs = mysqli_query($dbLink, $sql);
$row = mysqli_fetch_assoc($rs);

session_cache_limiter('private');

?>


<div class="container">

<form method="POST" action="do_modify_article.php">

    <input type="hidden" name="id" value="<?=$row['id']?>">

    <div style="padding : 20px 0 10px 0">
    <div style="font-size:30px; font-weight:bold; text-align: center; color:black;">
    No_<?=$row['id']?>  수정하기</div><p >
    <div style="font-size:20px; color:black; padding : 10px 0 5px 20px">
  
    아이디 : <b> <?=$row['writer']?> </b></div>

    <div style=" padding : 10px 0 5px 20px">
        <input
            style="width:95%; height:40px; font-size:20px; display:inline-block; border:double;"
            type="text"
            name="title"
            autocomplete="off"
            placeholder="<?=$row['title']?>"
            value="<?=$row['title']?>"
            required="required">
            <p> 
            <textarea
                style="width:95%; height:200px; font-size:20px; display:inline-block; border:double;"
                name="body"
                autocomplete="off"
                placeholder="<?=$row['body']?>"
                required="required"><?=$row['body']?></textarea>

        </div>
        </div>

    
        <div style="font-size:20px; text-align: center; padding : 0 0 0 0">

            <input type="submit" style=" color:black;" value="수정">&nbsp&nbsp
            <a href="/do_detail_article.php?id=<?=$row['id']?>"  style=" color:black;">취소</a>
        </div>
    </form>

</div>


</body>

</html>

