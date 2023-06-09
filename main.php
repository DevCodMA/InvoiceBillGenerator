<?php
require 'connection.php';
$uname = $_POST['uname'];
$password = $_POST['password'];
$res = mysqli_fetch_array(mysqli_query($conn,"select password from admin where uname = '$uname'"), MYSQLI_NUM);
if(!$res)
echo("No such user found!");
else{
    setcookie("username", $uname, time() + (86400 * 30), "/");
    if($password==$res[0])
    echo("1");
    else
    echo("0");
}
?>
