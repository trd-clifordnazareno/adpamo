<?php
class Sales{
  // Properties
  public $client_id;

  // Methods
  function index(){
        
  }
  function set_client_id($client_id_) {
    $this->client_id = $client_id_;
  }
  function get_client_id() {
    return $this->client_id;
  }
  
  
  function get_sales(){
      $datefrom = $_GET['datefrom'];
      $dateto =  $_GET['dateto'];
      
      
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

      $sql = "SELECT * FROM order_info_tbl where enabled='1' and order_date >= '$datefrom' and order_date <= '$dateto'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
      while($row = $result->fetch_assoc()) {
          $_page[] = array(
              'client_name' => $row["client_name"],
                'order_date' => $row["order_date"],
              'item_details_name' => $row['item_details_name'],
                    'quantity' => $row['quantity'],
                    'price_per_size' => $row['price_per_size'],
                    'total_price' => $row['total_price'],
                    'tarp_size_y' => $row['tarp_size_y'],
                    'tarp_size_x' => $row['tarp_size_x'],
                    'project_name' => $row['project_name'],
                    'layoutoption' => $row['layoutoption'],
                    'layoutoption' => $row['layoutoption'],
                    'artistname' => $row['artistname']
            );
        }
        echo json_encode($_page);

        } else {
          echo "0 results";
        }
        $conn->close();
  }
  
  
  
                    
  
  
  
}




if(isset($_GET['operation_type'])){
    if($_GET['operation_type'] == "get_sales"){
        $order = new Sales();
        $order->get_sales();
    }
    
}
