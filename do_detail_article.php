<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detail</title>
        <link rel="stylesheet" href="/resource/app.css">
    </head>
    <body>
    <?php include_once 'dbLink.php';?>
        <?php

$sql_d= "
SELECT * 
FROM article
WHERE id = '{$_GET['id']}'
";
$rs = mysqli_query($dbLink, $sql_d);
$row = mysqli_fetch_assoc($rs);



?>

        <div class="container pop">
            <div class="left">
                Sticky note No.<?=$row['id']?>

            </div>
            <div class="left" style="font-size:20px; color:#696969;">
                <?=$row['regDate']?>
            </div>
            <br/>
            <div class="left">
                Writer _
                <?=$row['writer']?>
            </div>
            <p>
                <div>
                    제목 :
                    <?=$row['title']?>
                </div>

                <div>
                    <p>
                       <b> <?=nl2br($row['body'])?><b>
                    </div>
                    <p>
                        <div class="delete" style=" color:#696969;">
                            <a
                                href="javascript:;"
                                onclick="if ( confirm('삭제하겠습니까?') ) {location.replace('/check_pw.php?id=<?=$row['id']?>');}; ">삭제</a>
                            <!--onclick="if ( confirm('삭제하겠습니까?') )
                            {location.replace('/do_delete_article.php?id=<?=$row['id']?>');}; ">삭제</a>
                            onclick="window.open('/do_detail_article.php?id=<?=$row['id']?>','a','width=500,height=500,top=100,left=100');"
                            -->

                            &nbsp
                            <a href="/do_check_pw_for_modify.php?id=<?=$row['id']?>">수정</a>
                            <!--<a href="/do_check_pw_for_modify.php?id=<?=$row['id']?>&mt=<?=$_SERVER['REQUEST_TIME']?>">수정</a>-->
                            </div>
                                <br/>
                                <div class="pop">

                                    <input
                                        type="button"
                                        value="닫 기"
                                        onclick="self.close();"
                                        style="width: 70px; height:40px; font-size:15px;"/>

                                </div>
                                
                            </div>

                        </body>

                    </html>