<?php
require 'connection.php';

$query = $_POST["query"];
if ($query == "cload") {
    $uname = $_POST['uname'];
    $data = array();
    $counter = 0;
    $row = mysqli_query($conn, "select cname from company_info where staff_id='$uname';");
    while ($res = mysqli_fetch_array($row, MYSQLI_NUM)) {
        $data[$counter][0] = $res[0]; //cname
        // $data[$counter][1] = $res[1]; //address
        // $data[$counter][2] = $res[2]; //email
        // $data[$counter][3] = $res[3]; //phone
        // $data[$counter][5] = $res[5]; //image
        $counter++;
    }
    echo (json_encode($data));
} else if ($query == "bno") {
    $row = mysqli_query($conn, "select count(*)+1 from invoice;");
    $res = mysqli_fetch_array($row, MYSQLI_NUM);
    echo ($res[0]);
} else if ($query == "cinf") {
    $cname = $_POST['cname'];
    $data = array();
    $row = mysqli_query($conn, "select * from company_info where cname='$cname';");
    $res = mysqli_fetch_array($row, MYSQLI_NUM);
    $data[0] = $res[0]; //cname
    $data[1] = $res[1]; //address
    $data[2] = $res[2]; //email
    $data[3] = $res[3]; //phone
    $data[4] = $res[5]; //image
    echo (json_encode($data));
} else if ($query == "search") {
    $squery = $_POST['squery'];
    $data = array();
    $counter = 0;
    $bno = "";
    try {
        $bno = intval($squery);
    } catch (Exception $e) {
        $bno = 0;
    }
    $row = mysqli_query($conn, "select * from invoice where bno=$bno or cname like '%$squery%';");
    while ($res = mysqli_fetch_array($row, MYSQLI_NUM)) {
        $data[$counter][0] = $res[0]; //bno
        $data[$counter][1] = $res[1]; //cname
        $data[$counter][2] = $res[2]; //tprice
        $data[$counter][3] = $res[3]; //date
        $data[$counter][4] = $res[4]; //coname
        $counter++;
    }
    echo (json_encode($data));

}else if($query=="prod_inf"){
    $bno = $_POST['bno'];
    $data = array();
    $counter = 0;
    $row = mysqli_query($conn, "select * from product_info where bno=$bno;");
    while ($res = mysqli_fetch_array($row, MYSQLI_NUM)) {
        $data[$counter][0] = $res[1]; //pname
        $data[$counter][1] = $res[2]; //price
        $data[$counter][2] = $res[3]; //qty
        $data[$counter][3] = $res[4]; //tax
        $data[$counter][4] = $res[5]; //tprice
        $counter++;
    }
    echo (json_encode($data));
}
?>
