<?php
include "../layouts/admin-header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10">
                    <h3 class="m-0 font-weight-bold text-primary">Volunteers</h3>
                </div>
                <div class="col-sm-2">
                    <a href="#" onclick="createHandler(<?php echo $_GET['eh_id'] ?>)"  class="btn btn-bg btn-primary" id="create"><span class="fa fa-plus mr-1"></span>Create Handler</a>
                </div>

            </div>
<!--            <h3 class="m-0 font-weight-bold text-primary">Volunteers</h3>-->
<!--            <a href="#" class="btn btn-bg btn-primary" id="create"><span class="fa fa-plus mr-1"></span>create</a>-->
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                            <td><input type="checkbox" id="volunteers" value="<?php echo $row['volunteer_id'] ?>"></td>
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
include "../layouts/admin-footer.php";
?>

<script>
    function createHandler(eh_id) {
        var id=document.getElementById("volunteers").value;
        $.ajax({
            type:'post',
            url:'data.php',
            data: {'volunteer_id': id, 'eh_id': eh_id},
            success: function (data) {
                if(data === "DONE"){
                    alert("Event handler is created.")
                    window.location.reload(true);
                }
            }
        })
    }
</script>
