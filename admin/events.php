<?php
include ('../layouts/admin-header.php');

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $place=$_POST['place'];
    $id=$_POST['e_id'];

    $sql1="update events set event_name='$name', event_date='$start_date',end_date='$end_date',event_place='$place' where event_id=".$id;
    $res1=mysqli_query($conn,$sql1);
    if($res1){
        echo "<script> window.location.href='events.php' </script>";
    }
}

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $place=$_POST['place'];

    $sql="insert into events(event_name,event_date,end_date,event_place) values ('$name','$start_date','$end_date','$place')";

    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<script> window.location.href='events.php'</script>";
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="#" class="btn btn-bg btn-primary" data-toggle="modal" data-target="#event"><span class="fa fa-plus mr-1"></span>Add Event</a>
        </div>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Events</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Event Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Event Place</th>
                        <th>Action</th>
                        <th>Create Handler</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $run = mysqli_query($conn, "select * from events");
                    $i = 1;
                    while ($row= mysqli_fetch_assoc($run)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['event_name']; ?></td>
                            <td><?php echo $row['event_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td><?php echo $row['event_place']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#update" data-id="<?php echo $row['event_id'] ?>"><span class=" fa fa-edit fa-lg text-primary"></span></a>
                                <a href="data.php?e_id=<?php echo $row['event_id'] ?>" ><span class="fa fa-trash ml-2 fa-lg text-primary"></span></a>
                            </td>
                            <td><a href="handler.php?eh_id=<?php echo $row['event_id'] ?>" ><span class="fa fa-plus ml-2 fa-lg text-primary"></span></a></td>

                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Add Batch Modal-->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add New Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user needs-validation" method="post" action="events.php" name="add-event" id="add-event" novalidate>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control form-rounded" name="name" id="name"
                               placeholder="Enter Event Name..." pattern="[a-zA-Z ]+" required>
                        <small class="invalid-feedback text-capitalize"> Please enter event name with characters only.</small>
                    </div>

                    <div class="form-group">
                        <div class="input group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white">Start Date</span>
                                <input type="date" class="form-control form-rounded" name="start_date" id="startDate" required>
                            </div>
                        </div>
                        <small class="invalid-feedback text-capitalize"> Please enter start date of an event.</small>
                    </div>

                    <div class="form-group">
                        <div class="input group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white">End Date</span>
                                <input type="date" class="form-control form-rounded" name="end_date" id="endDate" required>
                            </div>
                        </div>
                        <small class="invalid-feedback text-capitalize"> Please enter End date of an event.</small>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" class="form-control form-rounded" id="place"
                               placeholder="Enter Event Place..." name="place" required>
                        <small class="invalid-feedback text-capitalize"> Please enter event place name with characters only.</small>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit"  form="add-event" class="btn btn-primary" value="Add" name="add">
            </div>


        </div>

    </div>
</div>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Update Event</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user needs-validation" method="post" action="events.php" name="update-event" id="update-event" novalidate>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control form-rounded" name="name" id="e_name"
                                   placeholder="Enter Event Name..." pattern="[a-zA-Z ]+" required>
                            <small class="invalid-feedback text-capitalize"> Please enter event name with characters only.</small>
                        </div>

                        <input type="hidden" name="e_id" id="e_id">

                        <div class="form-group">
                            <div class="input group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">Start Date</span>
                                    <input type="date" class="form-control form-rounded" name="start_date" id="e_startDate" required>
                                </div>
                            </div>
                            <small class="invalid-feedback text-capitalize"> Please enter start date of an event.</small>
                        </div>

                        <div class="form-group">
                            <div class="input group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">End Date</span>
                                    <input type="date" class="form-control form-rounded" name="end_date" id="e_endDate" required>
                                </div>
                            </div>
                            <small class="invalid-feedback text-capitalize"> Please enter End date of an event.</small>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control form-rounded" id="e_place"
                                   placeholder="Enter Event Place..." pattern="[a-zA-Z ]+" name="place" required>
                            <small class="invalid-feedback text-capitalize"> Please enter event place name with characters only.</small>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit"  form="update-event" class="btn btn-primary" value="Update" name="update">
                </div>


            </div>

        </div>
    </div>

<script>
    $(document).ready(function () {
        $('#update').on('show.bs.modal',function (e) {
            var id=$(e.relatedTarget).data('id');
            $.ajax({
                type:'post',
                url:'data.php',
                data: 'event_id='+id,
                success: function (data) {
                    var e_data=JSON.parse(data);
                    $('#e_name').val(e_data['event_name']);
                    $('#e_startData').val(e_data['event_date']);
                    $('#e_endDate').val(e_data['end_date']);
                    $('#e_place').val(e_data['event_place']);
                    $('#e_id').val(e_data['event_id']);
                }
            })
        })
    })
</script>

<?php
include ('../layouts/admin-footer.php')
?>