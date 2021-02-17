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

<script>
    var temp = 1;
    var pass = prompt('비밀번호를 입력해주세요.');



    //비밀번호 입력 기회는 3번으로 
    while (temp < 3) {   
     
    //비밀번호가 맞으면 수정페이지로 넘기기
    if (pass == "<?=$row['pw']?>" ) {
        document.location.replace('/modify_article.php?id=<?=$_REQUEST['id']?>');
        break;
    }
    //취소버튼 눌렀을때 이전페이지로!
    if(pass == null){
        temp = 3;
        break;
    }
    //틀릴때마다 1씩 카운터가 된다.
    temp+=1;
    var pass = prompt('비밀번호를 확인 하시고 다시 입력해주세요. ('+ temp +'/3)');

    //마직막 3번째 기회일때 비밀번호가 맞으면 수정페이지로 넘어간다.
    if(temp==3 && pass == "<?=$row['pw']?>" ){
        document.location.replace('/modify_article.php?id=<?=$_REQUEST['id']?>');
        break;
    } 
  
    } 
    
    //비밀번호가 틀리면 이전페이지로 돌아가기 
    if (pass != "<?=$row['pw']?>") {
        alert('이전페이지로 돌아갑니다.');
        history.go(-1);
    }
   
</script>