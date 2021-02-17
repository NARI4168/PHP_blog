<?php include_once 'header.php';?>

<div class="article">
<?php include_once 'dbLink.php';?>
<?php

$term = $_GET['term'];
$condition = $_GET['condition'];
$keyword = $_GET['keyword'];


$sql2 = "
SELECT *
FROM article
WHERE 
";

//term 조건 시작
$dateStr = "regDate > DATE_SUB(NOW(),INTERVAL $term) AND ";
if($term=="ALL"){
    $dateStr=" ";
}

$sql2 = $sql2.$dateStr;

//condition 조건 시작
//title&body를 &기준으로 쪼개기
$conditions = explode("&",$condition);
//$conditions의 배열 갯수(길이)
$count = count($conditions);

$sql2 = $sql2."(";
for($i = 0; $i < $count; $i++){
    $sql2 = $sql2.$conditions[$i]." LIKE '%$keyword%' ";
    if($i==$count-1){
        $sql2 = $sql2.")";
        break;
    }
    $sql2 = $sql2."OR ";
}

$sql2 = $sql2."ORDER BY id DESC";


$rs = mysqli_query($dbLink, $sql2);

//페이징
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

$sql2 = $sql2." LIMIT $page_start, $list";

$rs = mysqli_query($dbLink, $sql2);  
$rows = [];

while ( $row = mysqli_fetch_assoc($rs) ) {
    $rows[] = $row;
}

?>

<?php include_once 'write_article.php';?>

<hr/>

 <!--일치하는 게시물이 없을때 알려주기-->
<?php 
if ($rows==null) { ?>

    <script>
        alert('해당조건에 맞는 게시물이 없습니다.');
        location.replace('/board.php');
    </script>

 <?php
} ?>


<!-- 게시물 리스팅-->
<?php foreach ( $rows as $row ) { ?>
    <button
        type="button"
        class="sticky"
        onclick="window.open('/do_detail_article.php?id=<?=$row['id']?>','a','width=500,height=450,top=100,left=100');">
        <div class="list">
            <div class="no">
                no.
                <?=$row['id']?>
            </div>
            <br/>
            <div>
                <!--7자이상 제목 자르기-->
                <?php  
                $str = $row['title']
                ?>
            <?php

                if(mb_strlen($str)>7){
                    $str = mb_substr($str,0,5,'UTF-8');  
                    $str.="..";
                }else{$str=$row['title'];
                }
                ?>

                제목 :
                <?=$str?>

            </div>
            <br/>
            <div class="writer">
                <?=$row['writer']?>
            </div>

            <div class="date">
                <!--년-월-일까지만 나오게 날짜 자르기-->
                <?php   $save_date=$row['regDate'];
            $dataVal=substr($save_date,0,10);  ?>

                <?=$dataVal?>
            </div>
        </div>
    </button>
    <?php } ?>
    <!--페이지-->
    <div style="text-align:center; font-weight:normal;">

    <?php 

if($page <= 1){
    //빈값
}else{
    echo"<a href='/do_search_article.php?term=$term&condition=$condition&keyword=$keyword&page=1 '>처음&nbsp</a>";
}
if($page <=1){
    //null
}else{
    $pre = $page-1;
    echo"<a href='/do_search_article.php?term=$term&condition=$condition&keyword=$keyword&page=$pre'>◀이전&nbsp</a>";

}

 for($i = $block_start; $i <= $block_end; $i++){
    if($page == $i){
        echo"<b> [$i] </b>";
}else{
    echo"<a href='/do_search_article.php?term=$term&condition=$condition&keyword=$keyword&page=$i'>[$i]</a>";
}

 }

if($page >= $total_page){
    //null
}else {
    $next = $page+1;
    echo"<a href='/do_search_article.php?term=$term&condition=$condition&keyword=$keyword&page=$next'>&nbsp다음▶</a>";
}
if($page >= $total_page){
    //null
}else {
    echo"<a href='/do_search_article.php?term=$term&condition=$condition&keyword=$keyword&page=$total_page'>&nbsp끝</a>";
}
?>
    </div>
     <!--검색-->
     <?php include_once 'search_article.php';?>
</div>

    </div>

<?php include_once 'footer.php';?>