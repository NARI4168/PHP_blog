
<?php
 $toName = "admin"; //받는이 이름
 $toMail = "pnr0602@gmail.com"; //받는이 메일
 
 $subject = $_REQUEST['subject'];  //메일 제목
 $content = $_REQUEST['content'];   //메일 내용


 $fromName = $_REQUEST['name'];  //보내는이 이름
 $fromMail = $_REQUEST['email'];  //보내는이 메일


 $header = "From: ".$fromName." <".$fromMail.">\n";
 $header .= "To: ".$toName." <".$toMail.">\n";
 //$headers .= "X-Sender: <".$fromMail.">\n";
 //$headers .= "X-Mailer: PHP\n";
 //$headers .= "Reply-To: ".$fromName." <".$fromMail.">\n";
// $headers .= "MIME-Version: 1.0\n";
 $header .= "Content-Type: text/html;charset=utf-8\n";

/*

$headers .= "To: ".  $tomail_name  ." <".  $mail_addr  .">\r\n";
$headers .= "Reply-To: ".$se_name." <".$se_email.">\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-MSMail-Priority: High\r\n";
$headers .= "X-Mailer: Just My Server"; 

*/

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
