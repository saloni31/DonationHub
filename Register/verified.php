<?php
require "../database/config.php";
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';
if (isset($_GET['user_id'])) {

    $sql = "update user set email_verified_status=1 where userId=" . $_GET['user_id'];
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $run = mysqli_query($conn, "select * from user where userID=" . $_GET['user_id']);
        $row = mysqli_fetch_array($run);
        $body = "Your email address is verified. Please wait Your request is under process. Thank You";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "donationhub2@gmail.com";
        $mail->Password = "donate123";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addAddress($row['email']);

        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->Subject = "Verification";
        $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
        if (!$mail->send()) {
            echo "error: " . $mail->ErrorInfo;
        }
        else{
            echo "<script> window.location.href='login.php'</script>";
        }
    }
}

?>
