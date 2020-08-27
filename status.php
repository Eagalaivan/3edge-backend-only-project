<?php
session_start();
$productcode='';
$description='';
$type='';
$name='';
$Complaint='';
$servername="localhost";
$username="root";
$password="";
$dbname="crm";
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>STATUS</title>
</head>
<body  >
	<center style="font-size: 30px">
<b>QUERY COMPLAINT STATUS</b>
</center>
<form method="post" action="status.php" id="phone">

<p>
	<label  style="font-size: 20px"> <b>Complaint Number# </b>

	
		<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input style="width: 350px"  type="text" id="phone" name="phone"  size=10 />
			</center>
	
			<br>		
				<input type="submit" name="submit" value="submit" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<input type="button" value="Clear" onclick="window.location.href='status.php'" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
			</form>
			<?php 
	
$msg = "";


if (isset($_POST["submit"])) {  
$Complaint = $_POST["phone"];
if(empty($Complaint)) {
 $message="Enter the complaint number" ;
echo "<script type='text/javascript'>alert('$message');</script>";
} else if(!is_numeric($Complaint)) {

 $message="Data entered was not numeric" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
//echo $Complaint;
$sql="SELECT * FROM complaint WHERE Complaint_number='$Complaint'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {  
?>

</label>

</p>

<h3 style="font-size: 30px">  <center>COMPLAINT STATUS </center></h3>

			<label style="font-size: 20px"> <b> Complaint#</b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<center>
				<textarea rows="4" cols="50"> <?php  echo $row['Complaint_number']; ?></textarea>
			</center>
		<label style="font-size: 20px"><b> Product Name </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<center>
				<textarea rows="4" cols="50"><?php  echo $row['Product_code']; ?></textarea>
			</center>
		
		
			<label style="font-size: 20px"> <b> Complaint </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<center>
				<textarea rows="4" cols="50"><?php  echo $row['Complaint_type']; ?> </textarea>
			</center>
		
		
			<label style="font-size: 20px"><b> Current Status </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<center>
				<textarea rows="4" cols="50"><?php  echo $row['Complaint_status']; ?></textarea>
			</center>
		
		
			<label style="font-size: 20px"><b> As of </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<center>
				<textarea rows="4" cols="50"><?php  echo $row['Complaint_date']; ?></textarea>
			</center>
			<p>
			<p>
				<form>
					<center>
						<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
					</center>

			</form>

<?php 
}}

?>
</body>
</html>
