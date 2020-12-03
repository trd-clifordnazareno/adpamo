





<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                  <label>Date:</label>
                    <div class="form-group">
                   
                    <div class="form-group">
                  <label>Date range From - To:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                      <input type="date" class="form-control float-right ng-pristine ng-untouched ng-valid ng-empty" id="reservation" ng-model="datefrom"><input type="date" class="form-control float-right ng-pristine ng-untouched ng-valid ng-empty" id="reservation" ng-model="dateto">
                  </div>
                  <!-- /.input group -->
                </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" ng-click="get_basic_report(datefrom, dateto)">Submit</button>
                
                
                
                
                <!-- /.form group -->
                <!-- Date range -->
                
                <!-- /.form group -->

                <!-- Date and time range -->
                
                <!-- /.form group -->

                <!-- Date and time range -->
                
                <!-- /.form group -->
              </div>
                
              <!-- /.card-body -->
            </div>




<div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            
                        </div>
                            
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">-->
                  <thead>
                  <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Order Date</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Client Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">type_order</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">item_details_name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">quantity</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">price_per_size</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">total_price</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">tarp_size_y</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">tarp_size_x</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">project_name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">layoutoption</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">artistname</th>
                  </tr>
                      
                      
                  </thead>
                  <tbody>
                  <tr role="row" class="odd" ng-repeat="x in sales_all | filter : search">
                    <td tabindex="0" class="sorting_1">{{x.order_date}}</td>
                    <td>{{x.client_name}}</td>
                    <td>{{x.type_order}} </td>
                    <td>{{x.item_details_name}} </td>
                    <td>{{x.quantity}} </td>
                    <td>{{x.price_per_size}} </td>
                    <td>{{x.total_price}} </td>
                    <td>{{x.tarp_size_y}} </td>
                    <td>{{x.tarp_size_x}} </td>
                    <td>{{x.project_name}} </td>
                    <td>{{x.layoutoption}} </td>
                    <td>{{x.artistname}} </td>
                    <!--<td>
                        <a class="btn btn-app" href="<?php ///echo "http://" . $_SERVER['SERVER_NAME'] . "/adpamo/clients/actions/update/{{client.client_id}}"; ?>" ng-click="edit_clients_form(client.client_id, client.client_name, client.address, client.contact)">
                  <i class="fas fa-edit"></i> Edit
                </a>
                        <a class="btn btn-app" href="<?php ///echo "http://" . $_SERVER['SERVER_NAME'] . "/adpamo/clients/actions/delete/{{client.client_id}}"; ?>" ng-click="delete_clients(client.client_id)">
                  <i class="fas fa-inbox"></i> Delete
                </a>
                    </td>-->
                    
                  </tr></tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
                        </div>
                    </div>
                    
                </div>
              </div>
              <!-- /.card-body -->
            </div>




<div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Report Table:</h5>
              <p class="lead"></p>
<div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:30%">Total Sale:</th>
                        <td><span>&#8369;</span>{{total_price_sale}}</td>
                      </tr>
                      <tr>
                        <th>Total Corporate Sales:</th>
                        <td><span>&#8369;</span>{{total_sales_corporate}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Regular:</th>
                        <td><span>&#8369;</span>{{total_sales_regular}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Walkin:</th>
                        <td><span>&#8369;</span>{{total_sales_walkin}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Of Tarp 10 OZ By Size:</th>
                        <td><span>&#8369;</span>{{total_tarp_size_ten_y * quantity_tarp_size_ten}}x{{total_tarp_size_ten_x * quantity_tarp_size_ten}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Of Tarp 13 OZ By Size:</th>
                        <td><span>&#8369;</span>{{total_tarp_size_thirteen_y * quantity_tarp_size_thirteen}}x{{total_tarp_size_thirteen_x * quantity_tarp_size_thirteen}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Of Tarp 10 OZ:</th>
                        <td><span>&#8369;</span>{{total_tarp_size_ten_sale}}</td>
                      </tr>
                      <tr>
                        <th>Total Sales Of Tarp 13 OZ:</th>
                        <td><span>&#8369;</span>{{total_tarp_size_thirteen_sale}}</td>
                      </tr>
                    </tbody></table>
                  </div>
            </div>




