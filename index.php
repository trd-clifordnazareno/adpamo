<!DOCTYPE html>
<html lang="en-US">
<script src="angular/angular.min.js"></script>
<script src="angular/angular-route.js"></script>
<body>

<div ng-app="myApp">
  <div ng-include="'header.php'"></div>

  
    


  <div ng-include="'footer.php'"></div>
</div>

</body>
</html>




<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "ajax/clients/display_clients.php",
        controller: "get_clients_model"
    })
    .when("/edit_clients_form/:clients_id/:clients_name/:clients_address/:clients_contact", {
        templateUrl : "ajax/clients/edit_clients.php",
        controller: "edit_clients_controller"
    })
    .when("/order", {
        templateUrl : "ajax/order/add_clients.php",
        controller: "order_clients_controller"
    })
    .when("/sales", {
        templateUrl : "ajax/sales/sales_report.php",
        controller: "sales_controller"
    })
    .when("/add_clients", {
        templateUrl : "ajax/clients/add_clients.php",
        controller: "get_clients_model"
    })
    .when("/test", {
        templateUrl : "ajax/assignment/views.php",
        controller: "test"
    })
    .otherwise({
        redirectTo: '/'
    });;
});


app.controller('test', function($scope, $http, $location, $routeParams){
    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_view_chassis=view_chassis")
                .then(function (response) {
                    $scope.chassises = response.data.chassis;
                    $scope.motherboard_specs_memory = response.data.view_memory_and_cpu;
                    $scope.motherboard_specs_cpu = response.data.view_memory_and_cpu;
                });


                $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_get_memory=get_memory")
                .then(function (response) {
                    $scope.memory_specs = response.data.memory_specs;
                });
                $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_get_cpu=get_cpu")
                .then(function (response) {
                    $scope.cpu_specs = response.data.cpu_specs;
                });


                

                $scope.get_chassis_id = function($_name){
                    
                    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_chassis_title_and_price="+$_name)
                    .then(function (response) {
                        $scope.title = response.data.chassis_title;
                        $scope.motherboard = response.data.motherboard;
                        $scope.chassis_price = response.data.price;
                        $scope.mother_board = response.data.motherboard_model;
                        $scope.motherboard_price = response.data.motherboard_price;
                        $scope.motherboard_memory = response.data.motherboard_memory;
                        $scope.memory_price = response.data.memory_price;
                        $scope.motherboard_cpu_family = response.data.motherboard_cpu_family;
                        $scope.cpu_price = response.data.cpu_price;
                        $scope.memory_name = response.data.memory_name;
                        $scope.cpu_name = response.data.cpu_name;
                        /*$scope.chassises_title = response.data.chassis_title;
                        $scope.chassis_price = response.data.chassis_price*/
                        
                    });
                }
                $scope.get_price_for_chassis = function(motherboard_price, memory_price, cpu_price){
                    return (parseInt(motherboard_price) + parseInt(memory_price) + parseInt(cpu_price));
                }

                $scope.get_memory = function($memory){
                    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_get_memory_cpu_price="+$memory)
                    .then(function (response) {
                        $scope.item_memory_price = response.data.item_memory_price;
                    });
                }
                $scope.get_cpu = function($cpu){
                    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/assignment.php?test_get_memory_cpu_price="+$cpu)
                    .then(function (response) {
                        $scope.item_cpu_family = response.data.item_memory_price;
                    });
                }
                $scope.get_price_for_motherboard_memory_cpu = function(motherboard_price, tem_memory_price, item_cpu_family){
                    return (parseInt(motherboard_price) + parseInt(tem_memory_price) + parseInt(item_cpu_family));
                }
                
})



app.controller('get_clients_model', function ($scope, $http, $location, $routeParams) {
  
  
  $scope.get_name = function($_name){
      $scope.names = $_name;
  }
  $scope.add_client = true;
        $http.get("https://adsportalsamplweweb.herokuapp.com/controller/clients.php?load_clients=1")
                .then(function (response) {
                    $scope.clients_details = response.data;
                });
  
  
  $scope.add_new_client = function(clientname, clientcontact, clientaddress, clienttype){
    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/clients.php?add_clients=1&&clientname="+clientname+
            "&&clientcontact="+clientcontact+
            "&&clientaddress="+clientaddress+
            "&&clienttype="+clienttype)
                .then(function (response) {
                    $scope.add_client = false;
                });
    $scope.add_client = false;
}
$scope.hide_successful = function(){
    $scope.add_client = true;
}
  
  
  
  
  $scope.btn_view_clients = function(){
    $location.path("/");  
}
$scope.btn_add_clients = function(){
    $location.path("/add_clients");
}
        

$scope.delete_clients = function(a){
    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/clients.php?client_id="+a)
                .then(function (response) {
                    //alert(response.data)
                    window.location = "http://localhost/adpamo";
                });
}


$scope.edit_clients_form = function(clients_id, clients_name, clients_address, clients_contact){
    $location.path("/edit_clients_form/"+clients_id+"/" +clients_name+"/"+clients_address+"/"+clients_contact);
}

    });
    
    
    
    
    
    
    
    
    app.controller('edit_clients_controller', function ($scope, $http, $location, $routeParams) {
        $scope.clients_id = $routeParams.clients_id;
        $scope.clients_name = $routeParams.clients_name;
        $scope.clients_address = $routeParams.clients_address;
        $scope.clients_number = $routeParams.clients_contact;
        
        
        
        
        $scope.update_clients_details = function($clients_id, $clients_name, $clients_address, $clients_number){
            
            $http.get("https://adsportalsamplweweb.herokuapp.com/controller/clients.php?operation_type=edit_client_details&&client_id_details="+$clients_id+
                    "&&client_name_details="+$clients_name+
                    "&&client_address_details="+$clients_address+
                    "&&client_number_details="+$clients_number)
                .then(function (response) {
                    
                    //alert(response.data)
                    //window.location = "http://localhost/adpamo";
                });
        }

    });
    
    
    
    
    app.controller('order_clients_controller', function ($scope, $http, $location, $routeParams) {
        $scope.select_clients_corporate = true;
        $scope.select_clients_regular = true;
        $scope.select_clients_walkin = true;
      
      
      
      
        $scope.insert_successful = true;
        
        $scope.updateSelected = function(selectedOption){
            
            if(selectedOption == "Corporate"){
                $scope.select_clients_corporate = false;
                $scope.select_clients_regular = true;
                $scope.select_clients_walkin = true;
                
                
                $http.get("https://adsportalsamplweweb.herokuapp.com/controller/order.php?operation_type=get_client_type&&client_type=get_client_corporate")
                .then(function (response) {
                    
                    //alert(response.data)
                    //window.location = "http://localhost/adpamo";
                    $scope.corporate_list = response.data;
                });
            }
            else if(selectedOption == "Regular"){
                $scope.select_clients_regular = false;
                $scope.select_clients_corporate = true;
                $scope.select_clients_walkin = true;
                
                
                $http.get("https://adsportalsamplweweb.herokuapp.com/controller/order.php?operation_type=get_client_type&&client_type=get_client_regular")
                .then(function (response) {
                    
                    //alert(response.data)
                    //window.location = "http://localhost/adpamo";
                    $scope.corporate_list = response.data;
                });
            }
            else if(selectedOption == "WalkIn"){
                $scope.select_clients_walkin = false;
                $scope.select_clients_corporate = true;
                $scope.select_clients_regular = true;
            }
            
        }
        $scope.updateSelectedcorporate = function(a){
            alert(a);
        }
        $scope.clickOptioncorporate = function(selectedOption, selectedOptioncorporate, dateset, typeoftarp, tarpquantity, tarpsizex, tarpsizey, tarpprice, tarppricetotal, projectname, type_of_measurement,  layoutoption, artistname, walkininputclient){
            
                    
                    ///parameter variables
                    $selectedOption = selectedOption;
                    $selectedOptioncorporate = selectedOptioncorporate;
                    $typeoftarp = typeoftarp;
                    $tarpquantity = tarpquantity;
                    $projectname = projectname;
                    $type_of_measurement = type_of_measurement;
                    $layoutoption = layoutoption;
                    $artistname = artistname;
                    $walkininputclient = walkininputclient;
                    ///end of parameter variables
                    
            
                    $dfrom = new Date(dateset);
                    $dfromyear = $dfrom.getFullYear();
                    $dfromyear_to_string = $dfromyear.toString();

                    $dfrommonth = $dfrom.getMonth() + 1;
                    $dfrommonth_to_string = $dfrommonth.toString();

                    $dfromday = $dfrom.getDate();
                    $dfromday_to_string = $dfromday.toString();

                    $exact_year = $dfromyear_to_string;
                    $exact_month = $dfrommonth_to_string;
                    $exact_day = $dfromday_to_string;
                    $complete_from_date = $exact_year + "-" + $exact_month + "-" + $exact_day;
                    
                    
                    ///parameter variables
                    $size_y = tarpsizey;
                    $size_x = tarpsizex;
                    $price = tarpprice;
                    $quantity = tarpquantity;
                    ///end of parameter variables
          
          
          $ordersize =  $size_y + " x " + $size_x;
          
                    
                    
                    if($type_of_measurement == "foot"){
                        convert_size_y = $size_y * 12;
                        convert_size_x = $size_x * 12;
                        
                        $size_y = convert_size_y;
                        $size_x = convert_size_x;
                    }
                    
                    $compute_size_y_$size_x = $size_y * $size_x;
                    
                    $compute_size_and_price = $compute_size_y_$size_x * $price;
                    
                    $get_total_price = $compute_size_and_price * $quantity;
                    ///alert($get_total_price);
                    
                    
                    
                    
                    
                    ///$scope.msg = [$selectedOption, $selectedOptioncorporate,$complete_from_date, $typeoftarp, $tarpquantity, $size_y, $size_x, $price, $get_total_price, $projectname, $type_of_measurement];
          
          
                    $http.get("http://adsportalsamplweweb.herokuapp.com/controller/order.php?operation_type=insert_order&&selectedOption="+$selectedOption+
                                      "&&selectedOptioncorporate="+$selectedOptioncorporate+
                                      "&&complete_from_date="+$complete_from_date+
                                      "&&typeoftarp="+$typeoftarp+
                                      "&&tarpquantity="+$tarpquantity+
                                      "&&size_y="+$size_y+
                                      "&&size_x="+$size_x+
                                      "&&price="+$price+
                                      "&&get_total_price="+$get_total_price+
                                      "&&projectname="+$projectname+
                                      "&&type_of_measurement="+$type_of_measurement+
                                      "&&layoutoption="+$layoutoption+
                                      "&&artistname="+$artistname+
                                      "&&walkininputclient="+walkininputclient+
                             "&&ordersize="+$ordersize)
                              .then(function (response) {
                                  ///$scope.insert_successful = false;
                          });
                                     $scope.insert_successful = false;
          
          
                  
            
            
        }
      
      
      $scope.close_successful = function(){
                    $scope.insert_successful = true;
                  }

    });
  
  
  
  
  app.controller('sales_controller', function ($scope, $http, $location, $routeParams){
        $scope.get_basic_report = function(datefrom, dateto){
            $dfrom = new Date(datefrom);
                    $dfromyear = $dfrom.getFullYear();
                    $dfromyear_to_string = $dfromyear.toString();

                    $dfrommonth = $dfrom.getMonth() + 1;
                    $dfrommonth_to_string = $dfrommonth.toString();

                    $dfromday = $dfrom.getDate();
                    $dfromday_to_string = $dfromday.toString();

                    $exact_year = $dfromyear_to_string;
                    $exact_month = $dfrommonth_to_string;
                    $exact_day = $dfromday_to_string;
                    $complete_from_date = $exact_year + "-" + $exact_month + "-" + $exact_day;
                    $complete_from_date = $complete_from_date;
                    
                    
                    
                    
                    $dto= new Date(dateto);
                    $dtoyear = $dto.getFullYear();
                    $dtoyear_to_string = $dtoyear.toString();

                    $dtomonth = $dto.getMonth() + 1;
                    $dtomonth_to_string = $dtomonth.toString();

                    $dtoday = $dto.getDate();
                    $dtoday_to_string = $dtoday.toString();

                    $exact_year = $dtoyear_to_string;
                    $exact_month = $dtomonth_to_string;
                    $exact_day = $dtoday_to_string;
                    $complete_to_date = $exact_year + "-" + $exact_month + "-" + $exact_day;
                    $complete_to_date = $complete_to_date;
                    
                    
                    $http.get("https://adsportalsamplweweb.herokuapp.com/controller/sales.php?operation_type=get_sales&&datefrom="+$complete_from_date+"&&dateto="+$complete_to_date)
                    .then(function (response) {

                        //alert(response.data)
                        //window.location = "http://localhost/adpamo";
                        $scope.sales_all = response.data.sales_table;
                        $scope.total_price_sale = response.data.total_price_sale;
                        $scope.total_sales_corporate = response.data.total_sales_corporate;
                        $scope.total_sales_regular = response.data.total_sales_regular;
                        $scope.total_sales_walkin = response.data.total_sales_walkin;
                        $scope.total_tarp_size_ten_y = response.data.total_tarp_size_ten_y;
                        $scope.total_tarp_size_ten_x = response.data.total_tarp_size_ten_x;
                        $scope.total_tarp_size_thirteen_y = response.data.total_tarp_size_thirteen_y;
                        $scope.total_tarp_size_thirteen_x = response.data.total_tarp_size_thirteen_x;
                        $scope.quantity_tarp_size_ten = response.data.quantity_tarp_size_ten;
                        $scope.quantity_tarp_size_thirteen = response.data.quantity_tarp_size_thirteen;
                        $scope.total_tarp_size_ten_sale = response.data.total_tarp_size_ten_sale;
                        $scope.total_tarp_size_thirteen_sale = response.data.total_tarp_size_thirteen_sale;
                    });
                    
                    
        }
    });
</script>
