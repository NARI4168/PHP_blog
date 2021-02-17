<table border="1">

<tr>
	<th>업로드된 파일</th>
</tr>
<?php include_once 'dbLink.php';?>
<?php

$sql = "
SELECT * 
FROM upload_file 
ORDER BY regDate DESC";

$rs = mysqli_query($dbLink, $sql);

while($row = mysqli_fetch_assoc($rs)) {

?>

<tr>
<!--
  <td><?= $row['id'] ?></td>-->

  <td><a href="/test.php?id=<?=$row['id']?>"><?= $row['name'] ?></a></td>

<!--  <td><?= $row['name_save'] ?></td>-->

</tr>

<?php

} 



//mysqli_free_result($result); 

//mysqli_stmt_close($stmt);

//mysqli_close($db_conn);

?>

</table>



