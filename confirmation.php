<!DOCTYPE html>
<html>
<head>
	<title>CONFIRMATION</title>
</head>
<body>
<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="crm";
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$random=random_int(123456,654321);
//echo  $random;
$date = date("Y-m-d"); //existing date
$date2= date('Y-m-d', strtotime($date .'+2 weeks'));
$number=$_SESSION['pass'];
$name=$_SESSION['pass1'];
$productcode=$_SESSION['pass3'];
$type=$_SESSION['pass4'];
$description=$_SESSION['pass5'];
/*echo "random". $random;
echo "date". $date2;
echo "phone" .$number;
echo "name". $name;
echo "product code" .$productcode;
echo "  type" .$type;
echo " description" . $description;
*/
$sql="INSERT INTO complaint VALUES('$random','$name','$number','$productcode','$description','$type','$date','Registered','$date2')";
if (mysqli_query($conn, $sql)) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>	
	<center style="font-size: 50px"><h3> CONFIRMATION</h3></center>
<center><label> <b>The complaint has been registered </b></label></center>
<label style="font-size: 20px"> <b>The complaint number is </b></label>
<center>
			<textarea rows="5" cols="50"> <?php echo $random ?></textarea>
		</center>
		<label style="font-size: 20px"> <b>Expected resolution date is </b></label>
		<center>
			<textarea rows="5" cols="50"> <?php echo $date2; ?></textarea>
		</center>
		<?php session_destroy(); ?>
		<p>
			<form>
				<input type="button" value="ok" onclick="window.location.href='complaints.php'" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
				
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
			</form>
		</p>
</body>
</html>