<?php
include "../layouts/header.php";
$res = mysqli_query($conn, "select * from event_handler where volunteer_id=" . $_SESSION['user']['id']);
?>
<div class="container-fluid ">

<!--    <div class="card card-hover">-->
<!--        <div class="card-body">-->
<!--            --><?php
//            while ($row = mysqli_fetch_array($res)) {
//                $sql = "select * from events where event_id=" . $row['event_id'];
//                $res1 = mysqli_query($conn, $sql);
//                $row1 = mysqli_fetch_array($res1);
//                ?>
<!--                <div class="row">-->
<!--                    <div class="col-sm-7">-->
<!--                        <a class="className"><h5><b> --><?php //echo $row1['event_name'] ?><!-- </b></h5></a>-->
<!--                        <h5>-->
<!--                            <small class="semester"> --><?php //echo $row1['event_place'] ?><!-- </small>-->
<!--                        </h5>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            --><?php //} ?>
<!--        </div>-->
<!--    </div>-->

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <?php
            while ($row = mysqli_fetch_array($res)) {
                $sql = "select * from events where event_id=" . $row['event_id'];
                $res1 = mysqli_query($conn, $sql);
                $row1 = mysqli_fetch_array($res1);

                $sql1="select * from event_handler where event_id=".$row1['event_id'];
                $res3=mysqli_query($conn,$sql1);
                $row3=mysqli_fetch_array($res3);
                ?>
                <div class="row">
                    <div class="col-sm-4">
                        <h1><small class="semester"> <h5><b> <?php echo $row1['event_name'] ?> </b></h5></small></h1>
                        <h5>
                            <small class="semester"> <?php echo $row1['event_place'] ?> </small>
                        </h5>

                    </div>

                    <div class="col-sm-3">
                        <h1>
                            <small class="semester"><b> Volunteers  </b> </small>
                        </h1>

                    </div>

                    <div class="col-sm-3">
                        <a class="className"><h5><b> Date: </b></h5></a>
                        <h5>
                            <small class="semester"> <?php echo $row1['event_date']." - ".$row1['end_date'] ?> </small>
                        </h5>

                    </div>

                    <div class="col-sm-2">
                        <a href="#" onclick="createHandler(<?php echo $row1['event_id'] ?> , <?php echo $row3['eh_id'] ?>)"  class="btn btn-bg btn-dark text-white" id="create"><span class="fa fa-plus mr-1"></span>Create Handler</a>

                    </div>

                </div>
            <?php } ?>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Mobile no</th>
                        <th>Address</th>
                        <th>Area</th>
                        <th>City</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $run = mysqli_query($conn, "select * from volunteer where admin_accept=1 and is_handler=0 and is_event_volunteer=0");
                    $i = 1;
                    while ($row= mysqli_fetch_assoc($run)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="volunteers" id="volunteers" value="<?php echo $row['volunteer_id'] ?>"></td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['fullName']; ?></td>
                            <?php
                            $sql = "select * from user where userId=" . $row['userId'];
                            $res = mysqli_query($conn, $sql);
                            $row1 = mysqli_fetch_array($res);
                            ?>
                            <td><?php echo $row1['email']; ?></td>
                            <td><?php echo $row['contactno']; ?></td>
                            <td><?php echo $row['address']; ?></td>

                            <?php
                            $sql2 = "select * from area where area_id=" . $row['area_name'];
                            $res2 = mysqli_query($conn, $sql2);
                            $row3 = mysqli_fetch_array($res2);
                            ?>
                            <td><?php echo $row3['area_name'] ?></td>

                            <?php
                            $sql1 = "select * from city where c_id=" . $row['city'];
                            $res1 = mysqli_query($conn, $sql1);
                            $row2 = mysqli_fetch_array($res1);
                            ?>
                            <td><?php echo $row2['c_name'] ?></td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include "../layouts/footer.php";
?>

<script>
    function createHandler(e_id,eh_id) {
        var vol_id=document.getElementById("volunteers").value;

        $.ajax({
            type:'post',
            url:'data.php',
            data: {'volunteer_id' : vol_id, 'event_id': e_id, 'eh_id': eh_id},
            success: function (data) {

                if(data.trim() === "DONE"){
                    alert("Event volunteers are created.");
                    window.location.reload(true);
                }
            }
        })
    }
</script>
