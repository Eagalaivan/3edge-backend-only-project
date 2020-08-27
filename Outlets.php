<?php
$i=0;
$radio1='';
$radio2='';
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
		<title>COMPANY OUTLETS</title>
	</head>
	<body ><p >
		<center style="font-size: 50px" >
			  <b>QUERY COMPANY OUTLETS</b>   
		</center>
	</p>
		<p>
			<form action="Outlets.php" method="get">
			<b style="font-size: 30px">City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
			<select name="search">
				<?php
				$selected_val="";
				$sql = "SELECT DISTINCT City FROM outlet ORDER BY Outlet_number";
$result = $conn->query($sql);
?>
 <option value="-1"> select....</option>
 <?php
		 while($row = $result->fetch_assoc()) {    

		 	?>
			
					<option>
	<?php echo $row["City"];
	 }
 	?>
					</option>>
			</select>
		</p>
		<p>
			
				<input type="checkbox" name="same" value="Sales" checked> Sales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="same1" value="Service" checked > Service<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <br>
			
				<input type="submit" name="submit" value="submit"  >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />

		
		</p>
		</form>
		<?php
		if(isset($_GET['same'])){
$radio1=$_GET["same"];
//echo $radio1 . "   selected   "; 
}
if(isset($_GET['same1'])){
$radio2=$_GET["same1"];
//echo $radio2 . "   selected   ";
}

if(isset($_GET['submit'])){
$selected_val = $_GET['search'];  // Storing Selected Value In Variable
if($selected_val==-1){
$message="Please select a city" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
else{


?>

<center style="font-size: 25px" ><b> <?php 

 echo "You have selected :" ."$selected_val"; 

 ?> 

		<center style="font-size: 50px">
			 <b> LIST OF  COMPANY OUTLETS  IN  <?php  echo $selected_val  ?> </b>  
		</center>
		<p>
			<table width="100%"  border="2">
				<tr style="font-size: 30px">
					<td>&nbsp;NO:</td>
					<td>&nbsp;Address</td>
					<td>&nbsp;Phone number</td>
					<td>&nbsp;Outlet type</td>
				</tr>
				<?php 
$sql1="SELECT * FROM outlet WHERE City='$selected_val' AND (Outlet_type='$radio1' OR Outlet_type='$radio2')";
$result1=$conn->query($sql1);
while($row1=$result1->fetch_assoc()){
	$i++;
	
?>
				<tr style="font-size: 20px">
					<td>&nbsp; <?php echo "$i"; ?></td>
					<td>&nbsp; <?php echo $row1["Address1"] . $row1["Address2"] ?></td>
					<td>&nbsp; <?php echo $row1["Contact_Number"] ?></td>
					<td>&nbsp; <?php echo $row1["Outlet_type"] ?></td>
				</tr>
				
				<?php } ?>
				
			</table>
		</p>
		<p>
			<form>
				<center>
					<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
				</center>
			</form>
		</p>
	<?php }} ?>
	</body>
</html>