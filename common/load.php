<?php
require "../database/config.php";
$data=array();
$sql="select * from events";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
    $data[]=array(
        'id'=>$row['event_id'],
        'title'=>$row['event_name'],
        'start'=>$row['event_date'],
        'end'=>$row['end_date'],
        'place'=>$row['event_place'],
    );
}
echo json_encode($data);