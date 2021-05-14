<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
class Assignment{
  // Properties
  
  // Methods
  


  function test_view_chassis(){
    $this->load_chassis();
  }
  function view_item_price($item){
    $memory_price['item_memory_price'] = $this->view_specs_price($item);
    echo json_encode($memory_price);
  
  }
function test_chassis_title_and_price($motherboard){
    
    echo $this->view_chassis($motherboard);
}


function view_chassis($motherboard){
    $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $get_chassis_name = "SELECT * FROM chassis where motherboard = '$motherboard'";
      $result_chassis_name = $conn->query($get_chassis_name);

      if ($result_chassis_name->num_rows > 0) {
        $chassis_title = "";
        $chassis_motherboard = "";
      while($row_chassis_name = $result_chassis_name->fetch_assoc()) {
        
          $chassis_title = $row_chassis_name['chassis_title'];
          $chassis_motherboard = $row_chassis_name['motherboard'];
          //
          
          //

            $x['chassis_title'] = $chassis_title;
            $x['motherboard'] = $chassis_motherboard;
            $x['price'] = $this->view_specs_price($motherboard);
            $mobo = $this->view_motherboard_name($motherboard);
            $get_memory_price = $mobo['memory_name'];
            $get_cpu_price = $mobo['cpu_name'];
            
            $x['motherboard_model'] = $mobo['model'];
            $x['motherboard_memory'] = $mobo['memory_type'];
            $x['motherboard_cpu_family'] = $mobo['cpu_family'];
            $x['memory_name'] = $mobo['memory_name'];
            $x['cpu_name'] = $mobo['cpu_name'];
            
            $x['motherboard_price'] = $this->view_specs_price($motherboard);
            $x['memory_price'] = $this->view_specs_price($get_memory_price);
            $x['cpu_price'] = $this->view_specs_price("$get_cpu_price");
            return json_encode($x);
                break;
            }
        
  }
}


function view_motherboard_name($motherboard){
  $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql_chasis_price = "SELECT * FROM mobo where model = '$motherboard'";
    $result_chasis_price = $conn->query($sql_chasis_price);

    if ($result_chasis_price->num_rows > 0) {
      $motherboard_name = "";
      $mobo_array = array();
    while($row_chasis_price = $result_chasis_price->fetch_assoc()) {
      
      $mobo_array['model'] = $row_chasis_price['model'];
      $mobo_array['memory_type'] = $row_chasis_price['memory_type'];
      $mobo_array['cpu_family'] = $row_chasis_price['cpu_family'];
      $mobo_array['memory_name'] = $row_chasis_price['memory_name'];
      $mobo_array['cpu_name'] = $row_chasis_price['cpu_name'];

              break;
          }return $mobo_array;
      
}
}



function view_specs_price($data){
  $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql_motherboard_price = "SELECT * FROM price where par = '$data'";
    $result_motherboard_price = $conn->query($sql_motherboard_price);

    if ($result_motherboard_price->num_rows > 0) {
      $motherboard_price = "";
    while($row_motherboard_price = $result_motherboard_price->fetch_assoc()) {
      
      $motherboard_price = $row_motherboard_price['price'];

        //
        
        //

          //$x['view_price'] = $chassis_title;
          return $motherboard_price;
              break;
          }
      
}
}
function test_view_memory_and_cpu(){
  $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
      $sql = "SELECT * FROM mobo";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
      while($row = $result->fetch_assoc()) {
        
         
          $_page[] = array(
              'memory_type' => $row["memory_type"],
              'cpu_family' => $row["cpu_family"],
              'memory_name' => $row['memory_name']
                
            );
        }
        $x = $_page;
  }
  return $x;
}

function load_chassis(){
  $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
      $sql = "SELECT * FROM chassis";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
        $chassis_sku = "";
      while($row = $result->fetch_assoc()) {
        
          $chassis_sku = $row['chassis_sku'];
          $_page[] = array(
              'motherboard' => $row["motherboard"],
              'chassis_title' => $row['chassis_title']
                
            );
        }
        $x['view_memory_and_cpu'] = $this->test_view_memory_and_cpu();
        $x['chassis_sku'] = $chassis_sku;
        $x['chassis'] = $_page;
  }
  echo json_encode($x);
}
function test_get_memory(){
  $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
      $sql = "SELECT * FROM memory";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
      while($row = $result->fetch_assoc()) {
        
          $_page[] = array(
              'memory_name' => $row["memory_name"],
              'memory_type' => $row['memory_type']
                
            );
        }
        $x['memory_specs'] = $_page;
  }
  echo json_encode($x);
}
function test_get_cpu(){
 $servername = "brib8pffxfwodem76tm5-mysql.services.clever-cloud.com";
      $username = "uoda79man3frv2ey";
      $password = "7j6L6wOWNiGBz68Bp5TQ";
      $dbname = "brib8pffxfwodem76tm5";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  
    $sql = "SELECT * FROM cpu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $_page = array();
    while($row = $result->fetch_assoc()) {
      
        $_page[] = array(
            'cpu_name' => $row["cpu_name"],
            'cpu_family' => $row['cpu_family']
              
          );
      }
      $x['cpu_specs'] = $_page;
}
echo json_encode($x);
}

  
}




if(isset($_GET['test_view_chassis'])){
    if($_GET['test_view_chassis'] == "view_chassis"){
        $order = new Assignment();
        $order->test_view_chassis();
    }
    
}
if(isset($_GET['test_chassis_title_and_price'])){
    
        $order = new Assignment();
        $order->test_chassis_title_and_price($_GET['test_chassis_title_and_price']);
    
    
}
if(isset($_GET['test_get_memory_cpu_price'])){
    
  $order = new Assignment();
  $order->view_item_price($_GET['test_get_memory_cpu_price']);


}
if(isset($_GET['test_get_memory'])){
    
  $order = new Assignment();
  $order->test_get_memory();


}
if(isset($_GET['test_get_cpu'])){
    
  $order = new Assignment();
  $order->test_get_cpu();


}
/*if(isset($_GET['test_view_memory'])){
    
  $order = new Assignment();
  $order->test_view_memory($_GET['test_view_memory']);


}*/


/*
function view_chasis_price($motherboard){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "brib8pffxfwodem76tm5";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql_chasis_price = "SELECT * FROM price where par = '$motherboard'";
      $result_chasis_price = $conn->query($sql_chasis_price);

      if ($result_chasis_price->num_rows > 0) {
        $chassis_price = "";
      while($row_chasis_price = $result_chasis_price->fetch_assoc()) {
        
        $chassis_price = $row_chasis_price['price'];

          //
          
          //

            //$x['view_price'] = $chassis_title;
            return $chassis_price;
                break;
            }
        
  }
}
function view_motherboard_price($motherboard){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "brib8pffxfwodem76tm5";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql_motherboard_price = "SELECT * FROM price where par = '$motherboard'";
    $result_motherboard_price = $conn->query($sql_motherboard_price);

    if ($result_motherboard_price->num_rows > 0) {
      $motherboard_price = "";
    while($row_motherboard_price = $result_motherboard_price->fetch_assoc()) {
      
      $motherboard_price = $row_motherboard_price['price'];

        //
        
        //

          //$x['view_price'] = $chassis_title;
          return $motherboard_price;
              break;
          }
      
}
}*/


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

      $sql = "SELECT * FROM chassis";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $_page = array();
        $total_price = 0;
      while($row = $result->fetch_assoc()) {
        
          $chassis_sku = $row['chassis_sku'];
          $total_price = $get_total_price + $total_price;
          $_page[] = array(
              'mother_board' => $row["mother_board"],
                
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

