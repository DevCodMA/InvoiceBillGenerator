<?php
require 'connection.php';
$fname = $_POST['fname'];
$uname = $_POST['uname'];
$pswd = $_POST['pswd'];
$res = mysqli_query($conn, "insert into admin values('$fname','$uname','$pswd')");
if(!$res)
echo("0");
else
echo("1");
?>