<?php
class Order{
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
  
  
  
  
  public function get_client_type($type_client){
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

        $sql = "SELECT * FROM clients_tbl where type_client = '$type_client' and enabled='1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $_page = array();
        while($row = $result->fetch_assoc()) {
            $_page[] = array(
                'client_id' => $row["client_id"],
                'client_name' => $row["client_name"],
                'address' => $row["address"],
                'contact' => $row["contact"],
                'type_client' => $row['type_client']
                // and so on for the rest
            );
        }
        echo json_encode($_page);

        } else {
          echo "0 results";
        }
        $conn->close();
  }
}



if(isset($_GET['load_clients'])){
    $client = new Order();
    $client->index();
}
if(isset($_GET['client_type'])){
    if($_GET['client_type'] == "get_client_corporate"){
        $order = new Order();
        $order->get_client_type("Corporate");
    }
    if($_GET['client_type'] == "get_client_regular"){
        $order = new Order();
        $order->get_client_type("Regular");
    }
}
