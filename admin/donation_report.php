<?php
include "../layouts/admin-header.php";
if (isset($_POST['Service_Btn'])) {
//    print_r($_POST);
    $donate_name = $_POST['product_name'];
    $sub_type=$_POST['sub_cat'];
    $city=$_POST['city'];
    $area=$_POST['area'];



    $sql = "select * from donation where donate_type='" . $donate_name . "' and sub_categories='".$sub_type."' and city='".$city."' and area='".$area."'";
    echo $sql;
    $res = mysqli_query($conn, $sql);

//    if($result1=mysqli_fetch_array($res1))
//    {
//        $volunteer_id=$result1['volunteer_id'];
//        $eh_id=$result1['eh_id'];
//        $sql2="select * from volunteer_register where volunteer_id=".$volunteer_id ." and is_handler=1";
//        echo $sql2;
//        $res2=mysqli_query($conn,$sql2);
//
//        if($result2=mysqli_fetch_array($res2))
//        {
//            $event_handler_name=$result2['firstname'];
//
//
//        }
//
//    }
//    $sql3="select * from event_volunteer where  eh_id=".$eh_id;
//    echo $sql3;
//    $res3=mysqli_query($conn,$sql3);
//


    ob_start();
    require "../fpdf/fpdf.php";


    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont("Arial", 'B', 18);
    $head = "Donation Hub";
//    $pdf->Cell(190, 40, $head, 1, 2);
//    $pdf->Image("../images/donation_hub_black_edit.png", 160, 11, 30, 30);
    $pdf->SetFont("Arial", '', 12);
    //$pdf->SetTextColor(30,144,255);
    $pdf->SetTextColor(30, 144, 255);
//    $pdf->Cell(150,8,"Event Name: ".strtoupper($event_name1),0,1);
//    $pdf->SetTextColor(0,0,0);
//    $pdf->Cell(150,8,"Event Handler: ".$event_handler_name,0,1);
//
//    $pdf->SetFillColor(255,255,255);
//    $pdf->Cell(100,8,"Start Date: ".$start_date1,0,1);
//    $pdf->Cell(100,8,"End Date : ".$end_date1,0,1);
//    $pdf->Cell(100,8,"Place : ".$event_place1,0,1);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont("Arial", '', 10);
    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->SetFont("Arial", 'B', 18);
    $pdf->Cell(190, 10, "WOMAN", 0, 0, 'C', true);

    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->SetFont("Arial", '', 12);
    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->Cell(14, 10, "Sr No.", 1, 0, 'C', true);
    $pdf->Cell(30, 10, "Name", 1, 0, 'C', true);
    $pdf->Cell(50, 10, "Email", 1, 0, 'C', true);
    $pdf->Cell(30, 10, " mobile no", 1, 0, 'C', true);
    $pdf->Cell(35, 10, "account no", 1, 0, 'C', true);

    $pdf->Cell(35, 10, "adhar card number", 1, 0, 'C', true);
//    $pdf->Cell(30, 10, "Area", 1, 1, 'C', true);
    $pdf->SetFont("Arial", '', 10);

//    $j = 1;
//    while ($result = mysqli_fetch_array($res)) {
//        $donate_type = $result['donate_type'];
//        $sub_type=$result['sub_categories'];
//        $donor_id = $result['donor_id'];
//        $sql2 = "select * from donor_register where donor_id=$donor_id";
//        $res2 = mysqli_query($conn, $sql2);
//
//        if($row2 = mysqli_fetch_array($res2)) {
//
//            $f_nm=$row2['firstname'];
//            $email=$row2['email'];
//            $city1=$row2['city'];
//            $area1=$row2['area_name'];
//
//            $csql=mysqli_query($conn,"select * from city where c_id='$city1'");
//            if($crow=mysqli_fetch_assoc($csql))
//            {
//
//                $c_nm=$crow['c_name'];
//            }
//
//            $asql=mysqli_query($conn,"select * from area where area_id='$area1'");
//            if($arow=mysqli_fetch_assoc($asql))
//            {
//
//                $a_nm=$arow['area_name'];
//            }
//        }
////        $vol_id=$result3['volunteer_id'];
//        $sql5="select * from volunteer_register where volunteer_id=".$vol_id;
//        $res5=mysqli_query($conn,$sql5);
//
//        while ($result5=mysqli_fetch_array($res5))
//        {
//            $pdf->Cell(14, 10, $j, 1, 0, 'C', true);
//            $pdf->Cell(30, 10, $f_nm, 1, 0, 'C', true);
//            $pdf->Cell(25, 10, $donate_type, 1, 0, 'C', true);
//            $pdf->Cell(25, 10, $sub_type, 1, 0, 'C', true);
//             $pdf->Cell(50, 10, $email, 1, 0, 'C', true);
//            $pdf->Cell(20, 10, $c_nm, 1, 0, 'C', true);
//            $pdf->Cell(30, 10, $a_nm, 1, 1, 'C', true);
//            $j++;


//    }


    $pdf->Output('F', '../reports/donation.pdf');
    ob_end_flush();

}

if (isset($_POST['Date_pdf'])) {

    //$end_date=substr($date,12);
    $start_date = $_POST['s_date'];
    $end_date = $_POST['e_date'];

    $sql4 = "select * from donation where (date between '$start_date' and  '$end_date') ";

    $res4 = mysqli_query($conn, $sql4);
    
    ob_start();
    require "../fpdf181/fpdf.php";

    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial", 'B', 18);

            $this->Cell(194, 40, "Donation Hub", 1, 2);
            $this->Image("../images/donation_hub_black_edit.png", 160, 11, 30, 30);
            $this->SetFont("Arial", '', 12);
            $this->SetTextColor(30, 144, 255);

            $this->SetFont("Arial", '', 12);
            $this->SetTextColor(30, 144, 255);

            $this->SetFillColor(255, 255, 255);
            $this->SetFont("Arial", '', 12);
            $this->Cell(14, 10, "Sr No.", 1, 0, 'C', true);
            $this->Cell(50, 10, "Donor Name", 1, 0, 'C', true);
            $this->Cell(30, 10, "Donate type", 1, 0, 'C', true);
            $this->Cell(70, 10, "Email", 1, 0, 'C', true);
            $this->Cell(30, 10, "contact no", 1, 1, 'C', true);
            $this->SetFont("Arial", '', 10);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', '', '8');
            $this->Cell(10, 10, 'page' . $this->PageNo() . "/ {pages}", 0, 0, 'c');
        }
    }

    ini_set('display_errors', 1);
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255, 255, 255);
    $i = 1;
    while ($row4 = mysqli_fetch_assoc($res4)) {
        $donate_type = $row4['donate_type'];
        $donor_id = $row4['donor_id'];

        $sql5 = "select * from donor where donor_id=".$donor_id;
        $res5 = mysqli_query($conn, $sql5);
        while ($row5 = mysqli_fetch_array($res5)) {
            $pdf->Cell(14, 10, $i, 1, 0, 'C', true);
            $pdf->Cell(50, 10, $row5['fullName'], 1, 0, 'C', true);
            $pdf->Cell(30, 10, $donate_type, 1, 0, 'C', true);

            $run = mysqli_query($conn,"select * from user where userId=".$row5['userId']);
            $row1=mysqli_fetch_array($run);

            $pdf->Cell(70, 10, $row1['email'], 1, 0, 'C', true);
            $pdf->Cell(30, 10, $row5['contactno'], 1, 1, 'C', true);
            $i++;
        }
    }
    $pdf->Output('F', '../reports/donation.pdf');
//    ob_end_flush();
    ob_end_flush();
}
?>

<div class="container-fluid">
    <div class="card ml-xl-5 mr-xl-5 mt-2 mb-2">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary text-center">Donation Report</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="donation_report.php" method="post">
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
<!--                        <hr>-->


<!--                        <div class="form-group  row justify-content-center">-->
<!--                            <div class="col-sm-6">-->
<!--                                                               <input type="password" class="form-control " id="confirmPassword"  placeholder="confirm Password..." required>-->
<!--                                                                <small class="invalid-feedback text-capitalize">Please enter confirm password.</small>-->
<!--                                <select name="type" class="custom-select form-control" id="Type">-->
<!--                                    <option>SELECT DONATION TYPE</option>-->
<!--                                    --><?php
//                                    while ($row = mysqli_fetch_array($res)) {
//                                        ?>
<!--                                        <option name="--><?php //echo $row['service_name'] ?><!--"-->
<!--                                                value="--><?php //echo $row['service_name'] ?><!--" >-->
<!--                                            --><?php //echo $row['service_name'] ?><!--</option>-->
<!--                                        --><?php
//                                    }
//
//                                    ?>
<!---->
<!--                                </select>-->
<!--                                <small class="invalid-feedback text-capitalize"> --><?php //if(isset($err)) echo $err ?><!-- </small>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                        <div class="form-group row justify-content-center">-->
<!--                            <div class="col-sm-6">-->
<!--                                <input type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"  id="Service_pdf" name="Service_pdf " value="Generate Service PDF"/>-->
<!--                            </div>-->
<!--                        </div>-->




                    </form>
                </div>

            </div>
        </div>
    </div>


</div>

<?php
include "../layouts/admin-footer.php";
?>
