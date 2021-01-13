<?php
include "../layouts/header.php";
$volunteer_id=$_SESSION['user']['id'];
?>


<div class="container">

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
        <div class="card-header py-3">
            <input type="text" class="pull-right" id="search" placeholder="search......">
            <h3 class="m-0 font-weight-bold text-primary"> Donation Requests</h3>
        </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Donor name</th>
                        <th>product name</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Contact no</th>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    <?php
                    $sql = "select * from donation where vol_accept=1 and area='".$_SESSION['user']['area']."'";
                    $res = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($res)){
                        $id=$row['donor_id'];
                        $donate_type=$row['donate_type'];
                        $qty=$row['quantity'];

                        $sql1="select * from donor where donor_id=".$id;
                        $res1=mysqli_query($conn,$sql1);
                        while($row1=mysqli_fetch_array($res1)) {
                            echo "<tr><td>" . $row1['fullName'] . "</td>";
                            echo "<td>" . $donate_type . "</td>";
                            echo "<td>" . $qty . "</td>";
                            $sql3="select * from user where userId=".$row1['userId'];
                            $res3=mysqli_query($conn,$sql3);
                            $row3=mysqli_fetch_array($res3);
                            echo "<td>" . $row3['email'] . "</td>";
                            echo "<td>" . $row1['contactno'] . "</td></tr>";

                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="card-header py-3">
                <input type="text" class="pull-right" id="search1" placeholder="search......">
                <h3 class="m-0 font-weight-bold text-primary"> Helping Requests</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User name</th>
                        <th>Product name</th>
                        <th>Sub type</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Contact no</th>
                        <th>City</th>
                        <th>Area</th>
                    </tr>
                    </thead>

                    <tbody id="myTable1">
                    <?php

                        $sql = "select * from request where vol_accept=1 and area=" . $_SESSION['user']['area'] ;
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

                            echo "<tr><td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['sub_type'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            echo "<td>" . $city . "</td>";
                            echo "<td>" . $area . "</td>";



                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#search1").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable1 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<?php
include  "../layouts/footer.php";
?>