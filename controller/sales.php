<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
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

      $sql = "SELECT * FROM order_info_tbl where enabled='1' and order_date >= '$datefrom' and order_date <= '$dateto'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
        $total_price = 0;
      while($row = $result->fetch_assoc()) {
        
          $get_total_price = $row['total_price'];
          $total_price = $get_total_price + $total_price;
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
                    'artistname' => $row['artistname'],
            'measuretype' => $row['measuretype'],
              'ordersize' => $row['ordersize']
            );
        }
        $x['sales_table'] = $_page;
        $x['total_price_sale'] = $total_price;
        
        
        
        
        $sql_corporate = "SELECT SUM(total_price) AS total_price_corporate FROM order_info_tbl where enabled='1' and type_order = 'Corporate' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_corporate_result = $conn->query($sql_corporate);
        if ($sql_corporate_result->num_rows > 0){
            while($row_corporate = $sql_corporate_result->fetch_assoc()){
                $x['total_sales_corporate'] = $row_corporate['total_price_corporate'];
            }
        }
        
        
        $sql_regular = "SELECT SUM(total_price) AS total_price_regular FROM order_info_tbl where enabled='1' and type_order = 'Regular' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_regular_result = $conn->query($sql_regular);
        if ($sql_regular_result->num_rows > 0){
            while($row_regular = $sql_regular_result->fetch_assoc()){
                $x['total_sales_regular'] = $row_regular['total_price_regular'];
            }
        }
        
        
        $sql_walkin = "SELECT SUM(total_price) AS total_price_walkin FROM order_info_tbl where enabled='1' and type_order = 'Walkin' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_walkin_result = $conn->query($sql_walkin);
        if ($sql_walkin_result->num_rows > 0){
            while($row_walkin = $sql_walkin_result->fetch_assoc()){
                $x['total_sales_walkin'] = $row_walkin['total_price_walkin'];
            }
        }
        
        
        
        
        $sql_tarp_size_ten = "SELECT SUM(tarp_size_y) AS total_tarp_size_ten_y, SUM(tarp_size_x) AS total_tarp_size_ten_x, SUM(quantity) AS quantity_tarp_size_ten FROM order_info_tbl where enabled='1' and item_details_name = 'tarp 10' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_tarp_size_ten_result = $conn->query($sql_tarp_size_ten);
        if ($sql_tarp_size_ten_result->num_rows > 0){
            while($row_tarp_size_ten = $sql_tarp_size_ten_result->fetch_assoc()){
                $x['total_tarp_size_ten_y'] = $row_tarp_size_ten['total_tarp_size_ten_y'];
                $x['total_tarp_size_ten_x'] = $row_tarp_size_ten['total_tarp_size_ten_x'];
                $x['quantity_tarp_size_ten'] = $row_tarp_size_ten['quantity_tarp_size_ten'];
            }
        }
        
        
        $sql_tarp_size_thirteen = "SELECT SUM(tarp_size_y) AS total_tarp_size_thirteen_y, SUM(tarp_size_x) AS total_tarp_size_thirteen_x, SUM(quantity) AS quantity_tarp_size_thirteen FROM order_info_tbl where enabled='1' and item_details_name = 'tarp 13' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_tarp_size_thirteen_result = $conn->query($sql_tarp_size_thirteen);
        if ($sql_tarp_size_thirteen_result->num_rows > 0){
            while($row_tarp_size_thirteen = $sql_tarp_size_thirteen_result->fetch_assoc()){
                $x['total_tarp_size_thirteen_y'] = $row_tarp_size_thirteen['total_tarp_size_thirteen_y'];
                $x['total_tarp_size_thirteen_x'] = $row_tarp_size_thirteen['total_tarp_size_thirteen_x'];
                $x['quantity_tarp_size_thirteen'] = $row_tarp_size_thirteen['quantity_tarp_size_thirteen'];
            }
        }
        
        
        $sql_tarp_size_ten_sale = "SELECT SUM(total_price) AS total_tarp_size_ten_sale FROM order_info_tbl where enabled='1' and item_details_name = 'tarp 10' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_tarp_size_ten_sale_result = $conn->query($sql_tarp_size_ten_sale);
        if ($sql_tarp_size_ten_sale_result->num_rows > 0){
            while($row_tarp_size_ten_sale = $sql_tarp_size_ten_sale_result->fetch_assoc()){
                $x['total_tarp_size_ten_sale'] = $row_tarp_size_ten_sale['total_tarp_size_ten_sale'];
            }
        }
        
        
        $sql_tarp_size_thirteen_sale = "SELECT SUM(total_price) AS total_tarp_size_thirteen_sale FROM order_info_tbl where enabled='1' and item_details_name = 'tarp 13' and order_date >= '$datefrom' and order_date <= '$dateto'";
        $sql_tarp_size_thirteen_sale_result = $conn->query($sql_tarp_size_thirteen_sale);
        if ($sql_tarp_size_thirteen_sale_result->num_rows > 0){
            while($row_tarp_size_thirteen_sale = $sql_tarp_size_thirteen_sale_result->fetch_assoc()){
                $x['total_tarp_size_thirteen_sale'] = $row_tarp_size_thirteen_sale['total_tarp_size_thirteen_sale'];
            }
        }
        echo json_encode($x);

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
