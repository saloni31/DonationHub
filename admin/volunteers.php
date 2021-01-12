<?php
include('../layouts/admin-header.php');
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Volunteers</h3>
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
                            <th>Address</th>
                            <th>Area</th>
                            <th>City</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $run = mysqli_query($conn, "select * from volunteer where admin_accept=1");
                        $i = 1;
                        while ($row= mysqli_fetch_assoc($run)) {
                            ?>
                            <tr>
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

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!--<script>-->
    <!---->
    <!--  $(document).ready(function() {-->
    <!---->
    <!--    $('#dataTable').DataTable({-->
    <!--      processing: true,-->
    <!---->
    <!--      ajax:{-->
    <!--        url:'http://127.0.0.1:8000/api/fetchFaculties'-->
    <!---->
    <!--      },-->
    <!--      columns:[-->
    <!--        {"data":"DT_RowIndex"},-->
    <!--        {"data":"name"},-->
    <!--        {"data":"email"},-->
    <!--        {"data":"mobileNumber"},-->
    <!--        {"data":"action"}-->
    <!---->
    <!--      ],-->
    <!--        "language": {-->
    <!--            "emptyTable":"No Request Is Pending"-->
    <!--        }-->
    <!---->
    <!---->
    <!--    });-->
    <!--  });-->
    <!--  function approveFaculty(id)-->
    <!--  {-->
    <!--    $(".container-fluid").css("opacity","0.5");-->
    <!--    $(".spinner-grow").show()-->
    <!--    $(".txt").show()-->
    <!--      $.ajax({-->
    <!--        url: 'http://127.0.0.1:8000/api/approveFaculty/'+id,-->
    <!--        success:function (data,status,xhr) {-->
    <!--          $(".container-fluid").css("opacity","");-->
    <!--          $(".spinner-grow").hide()-->
    <!--          $(".txt").hide()-->
    <!--          location.reload()-->
    <!--        },-->
    <!--        error: function (xhr,status,error) {-->
    <!--          $(".container-fluid").css("opacity","");-->
    <!--          $(".spinner-grow").hide()-->
    <!--          $(".txt").hide()-->
    <!--          if(xhr.status===400)-->
    <!--          {-->
    <!--            $("#alertMsg").show();-->
    <!--          }-->
    <!--        }-->
    <!--      })-->
    <!--  }-->
    <!--</script>-->

<?php
include('../layouts/admin-footer.php')
?>