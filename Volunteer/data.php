<?php
session_start();
require "../database/config.php";
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';

// for Donation request.....
if (isset($_POST['sub_cat']) && isset($_POST['donor_id'])) {
//    $sql4 = "select bloodgroup from donor_register where donor_id=" . $_POST['donor_id'];
//    $result = mysqli_query($conn, $sql4);
//    if ($row4 = mysqli_fetch_assoc($result)) {
//
//    }
    $catagory = $_POST['sub_cat'];
    $sql = "select * from services where service_name='" . $catagory . "'";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($res)) {
        $id = $row['id'];
    }
    $sql1 = "select * from sub_services where id=$id";
    $res1 = mysqli_query($conn, $sql1);
    echo "<option>" . "SELECT TYPE" . "</option>";
    while ($row1 = mysqli_fetch_array($res1)) {
        if ($catagory == "blood") {
            echo "<option   selected='selected'  value='" . $blood_group . "'>" . $blood_group . "</option>";
            exit();
        } else {
            echo "<option value='" . $row1['sub_cat_name'] . "'>" . $row1['sub_cat_name'] . "</option>";
        }

    }
}
if (isset($_POST['sub_cat_1'])) {

    $catagory = $_POST['sub_cat_1'];

    $sql = "select * from services where service_name='" . $catagory . "'";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($res)) {
        $id = $row['id'];
    }
    $sql1 = "select * from sub_services where id=$id";
    $res1 = mysqli_query($conn, $sql1);
    echo "<option>" . "SELECT TYPE" . "</option>";
    while ($row1 = mysqli_fetch_array($res1)) {


        echo "<option value='" . $row1['sub_cat_name'] . "'>" . $row1['sub_cat_name'] . "</option>";


    }
}
if (isset($_POST['c_id'])) {
    $c_id = $_POST['c_id'];
    $sql2 = "select * from area where c_id=$c_id";
    $res2 = mysqli_query($conn, $sql2);
    echo "<option>" . "SELECT AREA" . "</option>";
    while ($row2 = mysqli_fetch_array($res2)) {
        echo "<option value='" . $row2['area_id'] . "'>" . $row2['area_name'] . "</option>";
    }
}

// for manage volunteer profile
if (isset($_POST['city_id']) && isset($_POST['vol_id']) && isset($_POST['area_id'])) {
    $sql3 = "select area_name from volunteer where volunteer_id=" . $_POST['vol_id'];

    $res3 = mysqli_query($conn, $sql3);
    if ($row3 = mysqli_fetch_assoc($res3)) {
        $area_id = $row3['area_name'];

    }

    $sql2 = "select * from area where c_id=" . $_POST['city_id'];
    echo $sql2;
    $res2 = mysqli_query($conn, $sql2);
    echo "<option>" . "SELECT AREA" . "</option>";
    while ($row2 = mysqli_fetch_array($res2)) {
        if ($row2['area_id'] == $area_id) {
            echo "<option selected='selected' value='" . $row2['area_id'] . "'>" . $row2['area_name'] . "</option>";
        } else {
            echo "<option value='" . $row2['area_id'] . "'>" . $row2['area_name'] . "</option>";
        }

    }
}

// for manage donor profile
if (isset($_POST['city_id']) && isset($_POST['donor_id']) && isset($_POST['area_id'])) {
    $sql4 = "select area_name from donor_register where donor_id=" . $_POST['donor_id'];
    echo $sql4;
    $res4 = mysqli_query($conn, $sql4);
    if ($row4 = mysqli_fetch_assoc($res4)) {
        $area_id = $row4['area_name'];

    }

    $sql5 = "select * from area where c_id=" . $_POST['city_id'];
  
    $res5 = mysqli_query($conn, $sql5);
    echo "<option>" . "SELECT AREA" . "</option>";
    while ($row5 = mysqli_fetch_array($res5)) {
        if ($row5['area_id'] == $area_id) {
            echo "<option selected='selected' value='" . $row5['area_id'] . "'>" . $row5['area_name'] . "</option>";
        } else {
            echo "<option value='" . $row5['area_id'] . "'>" . $row5['area_name'] . "</option>";
        }

    }
}

//Blood Donor Filtering


if (isset($_POST['city']) && isset($_POST['blood'])) {

if($_POST['city']!="0" && $_POST['blood']!="0") {
    $query = "select * from donor_register where bloodgroup='" . $_POST['blood'] . "' and  city=" . $_POST['city'];

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {


        while ($row = mysqli_fetch_assoc($result)) {
            $query1 = "select * from city where c_id=" . $row['city'];
            $result1 = mysqli_query($conn, $query1);
            if ($res1 = mysqli_fetch_assoc($result1)) {
                $city = $res1['c_name'];
            }
//        $query2="select * from area where area_id=".$row['area_name'];
//        $result2=mysqli_query($conn,$query2);
//        if($res2=mysqli_fetch_assoc($result2))
//        {
//            $area_name=$res2['area_name'];
//        }

            ?>

            <tr>

                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $city; ?></td>
                <td><?php echo $row['contactno']; ?></td>
                <td><?php echo $row['bloodgroup']; ?></td>
                <?php
                $bg = $row['blood_reward'];
                ?>

                <td><?php
                    for($i=1;$i<=$bg;$i++)
                    {
                        ?>
                        <i class="fa fa-heart" style="color:red;"></i>
                        <?php
                    }
                    ?></td>

            </tr>

            <?php
        }
    } else {
        ?>
        <h3>
            <center>No Matching Records Found</center>
        </h3>
        <?php
    }
}
}
elseif (isset($_POST['city'])) {

    if($_POST['city']!="0") {


        $query = "select * from donor_register where city=" . $_POST['city'];

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $query1 = "select * from city where c_id=" . $row['city'];
                $result1 = mysqli_query($conn, $query1);
                if ($res1 = mysqli_fetch_assoc($result1)) {
                    $city = $res1['c_name'];
                }
//        $query2="select * from area where area_id=".$row['area_name'];
//        $result2=mysqli_query($conn,$query2);
//        if($res2=mysqli_fetch_assoc($result2))
//        {
//            $area_name=$res2['area_name'];
//        }

                ?>

                <tr>

                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $row['contactno']; ?></td>
                    <td><?php echo $row['bloodgroup']; ?></td>
                    <?php
                    $bg = $row['blood_reward'];
                    ?>

                    <td><?php
                        for($i=1;$i<=$bg;$i++)
                        {
                            ?>
                            <i class="fa fa-heart" style="color:red;"></i>
                            <?php
                        }
                        ?></td>

                </tr>
                <?php
            }
        } else {
            ?>
            <h3>
                <center>No Matching Records Found</center>
            </h3>
            <?php
        }
    }
} elseif (isset($_POST['blood'])) {

    if($_POST['blood']!="0") {


        $query = "select * from donor_register where bloodgroup='" . $_POST['blood'] . "' ";

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {


            while ($row = mysqli_fetch_assoc($result)) {
                $query1 = "select * from city where c_id=" . $row['city'];
                $result1 = mysqli_query($conn, $query1);
                if ($res1 = mysqli_fetch_assoc($result1)) {
                    $city = $res1['c_name'];
                }
//        $query2="select * from area where area_id=".$row['area_name'];
//        $result2=mysqli_query($conn,$query2);
//        if($res2=mysqli_fetch_assoc($result2))
//        {
//            $area_name=$res2['area_name'];
//        }

                ?>

                <tr>

                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $row['contactno']; ?></td>
                    <td><?php echo $row['bloodgroup']; ?></td>
                    <?php
                    $bg = $row['blood_reward'];
                    ?>

                    <td><?php
                        for($i=1;$i<=$bg;$i++)
                        {
                            ?>
                            <i class="fa fa-heart" style="color:red;"></i>
                            <?php
                        }
                        ?></td>

                </tr>
                <?php
            }
        } else {
            ?>
            <h3>
                <center>No Matching Records Found</center>
            </h3>
            <?php
        }
    }
}
if(isset($_POST['city'])) {
    if ($_POST['city'] == "0") {
        $query = "select * from donor_register ";

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {


            while ($row = mysqli_fetch_assoc($result)) {
                $query1 = "select * from city where c_id=" . $row['city'];
                $result1 = mysqli_query($conn, $query1);
                if ($res1 = mysqli_fetch_assoc($result1)) {
                    $city = $res1['c_name'];
                }

                ?>

                <tr>

                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $row['contactno']; ?></td>
                    <td><?php echo $row['bloodgroup']; ?></td>
                    <?php
                    $bg = $row['blood_reward'];
                    ?>

                    <td><?php
                        for($i=1;$i<=$bg;$i++)
                        {
                            ?>
                            <i class="fa fa-heart" style="color:red;"></i>
                            <?php
                        }
                        ?></td>

                </tr>
                <?php
            }
        }
    }
}

if(isset($_POST['req_id'])){
    $sql="update request set vol_accept=1 where req_id=".$_POST['req_id'];

//    $res=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)){
        $sql1="select * from request where req_id=".$_POST['req_id'];
//        echo  $sql1;
        $res1=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_array($res1);

        $query3="select * from volunteer where volunteer_id=".$_SESSION['user']['id'];


        $res4=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_array($res4);




        $body = "Your Donation request is Accepted by volunteer name ".$row3['fullName'];
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
            echo "DONE";
        }
    }
}

if(isset($_POST['donate_id'])){
    $sql="update donation set vol_accept=1 where donate_id=".$_POST['donate_id'];
//    $res=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)){
        $sql1="select * from donation where donate_id=".$_POST['donate_id'];

        $res1=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_array($res1);

        $res2=mysqli_query($conn,"select * from donor where donor_id=".$row['donor_id']);
        $row1=mysqli_fetch_array($res2);

        $res3=mysqli_query($conn,"select * from user where userId=".$row1['userId']);
        $row2=mysqli_fetch_array($res3);

        $res4=mysqli_query($conn,"select * from volunteer where volunteer_id=".$_SESSION['user']['id']);
        $row3=mysqli_fetch_array($res4);


        $body = "Your Donation request is Accepted by volunteer name ".$row3['fullName'];
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
            echo "DONE";
        }
    }
}

if(isset($_POST['volunteer_id']) && $_POST['event_id'] && $_POST['eh_id']){

    $sql="update volunteer set is_event_volunteer=1 where volunteer_id=".$_POST['volunteer_id'];
    if(mysqli_query($conn,$sql)){
        $sql="insert into event_volunteer (event_id,eh_id,volunteer_id) values (".$_POST['event_id'].",".$_POST['eh_id'].",".$_POST['volunteer_id'].")";

        if(mysqli_query($conn,$sql)){
            echo "DONE";
        }
    }

}
?>







