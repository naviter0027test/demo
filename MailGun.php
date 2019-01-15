<?php
//程式可以用，但mailgun要綁信用卡才能免費寄到一萬封

define('MAILGUN_URL', 'https://api.mailgun.net/v3/mailgun.axcell28.idv.tw');
define('MAILGUN_KEY', 'bc3bcb90f4fa9368188d6378c7b189d2-b892f62e-d2015ff9');

if(file_exists("../srvLib/PHPMailer-master/class.smtp.php")) 
    include_once("../srvLib/PHPMailer-master/class.smtp.php");
else
    include_once("srvLib/PHPMailer-master/class.smtp.php");
if(file_exists("../srvLib/PHPMailer-master/class.phpmailer.php")) 
    include_once("../srvLib/PHPMailer-master/class.phpmailer.php");
else
    include_once("srvLib/PHPMailer-master/class.phpmailer.php");

function sendMail($mailto, $contentTitle, $contentBody) {
    $fromMail = "postmaster@sandbox875fa4643fe54b8dacf087e31458e512.mailgun.org";

    /*
    $arrData = array(
        'from' => "System". "<$fromMail>",
        'to' => $mailto,
        'subject' => $contentTitle,
        'html' => $contentBody,
        'text' => $contentBody,
        'o:tracking' => 'yes',
        'o:tracking-clicks' => 'yes',
        'o:tracking-opens' => 'yes',
    );
    $session = curl_init(MAILGUN_URL. '/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($session, CURLOPT_USERPWD, 'api:'. MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $arrData);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
    $result = json_decode($response, true);
    print_r($result);
     */

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;


    $mail->WordWrap = 50;

    $mail->IsHTML(true);

    $mail->Username = $fromMail;
    $mail->Password = "4b909327c95a99504a6f187d0f36886c-b892f62e-a35c227d";
    $mail->FromName = "System";
    $mail->From = $fromMail;

    $mail->Subject = $contentTitle;
    $mail->Body = $contentBody;
    $mail->AltBody = "信件內容";
    $mail->CharSet = "utf-8";
    $mail->Host = "smtp.mailgun.org";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";
    $mail->AddAddress($mailto, "Sys");

    if(!$mail->Send()){
        throw new Exception ("send mail error : " . $mail->ErrorInfo);
        //如果有錯誤會印出原因
    }
    else{ 
        return "send success";
    }
}
