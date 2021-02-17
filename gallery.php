<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>gallery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="/resource/gallery.css">
<link rel="stylesheet" href="/resource/app.css">

</head>
<body>
<!--탑바-->
<div class="top-bar">
        <div class="con height-100p flex flex-jc-sb">
            <nav class="menu-box-1">
                <ul class="flex height-100p">
                    <li>
                        <a href="index.php" class="height-100p flex flex-ai-c">Home</a>
                    </li>
                    <li>
                        <a href="about_me.php" class="height-100p flex flex-ai-c">About Me</a>
                    </li>
                    <li>
                        <a href="board.php" class="height-100p flex flex-ai-c">Board</a>
                    </li>
                    <li>
                        <a href="gallery.php" class="height-100p flex flex-ai-c">Gallery</a>
                    </li>
                    <li>
                        <a href="contact.php" class="height-100p flex flex-ai-c">Contact</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

<!-- 사진올리기 -->

<a onclick="window.open('/upload.php','_blank','width=500,height=500,top=100,left=100');" class="upload">사진올리기&nbsp
<i class="fas fa-file-upload"></i>
</a>


<!--사진 불러오기-->
<?php include_once 'dbLink.php';?>
<?php

$sql= "
SELECT * 
FROM upload_file
ORDER BY regDate ASC
";

$rs = mysqli_query($dbLink, $sql);
$rows = [];
while ( $row = mysqli_fetch_assoc($rs) ) {
    $rows[] = $row;
}
?>



<!--사진 리스팅-->
<div class="gallery_box"> 
    <div class="menu">
    <div class="menu--wrapper">

    <?php foreach ( $rows as $row ) {  $image=$row['name_save'];?>
    
        <button onclick="window.open('/view.php?id=<?=$row['id']?>','a','width=500,height=500,top=100,left=100');">
    <div class="menu--item">
      <figure><img src="data/<?=$image?>" alt="" /></figure>
    </div>
    </button>
     
    <?php } ?>

    </div>
    </div>

</div>
<!--풋바-->
<div class="foot">
ⓒ2021.UNKWN.NOV🍁 All rights reserved. &nbsp
<a href="#">
    <i class="far fa-envelope"></i>
</a>&nbsp&nbsp
<a href="#">
    <i class="fab fa-instagram"></i>
</a>
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
