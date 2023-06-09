<?php
require 'connection.php';

$type=$_POST['type'];
if($type=="company"){
    $cname=$_POST['cname'];
    $address=$_POST['address'];
    $emailid=$_POST['emailid'];
    $phonenum=$_POST['phonenum'];
    $logo=$_POST['logo'];
    $staff=$_POST['staff'];
    $res = mysqli_query($conn, "insert into company_info values('$cname','$address','$emailid','$phonenum','$staff','$logo')");
    if(!$res)
    echo("0");
    else{
        $data = array();
        $counter = 0;
        $row = mysqli_query($conn,"select cname from company_info where staff_id='$staff';");
        while($res = mysqli_fetch_array($row, MYSQLI_NUM)){
            $data[$counter][0] = $res[0]; //cname
            $counter++;
        }
        echo(json_encode($data));
    }
}
if($type=="save"){
    $cname=$_POST['cname'];
    $bno=$_POST['bno'];
    $price=$_POST['price'];
    $tdata=$_POST['tdata'];
    $coname=$_POST['coname'];
    
    mysqli_query($conn, "insert into invoice values($bno, '$cname', '$price', current_date(), '$coname')");
    for($i=1;$i<count($tdata);$i++){
        mysqli_query($conn, "insert into product_info values($bno,'".$tdata[$i][1]."',".$tdata[$i][2].",".$tdata[$i][3].",".$tdata[$i][4].",".$tdata[$i][5].")");
    }
}
?>