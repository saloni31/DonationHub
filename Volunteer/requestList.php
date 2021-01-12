<?php
include "../layouts/header.php";
$volunteer_id=$_SESSION['user']['id'];
?>

<div class="container">
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Donation Request List</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Donor name</th>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "select * from donation where vol_accept=0 and  area='".$_SESSION['user']['area']."'";
                        $res = mysqli_query($conn, $sql);
                        $i=1;
                        while($row=mysqli_fetch_array($res)){
                            $id=$row['donor_id'];
                            $donate_type=$row['donate_type'];
                            $qty=$row['quantity'];

                            $sql1="select * from donor where donor_id=".$id;
                            $res1=mysqli_query($conn,$sql1);
                            while($row1=mysqli_fetch_array($res1)) {
                                echo "<tr><td>". $i."</td>";
                                echo "<td>" . $row1['fullName'] . "</td>";
                                echo "<td>" . $donate_type . "</td>";
                                echo "<td>" . $qty . "</td>";
                                $run=mysqli_query($conn,"select * from user where userId=".$row1['userId']);
                                $row2=mysqli_fetch_array($run);
                                echo "<td>" . $row2['email'] . "</td>";
                                echo "<td>" . $row1['contactno'] . "</td>";
                                ?>
                                <td><a onclick="verify(<?php echo $row['donate_id'] ?>)"><span
                                                class="fa fa-check fa-lg ml-2 text-primary"></span></a></td>

<?php
                            $i++; }
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
<script>
    function verify(id) {
        $.ajax({
            type:'post',
            url:'data.php',
            data: 'donate_id='+id,
            success: function (data) {
                if(data === "DONE"){
                    window.location.reload(true);                        }
            }
        })
    }
</script>
