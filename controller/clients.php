<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
class Clients {
  // Properties
  public $client_id;

  // Methods
  function index(){
      $servername = "bitkvtrcb83u4zewwxlm-mysql.services.clever-cloud.com";
        $username = "uoda79man3frv2ey";
        $password = "7j6L6wOWNiGBz68Bp5TQ";
        $dbname = "bitkvtrcb83u4zewwxlm";

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
  }
  function set_client_id($client_id_) {
    $this->client_id = $client_id_;
  }
  function get_client_id() {
    return $this->client_id;
  }
  public function show(){
      echo $this->client_id;
      
      
       $servername = "bitkvtrcb83u4zewwxlm-mysql.services.clever-cloud.com";
        $username = "uoda79man3frv2ey";
        $password = "7j6L6wOWNiGBz68Bp5TQ";
        $dbname = "bitkvtrcb83u4zewwxlm";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE clients_tbl SET enabled='0' WHERE client_id=3 and enabled = '1'";

        if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }

        $conn->close();
  }
  public function edit(){
       $servername = "bitkvtrcb83u4zewwxlm-mysql.services.clever-cloud.com";
        $username = "uoda79man3frv2ey";
        $password = "7j6L6wOWNiGBz68Bp5TQ";
        $dbname = "bitkvtrcb83u4zewwxlm";

      
      $client_id_details = $_GET['client_id_details'];
      $client_name_details = $_GET['client_name_details'];
      $client_address_details = $_GET['client_address_details'];
      $client_number_details =      $_GET['client_number_details'];
      
      
      
      // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE clients_tbl SET client_name='$client_name_details', address='$client_address_details', contact= '$client_number_details' WHERE client_id='$client_id_details' and enabled = '1'";

        if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }

        $conn->close();
  }
}


if(isset($_GET['client_id'])){
    $client = new Clients();
$client->set_client_id($_GET['client_id']);
$client->get_client_id();
$client->show();
}
if(isset($_GET['load_clients'])){
    $client = new Clients();
    $client->index();
}if(isset($_GET['operation_type'])){
    $client = new Clients();
    $client->edit();
}
