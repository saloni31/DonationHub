<?php
include ("../layouts/admin-header.php");

//require  "../fpdf/fpdf.php";

if(isset($_POST['Event_Btn'])) {

//    print_r($_POST);
    $event_name = $_POST['event'];
    if($_POST['event'] == "") {
        $err="Please select event";
    }
    else{
        $sql = "select * from events where event_id=" . $event_name;
        $res = mysqli_query($conn, $sql);
        if ($result = mysqli_fetch_assoc($res)) {
            $event_name1 = $result['event_name'];
            $start_date1 = $result['event_date'];
            $end_date1 = $result['end_date'];

            $event_place1 = $result['event_place'];
        }

        $sql1 = "select * from event_handler where event_id=" . $event_name;
        $res1 = mysqli_query($conn, $sql1);
        if ($result1 = mysqli_fetch_array($res1)) {
            $volunteer_id = $result1['volunteer_id'];
            $eh_id = $result1['eh_id'];
            $sql2 = "select * from volunteer where volunteer_id=" . $volunteer_id . " and is_handler=1";
            $res2 = mysqli_query($conn, $sql2);

            if ($result2 = mysqli_fetch_array($res2)) {
                $event_handler_name = $result2['fullName'];
            }

        }
        $sql3 = "select * from event_volunteer where  eh_id=" . $eh_id;
        $res3 = mysqli_query($conn, $sql3);


        ob_start();
        require "../fpdf181/fpdf.php";

        class PDF extends FPDF
        {
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', '', '8');
                $this->Cell(10, 10, 'Page ' . $this->PageNo() . " / Of {pages}", 0, 0, 'c');
            }
        }

        $pdf = new PDF('P', 'mm', 'A4');
        $pdf->AliasNbPages('{pages}');
        $pdf->AddPage('P');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont("Arial", 'B', 18);
        $head = "Donation Hub";
        $pdf->Cell(190, 40, $head, 1, 2);
        $pdf->Image("../images/donation_hub_black_edit.png", 160, 11, 30, 30);
        $pdf->SetFont("Arial", '', 12);
        //$pdf->SetTextColor(30,144,255);
        $pdf->SetTextColor(30, 144, 255);
        $pdf->Cell(150, 8, "Event Name: " . strtoupper($event_name1), 0, 1);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(150, 8, "Event Handler: " . $event_handler_name, 0, 1);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(100, 8, "Start Date: " . $start_date1, 0, 1);
        $pdf->Cell(100, 8, "End Date : " . $end_date1, 0, 1);
        $pdf->Cell(100, 8, "Place : " . $event_place1, 0, 1);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", '', 10);
        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->SetFont("Arial", 'B', 18);
        $pdf->Cell(190, 10, "Event Volunteers", 0, 0, 'C', true);

        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->SetFont("Arial", '', 12);
        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->Cell(14, 10, "Sr No.", 1, 0, 'C', true);
        $pdf->Cell(50, 10, "Volunteer Name", 1, 0, 'C', true);
        $pdf->Cell(75, 10, "Email", 1, 0, 'C', true);
        $pdf->Cell(30, 10, "Mobile No", 1, 0, 'C', true);
        $pdf->Cell(20, 10, "City", 1, 1, 'C', true);

        $j = 1;
        while ($result3 = mysqli_fetch_array($res3)) {
            $vol_id = $result3['volunteer_id'];
            $sql5 = "select * from volunteer where volunteer_id=" . $vol_id;
            $res5 = mysqli_query($conn, $sql5);

            while ($result5 = mysqli_fetch_array($res5)) {
                $x1 = "select * from city where c_id =" . $result5['city'];
                $a1 = mysqli_query($conn, $x1);
                if ($b1 = mysqli_fetch_assoc($a1)) {
                    $c_nm1 = $b1['c_name'];
                }

                $run=mysqli_query($conn,"select * from user where userId=".$result5['userId']);
                $row1=mysqli_fetch_array($run);

                $pdf->Cell(14, 10, $j, 1, 0, 'C', true);
                $pdf->Cell(50, 10, $result5['fullName'], 1, 0, 'C', true);
                $pdf->Cell(75, 10, $row1['email'], 1, 0, 'C', true);
                $pdf->Cell(30, 10, $result5['contactno'], 1, 0, 'C', true);
                $pdf->Cell(20, 10, $c_nm1, 1, 1, 'C', true);
                $j++;
            }

        }


        $pdf->Output('F', '../reports/event2.pdf');
        ob_end_flush();
    }
}

if(isset($_POST['Date_pdf']))
{
    $start_date=$_POST['s_date'];
    $end_date=$_POST['e_date'];


    $sql4="select * from events where (event_date between '$start_date' and  '$end_date') and  (end_date between '$start_date' and  '$end_date')";

    $res4=mysqli_query($conn,$sql4);
//    print_r($res4);
    ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Donation Hub",1,2);
            $this->Image("../images/donation_hub_black_edit.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10,"Event Name",1,0,'C',true);
            $this->Cell(40,10,"Start Date",1,0,'C',true);
            $this->Cell(40,10,"End Date",1,0,'C',true);
            $this->Cell(50,10,"Event Place",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','','8');
    $i=1;
    while($row4=mysqli_fetch_assoc($res4))
    {
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row4['event_name'],1,0,'C',true);
        $pdf->Cell(40,10,$row4['event_date'],1,0,'C',true);
        $pdf->Cell(40,10,$row4['end_date'],1,0,'C',true);
        $pdf->Cell(50,10,$row4['event_place'],1,1,'C',true);
        $i++;
    }

    $pdf->Output('F','../reports/event.pdf');
    ob_end_flush();
}

?>

<div class="container-fluid">
    <div class="card ml-xl-5 mr-xl-5 mt-2 mb-2">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary text-center">Event Report</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="event_report.php" method="post">
                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <label for="s_date">Start Date:</label>
                                <input type="date" name="s_date" class="form-control form-control-user " id="s_date"  >

                            </div>
                        </div>
                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <label for="e_date">End Date:</label>
                                <input type="date" name="e_date" class="form-control form-control-user " id="e_date"  >

                            </div>

                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"  id="Date_pdf" name="Date_pdf" value="Generate Date PDF"/>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <!--                                <input type="password" class="form-control " id="confirmPassword"  placeholder="confirm Password..." required>-->
                                <!--                                <small class="invalid-feedback text-capitalize">Please enter confirm password.</small>-->
                                <select class="form-control" name="event">
                                    <option value="">Select Event</option>
                                    <?php
                                    $res=mysqli_query($conn,"select * from events");
                                    while($row=mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $row['event_id']?>"><?php echo $row['event_name']?></option>
                                    <?php } ?>
                                </select>
                                <small class="invalid-feedback text-capitalize"> <?php if(isset($err)) echo $err ?> </small>
                            </div>

                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"  id="" name="Event_Btn" value="Generate Date PDF"/>
                                <!--                                <input type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"  id="Event_pdf" name="Event_pdf " value="Generate Event PDF"/>-->
                            </div>
                        </div>




                    </form>
                </div>

            </div>
        </div>
    </div>


</div>

<?php
include ("../layouts/admin-footer.php");
?>
<script>

</script>