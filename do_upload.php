<?php include_once 'dbLink.php';?>
<?php


if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {

    $file = $_FILES['upfile'];
    $upload_directory = 'data/';
    $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
    $allowed_extensions = explode(',', $ext_str);
    $max_file_size = 5242880;
    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

    // 확장자 체크
    if(!in_array($ext, $allowed_extensions)) {
        echo "업로드할 수 없는 확장자 입니다.";
    }

    // 파일 크기 체크
    if($file['size'] >= $max_file_size) {
       echo "5MB 까지만 업로드 가능합니다.";
    }

    $path = md5(microtime()) . '.' . $ext;

    if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
        $sql = "
        INSERT INTO upload_file (id, `name`, name_save, regDate)
        VALUES(?,?,?,now())
        ";

        $id = md5(uniqid(rand(), true));
        $name = $file['name'];
        $name_save = $path;

        $stmt = mysqli_prepare($dbLink,  $sql);
        $bind = mysqli_stmt_bind_param($stmt, "sss", $id, $name, $name_save);
        $exec = mysqli_stmt_execute($stmt);
      ?>
      
<script>
    alert('파일 업로드 성공!.');
    //부모창 새로고침
     opener.location.reload();
    //팝업창 닫기
     self.close();
   
</script>

<?php
    }
} else { 
?>
      
<script>
    alert('파일이 업로드에 실패하였습니다.');
    location.replace('/upload.php');
</script>

<?php
}
?>



