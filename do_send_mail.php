
<?php
 $toName = "admin"; 
 $toMail = "pnr0602@gmail.com"; 
 
 $subject = $_REQUEST['subject'];  //제목
 $content = $_REQUEST['content'];   //내용

 $fromName = $_REQUEST['name'];  //보내는이 이름
 $fromMail = $_REQUEST['email'];  //보내는이 메일주소

 $header = "From: ".$fromName." <".$fromMail.">\n";
 $header .= "To: ".$toName." <".$toMail.">\n";
 $header .= "Content-Type: text/html;charset=utf-8\n";

$result=mail($toMail, $subject, $content, $header);

if($result){?>
    <script>
      alert('Mail has been sent');
      self.close();
    </script>
<?php
 }else  {
?>
    <script>
      alert('Error: Send Mail Failed to Send');
      self.close();
    </script>
<?php
}

?>
