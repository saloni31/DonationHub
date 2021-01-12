<?php
include('../layouts/admin-header.php');

if(isset($_POST['add'])){
    $event=$_POST['event'];
    $desc=$_POST['desc'];
    $file = time() . "_" . $_FILES['upload']['name'];
    $temp_name = $_FILES['upload']['tmp_name'];
    $folder = "../images/gallery/" . $file;


    $sql="insert into gallery(event_id,photo,description) values ('$event','$folder','$desc')";
    if(mysqli_query($conn,$sql) && move_uploaded_file($temp_name, $folder)){
        echo "<script>window.location.href='gallery.php'</script>";
    }
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <a href="#" class="btn btn-bg btn-primary" data-toggle="modal" data-target="#photos"><span
                            class="fa fa-plus mr-1"></span>Add Event Photos</a>
            </div>
        </div>

        <div class="template">
            <div class="row mb-3">
                <?php
                $res1=mysqli_query($conn,"select * from gallery");
                while($row=mysqli_fetch_array($res1)){
                ?>
                <div class="col-sm-4 mt-3">
                    <div class="card card-hover">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="data.php?g_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-light ml-5 btn-delete"><span
                                            class="fa fa-trash fa-lg text-primary"></span></a>
                            </div>
                        </div>
                        <div class="card-body justify-content-center">
                            <div class="row">
                                <div class="col-sm-7">
                                    <img src="<?php echo $row['photo'] ?>" height="150" width="300" class="mb-5">
                                    <?php
                                    $res2=mysqli_query($conn,"select * from events where event_id=".$row['event_id']);
                                    $row1=mysqli_fetch_array($res2);
                                    ?>
                                    <a class="className"><h5 class="text-primary"><b><?php echo $row1['event_name'] ?></b></h5>
                                    </a>
                                    <h5>
                                        <small class="semester"><?php echo $row['description'] ?></small>
                                    </h5>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Add Batch Modal-->
    <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add New Photos</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user needs-validation" enctype="multipart/form-data" action="gallery.php" method="post" id="add-photo" name="add-photo" novalidate>
                        <div class="form-group mt-3">
                            <select class="form-control" name="event" required>
                                <option value="">Select Event</option>
                                <?php
                                    $res=mysqli_query($conn,"select * from events");
                                    while($row=mysqli_fetch_array($res)){
                                ?>
                                        <option value="<?php echo $row['event_id']?>"><?php echo $row['event_name']?></option>
                                <?php } ?>
                            </select>
                            <small class="invalid-feedback text-capitalize">Please select event.</small>
                        </div>

                        <div class="form-group custom-file mt-1">
                            <input type="file" class="form-control custom-file-input form-rounded"
                                   id="uploadFile" name="upload" required>
                            <label class="custom-file-label" for="uploadFile">Upload Event Photo</label>
                            <small class="invalid-feedback text-capitalize">Please select event picture.</small>
                        </div>

                        <div class="form-group mt-4">
                            <input type="text" name="desc" class="form-control form-rounded" id="description"
                                   placeholder="Enter Description..." required>
                            <small class="invalid-feedback text-capitalize"> Please enter description of event photos.
                            </small>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" form="add-photo" class="btn btn-primary" value="Add" name="add">
                </div>


            </div>

        </div>
    </div>

    <script>
        // function batch() {
        //     $("#batch").submit();
        // }
    </script>

<?php
include('../layouts/admin-footer.php')
?>