<?php


$username=$_POST['username'];
$password=$_POST['password'];

$link=mysqli_connect("localhost","root","","web") or die($link);

$username=stripcslashes($username);
$password=stripcslashes($password);
$username=mysqli_real_escape_string($link,$username);
$password=mysqli_real_escape_string($link,$password);

$result=mysqli_query($link,"select * from user where username='$username' and password='$password'") or 
			die("Failed!!".mysqli_query());
if (!$result) {
	echo "error in query".mysqli_error($link);
}

$row=mysqli_fetch_array($result);
if ($row['username']==$username && $row['password']==$password) {
	echo("<SCRIPT LANGUAGE = 'javascript'>
        window.location.href = 'notes.html'
        </SCRIPT>");
} else {
	echo "Failed";
}

?>