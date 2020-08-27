<?php
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
	<title>Pricing</title>
</head>
<body>
	<p>
		<b style="font-size: 50px"><center >
			PRODUCT PRICING
		</b>	
	</center>
	</p>
		<p>
			<form action="Pricing.php" method="get">
			<b style="font-size: 20px">Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
			<select name="search1">
				<?php
				$selected_val="";
				$sql = "SELECT * FROM product ORDER BY Base_Price DESC ";
$result = $conn->query($sql);
?>
 <option value="-1"> select....</option>
 <?php
		 while($row = $result->fetch_assoc()) {    

		 	?>
			
					<option>
	<?php echo $row["Product_Code"];
	 }
 	?>

					</option>
			</select>
		</p>
		<p>
			<label> <b>Battery
				<input type="checkbox" name="Battery" value="yes" checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				required? (additional cost for battery will added)
			</b>

			</label>
			<?php
			if(isset($_GET['Battery'])){
$radio1=$_GET["Battery"];
//echo $radio1 . "selected   "; 
}
?>
  	<br>
  	<br>
  	<b>
  	<input type="radio" name="rad" value="At service center">At service center
  	<input type="radio" name="rad" value="At client place" > At client place 
  	</b>
  	<?php
			if(isset($_GET['rad'])){
$radio2=$_GET["rad"];
//echo $radio2 . "  selected   "; 
}
?>
<p></p>
  	<label>
  		<b>
  			Additonal Warranty
  		</b>
  		<select name="search">
 			<option value="-1"> select....</option>
   			<option  value="0" > 0 </option>
  			<option  value="1" > 1 </option>
  			<option value="2"> 2 </option>
  			
  		</select>
  		(extra cost for additonal warranty[5% per year])
  	</label>
 			<br>
			<br>
				<input type="submit" name="submit" value="submit"  >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" name="submit" value="clear" onclick="window.location.href= 'Pricing.php'"  >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
				<p>
				</p>
</form>
<?php
if(isset($_GET['submit'])){
$selected_val = $_GET['search'];
//echo " year selected"." " .$selected_val;
}
 // Storing Selected Value In Variable
 if(isset($_GET['submit'])){
$selected_val1 = $_GET['search1'];
//echo " product selected"." " .$selected_val1;
if($selected_val1==-1){
$message="Please select a product" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
else if ($radio2=="" or $radio1=="" ) {
$message="Please select service location" ;
echo "<script type='text/javascript'>alert('$message');</script>";
	
}
else if($selected_val==-1){
$message="Please select warranty" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
else{

		 
?>
<?php
$sql1 = "SELECT * FROM product WHERE Product_Code='$selected_val1' ";
$result1 = $conn->query($sql1);
		 while($row1 = $result1->fetch_assoc()) {    


?>
<br>
<label style="font-size: 20px"> <b>Product </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50"><?php echo  $selected_val1; ?></textarea>
		</center>
	</p>
	<p>
		<label style="font-size: 20px"><b> Base price </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50"> <?php echo $row1["Base_Price"]; ?></textarea>
		</center>
	</p>
	<p>
		<label style="font-size: 20px"> <b>Battery required? </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50"> <?php 
echo $radio1 . "  INR-" . $row1["Battery_price"];

			 ?> </textarea>
		</center>
	</p>
	<p>
		<label style="font-size: 20px"><b> Service  Location </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50"><?php echo $radio2; ?> </textarea>
		</center>
	</p>
	<p>
		<label style="font-size: 20px"><b> Additional Warranty </b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50">  <?php echo $selected_val ." year ";?> </textarea>
		</center>
	</p>
	<p>
		<?php 
		//calculating final price
		if ($radio2="At client place" and $selected_val==1) {
		
		$finalprice=($row1["Base_Price"])+((0.05)*$row1["Base_Price"]+$row1["Battery_price"]);
		}
		elseif ($radio2="At client place" and $selected_val==2) {
			$finalprice=($row1["Base_Price"])+(2*(0.05)*$row1["Base_Price"]+$row1["Battery_price"]);
		}
		elseif ($radio2="At service center ") {
			$finalprice=$row1["Base_Price"]+$row1["Battery_price"];
		}
		else{
			echo "No Options selected";
		}



		?>
		<label style="font-size: 20px"> <b>Final price (BasePrice+Battery cost+Additional Warranty)</b></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<center>
			<textarea rows="4" cols="50"> INR-<?php  echo $finalprice;?></textarea>
		</centera>
	</p>
	<p>
		<form action="productpricing.php" method="get">
			<center>
				<input type="button" value="back" onclick="window.location.href='Welcome.php'" />
			</center>
		</form>
		
		<?php } } } ?>
</body>
</html>
