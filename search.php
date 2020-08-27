<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="test";
    $con=mysqli_connect($servername,$username,$password,$dbname);
    $strkey=$_POST['name'];
    $sql1="SELECT * FROM test WHERE name='$strkey'";
    $query=mysqli_query($con,$sql1);
   while ($row=mysqli_fetch_assoc($query)){
        # code...
        echo $row["name"];
        echo $row["phone"];
        //while($row = $result->fetch_assoc())
        //while ($row=mysqli_fetch_assoc($query))
    }
    ?>
    <form action="search.php" method="post">
        search data:<input type="text" name="name">
    </form>

</body>
</html>