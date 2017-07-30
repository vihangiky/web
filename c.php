<?php
$con=mysqli_connect("localhost","root","","web");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$event = $_POST["event"];
if (empty($event)) {
	echo("<SCRIPT LANGUAGE = 'javascript'>
        window.alert('Enter the event name')
        </SCRIPT>");
}
$r=mysqli_query($con,"delete from event where event='".$event."' ");
if (!$r) {
	echo "error in query".mysqli_error($con);
}else
echo("<SCRIPT LANGUAGE = 'javascript'>
        window.alert('Event deleted successfully')
        </SCRIPT>");
?>