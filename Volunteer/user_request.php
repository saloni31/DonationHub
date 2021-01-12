<?php
include "../layouts/header.php";
?>

<div class="container">
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Helping Request List</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>User name</th>
                        <th>Product name</th>
                        <th>Sub type</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Contact no</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $i=1;
                            $sql = "select * from request where vol_accept=0 and area='" . $_SESSION['user']['area'] . "'";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res)) {

                                $sql1 = "select * from city where c_id=" . $row['city'];
                                $res1 = mysqli_query($conn, $sql1);
                                if ($row1 = mysqli_fetch_array($res1)) {
                                    $city = $row1['c_name'];
                                }

                                $sql2 = "select * from area where area_id=" . $row['area'];
                                $res2 = mysqli_query($conn, $sql2);
                                if ($row2 = mysqli_fetch_array($res2)) {
                                    $area = $row2['area_name'];
                                }
                                echo "<tr><td>".$i."</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['type'] . "</td>";
                                echo "<td>" . $row['sub_type'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['contact'] . "</td>";
                                echo "<td>" . $city . "</td>";
                                echo "<td>" . $area . "</td>";
                                $id = $row['req_id'];
                                ?>

                                <td><a onclick="verify(<?php echo $id ?>);"><span
                                            class="fa fa-check fa-lg ml-2 text-primary"></span></a></td>

                                <?php
                                $i++;
                                    }

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
                    data: 'req_id='+id,
                    success: function (data) {
                        if(data === "DONE"){
                            window.location.reload();                        }
                    }
                })
    }
</script>
