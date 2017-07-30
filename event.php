<html>
<head>
	<title>Events</title>
	<link rel="stylesheet" type="text/css" href="notes.css">
</head>
<body>
<div class="topnav">
  <a href="notes.html">Course</a>
  <a href="club.html">Clubs</a>
  <a href="event.html">Events</a>
  <a href="logout.php">Logout</a>
</div>
<div> 
	<h2>Current Events</h2>
</div>

<?php
$con=mysqli_connect("localhost","root","","web");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT event.event,event.date,event.time,club.name from event join club on event.club=club.id");
echo "<link rel='stylesheet' type='text/css' href='notes.css'/>";
echo "<table border='0' align='centre' cellspacing='20' cellpading='10' class='general ev'>
	<tr> 
		<th>Event Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Club</th>
	</tr>";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['event'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['time'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "</tr>";
}
echo "</table>";

$r = mysqli_query($con,"SELECT hall.ID,hall.availability,event.event,club.name from hall left join club on hall.club=club.id left join event on hall.event=event.id");
echo "<link rel='stylesheet' type='text/css' href='notes.css'/>";
echo "<table border='0' align='right' cellspacing='10' cellpading='10' class='general' style='font-size:20'>
	<tr> 
		<th>Hall ID</th>
		<th>Availability</th>
		<th>Event</th>
		<th>Club</th>
	</tr>";
while($row = mysqli_fetch_array($r))
{

echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['availability'] . "</td>";
echo "<td>" . $row['event'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
<form action="c.php" method="POST"><input type="button" value="Cancel an Event"  style="color:#f0ecec; background:#1c255c; border-radius: 4px 4px 4px 4px;">
			</form>
<form action="ev.php" method="POST">
	<table border="0" align="left" cellspacing="5" cellpadding="7" class="general" style="font-size:22">
		<tr>
			<td>
				<label>Event Name:</label>
			</td>
			<td>
				<input type="text" id="event" palceholder="Event Name">
			</td>
		</tr>
		<tr>
			<td>
				<label>Event Date:</label>
			</td>
			<td>
				<input type="date" id="date">
			</td>
		</tr>
		<tr>
			<td>
				<label>Event Time:</label>
			</td>
			<td>
				<input type="time" id="time">
			</td>
		</tr>
		<tr>
			<td>
				<label>Club Name:</label>
			</td>
			<td><select id="club">
				<?php
				$con=mysqli_connect("localhost","root","","web");
   				 $result = mysqli_query($con,"SELECT * FROM club");
   				 while($row=mysqli_fetch_array($result)){                                                 
       			echo "
       			<option value='".$row['ID']."'>".$row['name']."</option>";
    			}
				?></select>
			</td>
		</tr>
		<tr>
			<td>
				<label>Hall ID:</label>
			</td>
			<td>
				<select id="hall">
				<?php
				$con=mysqli_connect("localhost","root","","web");
   				 $result = mysqli_query($con,"SELECT ID FROM hall where availability='available'");
   				 while($row=mysqli_fetch_array($result)){                                                 
       			echo "
       			<option value='".$row['ID']."'>".$row['ID']."</option>";
    			}
				?>
			</select>
			</td>
		<tr>
			<td><input type="submit" value="Create Event" style="color:#f0ecec; background:#1c255c; border-radius: 4px 4px 4px 4px;">
			</td>

		</tr>
		</tr>
	</table>
</form>
</body>
</html>