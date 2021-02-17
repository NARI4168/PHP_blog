<?php include_once 'dbLink.php';?>
<?php

$sql= "
SELECT * 
FROM upload_file 
WHERE id = '{$_GET['id']}'
";

$rs = mysqli_query($dbLink, $sql);
$row = mysqli_fetch_assoc($rs);
   
$image=$row['name_save'];
//echo "$image";

//echo "<img src ='data/$image'>";

?>

<img src="data/<?=$image?>" width="100%" height="100%"/>
