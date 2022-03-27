<?php

// Create connection
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "workorder";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$tdStyle = "style='color:red;'";

$sql = "SELECT * FROM dispatcher WHERE name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
        echo "
          <tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['phone']."</td>
            <td><a href='#'><button>DETAILS</button></a></td>
            <td><a href='#'><button>UPDATE</button></a></td>
            <td><a href='#'><button>DELETE</button></a></td>
          </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>