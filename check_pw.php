<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Check_Password</title>
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

?>

        <div class="container pop">

            <form method="POST" action="do_check_pw.php">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="center"></div>
                비밀번호를 입력해주세요
                <div class="center" style="padding : 100px 0 0 150px">

                    <input
                        style="width:200px; height:40px; font-size:50px; display:block; text-align: center;"
                        maxlength="4"
                        type="password"
                        name="pw"
                        required="required">

                </div>
                <br/>
                <br/>
                <div>
                    <input style="font-weight:bold;" type="submit" value="확인">&nbsp&nbsp
                    <a href="/do_detail_article.php?id=<?=$row['id']?>">취소</a>
                </div>
            </form>
        </div>

    </body>

</html>