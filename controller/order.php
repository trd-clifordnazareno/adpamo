<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
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
  
  
  public function insert_order(){
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
        
        
        $selectedOption=$_GET['selectedOption'];
        $selectedOptioncorporate=$_GET['selectedOptioncorporate'];
        $complete_from_date=$_GET['complete_from_date'];
        $typeoftarp=$_GET['typeoftarp'];
        $tarpquantity=$_GET['tarpquantity'];
        $size_y=$_GET['size_y'];
        $size_x=$_GET['size_x'];
        $price=$_GET['price'];
        $get_total_price=$_GET['get_total_price'];
        $projectname=$_GET['projectname'];
        $type_of_measurement=$_GET['type_of_measurement'];
        $layoutoption = $_GET['layoutoption'];
        $artistname = $_GET['artistname'];
        $walkininputclient = $_GET['walkininputclient'];
    $ordersize = $_GET['ordersize'];
        
        
        
        
        
        
        
        $sql = "SELECT * FROM clients_tbl where client_id = '$selectedOptioncorporate' and enabled='1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                    $client_name = $row["client_name"];    
            }
        }else{
            $selectedOptioncorporate = 0;
            $client_name = $walkininputclient;    
        }
        
        
        
        
        
                                

        $sql = "INSERT INTO order_info_tbl (client_id, client_name, type_order, order_date, ordersize, item_details_name, quantity, price_per_size, total_price, tarp_size_y, tarp_size_x, project_name, layoutoption, artistname, measuretype, enabled)
                                    VALUES ('$selectedOptioncorporate', '$client_name', '$selectedOption', '$complete_from_date', '$ordersize', '$typeoftarp', '$tarpquantity', '$price', '$get_total_price', '$size_y', '$size_x', '$projectname', '$layoutoption', '$artistname', '$type_of_measurement', 1)";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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




if(isset($_GET['operation_type'])){
    if($_GET['operation_type'] == "insert_order"){
        $order = new Order();
        $order->insert_order("Corporate");
    }
    
}
