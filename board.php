<?php include_once 'header.php';?>
<?php include_once 'dbLink.php';?>
<link rel="stylesheet" href="/resource/style.css">

<body>
<div class="article">
<?php
$sql = "
SELECT *
FROM article
ORDER BY id DESC
";
$rs = mysqli_query($dbLink, $sql);

$page = ($_GET["page"])?$_GET['page']:1; 
  
$list = 6; //한 페이지당 보이는 게시물의 갯수   
$total_record = mysqli_num_rows($rs); //게시물 총 갯수  
$block_cnt=5;  //보여줄 페이지 갯수  
$block_num = ceil($page / $block_cnt);    
$block_start = (($block_num-1)*$block_cnt)+1;    //시작번호  
$block_end = $block_start + $block_cnt -1;   //끝번호  

$total_page = ceil($total_record / $list); 

if($block_end > $total_page){
    $block_end = $total_page;
}
$total_block = ceil($total_page / $block_cnt);
$page_start = ($page -1)*$list;

$sql = "
SELECT *
FROM article
ORDER BY id DESC LIMIT $page_start, $list
";

$rs = mysqli_query($dbLink, $sql);
$rows = [];
while ( $row = mysqli_fetch_assoc($rs) ) {
    $rows[] = $row;
}
?>

    <?php include_once 'write_article.php';?>

    <hr/>
    
    <!-- 게시물 불러오기 시작 -->
    <?php foreach ( $rows as $row ) { ?>
        <aside class="note" aria-labelledby="note-title">
        
    <button
        type="button"
        class="container"
        onclick="window.open('/do_detail_article.php?id=<?=$row['id']?>','a','width=500,height=500,top=100,left=100');">
       
        <h3>no.<?=$row['id']?></h3>
        
      <!--7자이상 제목 자르기-->
            <?php  
                $str = $row['title']
                ?>
            <?php

                if(mb_strlen($str)>20){
                    $str = mb_substr($str,0,15,'UTF-8');  
                    $str.="..";
                }else{$str=$row['title'];
                }
                ?>

      <!--년-월-일까지만 나오게 날짜 자르기-->
            <?php   
                $save_date=$row['regDate'];
                $dataVal=substr($save_date,0,10); 
                ?>

    <ul>
       <li class="note-title">
        <span>Title:</span>
        <span><?=$str?></span>
       </li>

      <li class="note-writer">
        <span>Writer:</span>
        <span><?=$row['writer']?></span>
      </li>
      <br />
      <li class="note-regDate">
        <span>Date:</span>
        <span><?=$dataVal?></span>
      </li>

    </ul>
    </button>
    </aside>
    <?php } ?>



  <!--페이지-->
  <div style="text-align:center; font-weight:normal; font-size:1.5rem">

<?php 

if($page <= 1){
//빈값
}else{
echo"<a href='/board.php?page=1 '>처음&nbsp</a>";
}
if($page <=1){
//null
}else{
$pre = $page-1;
echo"<a href='/board.php?page=$pre'>◀이전&nbsp</a>";

}

for($i = $block_start; $i <= $block_end; $i++){
if($page == $i){
    echo"<b> [$i] </b>";
}else{
echo"<a href='/board.php?page=$i'>[$i]</a>";
}

}

if($page >= $total_page){
//null
}else {
$next = $page+1;
echo"<a href='/board.php?page=$next'>&nbsp다음▶</a>";
}
if($page >= $total_page){
//null
}else {
echo"<a href='/board.php?page=$total_page'>&nbsp끝</a>";
}
?>
</div>
 <!--검색-->
 <?php include_once 'search_article.php';?>
</div>
</div>

<?php include_once 'footer.php';?>