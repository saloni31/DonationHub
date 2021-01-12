<?php
include "../layouts/header.php";
?>
<div class="container">
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Notifications</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Sr. No </th>
                        <th> Description </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>

                        <?php
                        $res=mysqli_query($conn,"select * from volunteer where volunteer_id=".$_SESSION['user']['id']);
                        $row=mysqli_fetch_array($res);
                        if($row['is_handler'] == 1){
                            $res1=mysqli_query($conn,"select * from event_handler where volunteer_id=".$_SESSION['user']['id']);
                            $row1=mysqli_fetch_array($res1);

                            $res2=mysqli_query($conn,"select * from events where event_id=".$row1['event_id']);
                            $row2=mysqli_fetch_array($res2);
                            ?>
                            <td>1</td>
                            <td> You Are Selected As Event Handler For Event <?php echo $row2['event_name'] ?></td>


                        <?php
                        }
                        if($row['is_event_volunteer'] == 1){
                            $res1=mysqli_query($conn,"select * from event_volunteer where volunteer_id=".$_SESSION['user']['id']);
                            $row1=mysqli_fetch_array($res1);

                            $res2=mysqli_query($conn,"select * from events where event_id=".$row1['event_id']);
                            $row2=mysqli_fetch_array($res2);

                            $res3=mysqli_query($conn,"select * from volunteer where volunteer_id=".$row1['eh_id']);
                            $row3=mysqli_fetch_array($res3);
                            ?>
                            <td>1</td>
                            <td> You Are Selected As Event Volunteer For Event <?php echo $row2['event_name'] ?> And you will be work with <?php $row3['fullName'] ?></td>
                        <?php
                        }
                        ?>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include "../layouts/footer.php";
?>
