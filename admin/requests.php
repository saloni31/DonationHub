<?php
include('../layouts/admin-header.php');
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="row">
                    <div class="col-sm-9">
                        <h3 class="m-0 font-weight-bold text-primary">Accepted Helping Request</h3>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="pull-right" id="search" placeholder="search......">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile no</th>
                            <th>Area</th>
                            <th>City</th>
                            <th>Type</th>
                            <th>Sub Category</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php
                        $run = mysqli_query($conn, "select * from request");
                        $i = 1;
                        while ($row= mysqli_fetch_assoc($run)) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['contact']; ?></td>

                                <?php
                                $sql2 = "select * from area where area_id=" . $row['area'];
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
                                <td><?php echo $row['type'] ?></td>
                                <td><?php echo $row['sub_type'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <?php
                                if($row['vol_accept'] == 0) {
                                    ?>
                                    <td class="text-success"><?php echo "Pending" ?></td>
                                    <?php
                                }else{
                                    ?>
                                <td class="text-danger"><?php echo "Accepted" ?></td>
                                    <?php } ?>
                            </tr>
                            <?php $i++;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script>

<?php
include('../layouts/admin-footer.php')
?>

<script>
    $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
</script>
