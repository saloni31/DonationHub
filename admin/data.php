<?php
require "../database/config.php";
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';
if(isset($_GET['id'])){

    $sql="delete from admin where userId=".$_GET['id'];
    $res=mysqli_query($conn,$sql);

    $sql1="delete from user where userId=".$_GET['id'];
    $res1=mysqli_query($conn,$sql1);

    if($res && $res1){
        echo "<script>window.location.href='admins.php'</script>";
    }
}

if(isset($_POST['event_id'])){
    $sql2="select * from events where event_id=".$_POST['event_id'];
    $res2=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_array($res2);
    $arr=array("event_id"=> $_POST['event_id'],"event_name"=>$row['event_name'], "event_date"=> $row['event_date'], "end_date"=> $row['end_date'], "event_place"=>$row['event_place']);
    echo json_encode($arr);
}

if(isset($_GET['e_id'])){
    $sql3="delete from events where event_id=".$_GET['e_id'];
    $res3=mysqli_query($conn,$sql3);
    if($res3){
        echo "<script>window.location.href='events.php'</script>";
    }
}

if(isset($_GET['g_id'])){
    $sql4="delete from gallery where id=".$_GET['g_id'];
    if(mysqli_query($conn,$sql4)){
        echo "<script>window.location.href='gallery.php'</script>";
    }
}

if(isset($_GET['vol_id'])){
    $res4=mysqli_query($conn,"update volunteer set admin_accept=1 where volunteer_id=".$_GET['vol_id']) ;
    if($res4){
        $run=mysqli_query($conn,"select * from volunteer where volunteer_id=".$_GET['vol_id']);
        $row1=mysqli_fetch_array($run);

        $run1=mysqli_query($conn,"select * from user where userId=".$row1['userId']);
        $row2=mysqli_fetch_array($run1);

        $body = "Your request is approved, Now you can access the system.";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "donationhub2@gmail.com";
        $mail->Password = "donate123";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addAddress($row2['email']);

        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->Subject = "Verification";
        $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
        if (!$mail->send()) {
            echo "error: " . $mail->ErrorInfo;
        }
        else{
            echo "<script>window.location.href='approve-volunteers.php'</script>";
        }
    }
}

if(isset($_GET['donor_id'])){
    $res5=mysqli_query($conn,"update donor set admin_accept=1 where donor_id=".$_GET['donor_id']) ;
    if($res5){
        $run=mysqli_query($conn,"select * from donor where donor_id=".$_GET['donor_id']);
        $row1=mysqli_fetch_array($run);

        $run1=mysqli_query($conn,"select * from user where userId=".$row1['userId']);
        $row2=mysqli_fetch_array($run1);

        $body = "Your request is approved, Now you can access the system.";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "donationhub2@gmail.com";
        $mail->Password = "donate123";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addAddress($row2['email']);

        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->Subject = "Verification";
        $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
        if (!$mail->send()) {
            echo "error: " . $mail->ErrorInfo;
        }
        else{
            echo "<script>window.location.href='approve-donors.php'</script>";
        }
    }
}

if(isset($_POST['volunteer_id']) && ($_POST['eh_id'])){
    $sql="update volunteer set is_handler=1 where volunteer_id=".$_POST['volunteer_id'];
    if(mysqli_query($conn,$sql)){
        $sql="insert into event_handler (event_id,volunteer_id) values (".$_POST['eh_id'].",".$_POST['volunteer_id'].")";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo "DONE";
        }
    }
}

