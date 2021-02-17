<?php
 //$mailto="받는주소";
 $mailto="pnr0602@gmail.com";
 $subject="mail test";
 $content="test";
 $result=mail($mailto, $subject, $content);
 if($result){
  echo "mail success";
  }else  {
  echo "mail fail";
 }
?>
