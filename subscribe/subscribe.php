<?php
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "shubhamshinde9530@gmail.com";
    $mail->Password = "cumgyjqwcuhwkjil";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail-> isHTML(true);
    $mail-> setFrom($email, $firstname);
    $mail->addAddress($email);
    $mail->Subject = ("ASDR Infotech");
    $mail->Body = "Dear " . $email . " Thanks for connecting with ASDR Infotech." . "<br>";


    if ($mail->send()) {
        $status = "success";
        $response = "Email is send!";
    }
    else {
        $status = "failed";
        $response = "Something is Wrong: <br> " .  $mail->ErrorInfo;
    }

    exit(json_encode(array("status"=>$status, "response"=>$response)));


}
