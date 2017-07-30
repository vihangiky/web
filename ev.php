<?php
$con=mysqli_connect("localhost","root","","web");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$event = $_POST["event"];
$date = $_POST["date"];
$time = $_POST["time"];
$club = $_POST["club"];
$hall = $_POST["hall"];

$r = mysqli_query($con,"insert into event (event, date,time,club) values('".$event."','".$date."','".$time."','".("select ID from club where name = '".$club."'")."')");
if (!$r) {
	echo "error in query".mysqli_error($con);
}
$sql =mysqli_query("update hall set availability='not available' club='".("select ID from club where name = '".$club."'")."', event='".("select ID from event where event = '".$event."'")."' where ID='".$hall."'");
if (!$sql) {
	echo "error in query".mysqli_error($con);
}else
echo("<SCRIPT LANGUAGE = 'javascript'>
        window.alert('Event created successfully')
        </SCRIPT>");

?>