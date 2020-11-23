<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adpamo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clients_tbl where enabled='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  
  
  
  
  $_page = array();
while($row = $result->fetch_assoc()) {
    $_page[] = array(
        'client_id' => $row["client_id"],
        'client_name' => $row["client_name"],
        'address' => $row["address"],
        'contact' => $row["contact"]
        // and so on for the rest
    );
}

echo json_encode($_page);

} else {
  echo "0 results";
}




        
        
$conn->close();
?>