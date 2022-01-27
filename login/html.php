<?php
//Getting default page number
function connect()
{
	$servername = "localhost";
$username = "root";
$password = "";
$database="food_restraunt";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
}

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
// Formula for pagination
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM user";
        $conn=connect();
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $sql = "SELECT * FROM user LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        $cnt=1;
        while($row = mysqli_fetch_array($res_data)){
        ?>

    
    
 <?php
$cnt++;
  }
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Email</th>
<th>Password</th>
<th><a href="updation.php">update</a>|<a href="delete.php">Delete</a></th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "food_restraunt");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT user_id, username,email, password FROM user";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
// output data of each row
while($row = $result->fetch_assoc()) 
{
echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["username"] . "</td><td>". $row["email"] . "</td><td>". $row["password"]. "</td></tr>";
}
echo "</table>";
}
 else { echo "0 results"; }
$conn->close();
?>
</table>
<div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</div>
</body>
</html>

    