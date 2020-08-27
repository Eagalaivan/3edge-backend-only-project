<?php
session_start();
$productcode='';
$description='';
$type='';
$name='';
$number='';
$servername="localhost";
$username="root";
$password="";
$dbname="crm";
$msg1 = "";
$msg = "";
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER COMPLAINTS</title>
</head>
<body  >
	<center style="font-size: 50px">
<b>REGISTER COMPLAINT</b>
</center>

<form method="get" action="Complaints.php" id="phone">
<p>
	<label style="font-size: 20px"> <b>Customer name </b></label>
		<center>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input style="width: 350px"  type="text" id="phone" name="name"  size=10 />
		</center>

</p>
<p>
	<label style="font-size: 20px"> <b>contact phone# </b>
		<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input style="width: 350px"  type="text" id="phone" name="phone"  size=10 /><?php echo $msg; ?>
		
</center>
</label>

</p>
	
			<b style="font-size: 20px"><b>Product <center> </b> 
				<select name="prod" >
				<?php			
				$sql = "SELECT * FROM product ORDER BY Base_Price DESC";
				$result = $conn->query($sql);
				?>
 <option value="-1"> select....</option>
 <?php
		 		 while($row = $result->fetch_assoc()) {  
		 		?>
			
					<option>
				
						<?php echo $row["Product_Code"];
							 }?>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
	
					</option>
				</select>
							
	</center> 
				<p>
		<label style="font-size: 20px"><b> Complaint description </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea name="description" rows="5" cols="50"></textarea>
		</center>
			</p>

		<p>
			<b style="font-size: 20px"><b>Complaint type <center></b> 
			<select name="type">
				<option value=-1> select...</option>
				<option  value="Equipment malfunction"> Equipment malfunction</option>
				<option value="Price charged is too high"> Price charged is too high </option>
				<option value="Service not rendered in time"> Service not rendered in time </option>
				<option value="Service center not responsive"> Service center not responsive </option>
				<option value="Others"> Others </option>
		</select>
		</center>
		</p>

<p>
	<?php
 
if (isset($_GET["submit"])) {  
$name = $_GET["name"];

if(empty($name)) {
$message="Enter your name" ;
echo "<script type='text/javascript'>alert('$message');</script>";
} 
else if (!preg_match("/^[A-Za-z\\- \']+$/",$name)) {
  
  $message="Invalid Name" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
else {
  $msg1= "Valid Name";
   $message="Valid Name" ;
echo "<script type='text/javascript'>alert('$message');</script>";

}} 
if (isset($_GET["submit"])) {  
$number = $_GET["phone"];

if(empty($number)) {
 $message="Enter your phone number" ;
echo "<script type='text/javascript'>alert('$message');</script>";
} else if(!is_numeric($number)) {

 $message="Data entered was not numeric r" ;
echo "<script type='text/javascript'>alert('$message');</script>";
} else if(strlen($number) != 10) {
 $message="The number entered was not 10 digits long" ;
echo "<script type='text/javascript'>alert('$message');</script>";
} else {
header('location:confirmation.php');
}}
if(isset($_GET['submit'])){
$productcode = $_GET['prod'];  // Storing Selected Value In Variable
 //echo "You have selected :" ."$selected_val" ;  // Displaying S
if($productcode==-1)
{
	$message="select a product";
	echo "<script type='text/javascript'> alert('$message');</script>";
}
}
?>
<?php
if(isset($_GET['submit'])){
$description = $_GET['description'];  // Storing Selected Value In Variable
// echo "You have selected :" ."$selected_val" ;  // Displaying S
}
?>
<?php
if(isset($_GET['submit'])){
$type = $_GET['type'];  // Storing Selected Value In Variable
//echo $selected_val1 ;  // Displaying S
if($type==-1)
{
	$message="select complaint type";
	echo "<script type='text/javascript'> alert('$message')</script>";
}
}
$_SESSION['pass3']=$productcode;
$_SESSION['pass4']=$type;
$_SESSION['pass5']=$description;
$_SESSION['pass']=$number;
$_SESSION['pass1']=$name;
?>
			
				<input type="submit" name="submit" value="submit"  />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	
				<input type="button" value="Clear" onclick="window.location.href='Complaints.php'" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
			</form>

</body>
</html>
