<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCT FEATURES</title>
	</head>
	<body  style="Features.css">
		<center>
			<h3>
				<ul style="font-size: 60px"> QUERY PRODUCT
			</h3>
				</ul>
		</center>
		<form action="Features.php" method="get">
				<b style="font-size: 20px">Select Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				</b>
			<select name="search">

<?php
$search="";
$selected_val="";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM product ORDER BY Base_Price DESC";
$result = $conn->query($sql);
?>
 <option value="-1"> select....</option>
 <?php
 while($row=mysqli_fetch_assoc($result)) {
 ?>

 <option >	
<?php echo $row['Product_Code'];
}?>
</option>


			</select>
		
				<p></p>
				
				<input type="submit" name="submit" value="Show product details" />
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
			</form>
			

		<?php
if(isset($_GET['submit'])){
$selected_val = $_GET['search'];  // Storing Selected Value In Variable
?>
<center>
				<label style="font-size: 50px">
								 <b>PRODUCT FEATURES</b>
			
		</label>
		</center>
<center><b> 
<?php
if($selected_val==-1){
$message="Please select a product" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
	echo "You have selected :" ."$selected_val";
}
$sql1="SELECT * FROM product_feature WHERE Product_Code='$selected_val'";
$result1=$conn->query($sql1);
while($row1=mysqli_fetch_assoc($result1)){
	?>
</center>
	<p>
<label><b> Description</b></label>

 </b> 


			<center>
				<textarea rows="6" cols="50"> <?php  echo $row1["description"] ?></textarea>
			</center>
</p>

<label> <b> Features</b> </label>



			<center>
				<textarea rows="6" cols="50"> <?php  echo $row1["Feature_desc"] ?></textarea>
			</center>
	
		
			<label> <b>Product code</b></label>


			<center>
				<textarea rows="6" cols="50"> <?php echo $row1["Product_Code"]; ?> </textarea>
			</center>

<?php 
		$sql2="SELECT * FROM product WHERE Product_Code='$selected_val'";
$result2=$conn->query($sql2);
		
		while($row2=mysqli_fetch_assoc($result2)){		

?>
<p>
			<label> <b>Base Price</b></label>

			<center>
				<textarea rows="6" cols="50"> <?php 
	echo $row2["Base_Price"];
	 ?></textarea>
			</center>
		</p>
		<p>
			<label> <b>Warranty</b></label>


			<center>
				<textarea rows="6" cols="50">  <?php 
	echo $row2["Warranty_months"];
	  ?></textarea>
			</center>
		</p>
		<p>
			<label> <b>years</b></label>
			<center>
				<textarea rows="6" cols="50"> <?php 
				$wyr=12;
				$yr=$row2["Warranty_months"]/$wyr;
				echo "$yr";
				  ?>
		</textarea>
			</center>
		</p>
		<p>
			<label> <b>launch date </b></label>
			<center>
				<textarea rows="6" cols="50">  
	<?php  echo $row2["Launch_date"];?>
				</textarea>
			</center>
		</p>
				<input type="button" value="Clear" onclick="window.location.href='Features.php'" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
		<?php } ?>
	<?php }} ?>
	</body>
</html>
