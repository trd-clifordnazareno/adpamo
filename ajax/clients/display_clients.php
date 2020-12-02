<button type="submit" class="btn btn-primary" ng-click="btn_add_clients()">Add Client</button>
<button type="submit" class="btn btn-primary" ng-click="btn_view_clients()">View Client</button>
</br>
</br>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Clients Data</h3>
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
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                  <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Client ID</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Client Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Address</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Contact Number</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Actions</th>
                      
                  </thead>
                  <tbody>
                  <tr role="row" class="odd" ng-repeat="client in clients_details | filter : search">
                    <td tabindex="0" class="sorting_1">{{client.client_id}}</td>
                    <td>{{client.client_name}}</td>
                    <td>{{client.address}} </td>
                    <td>{{client.contact}} </td>
                    <td>
                        <a class="btn btn-app" href="<?php ///echo "http://" . $_SERVER['SERVER_NAME'] . "/adpamo/clients/actions/update/{{client.client_id}}"; ?>" ng-click="edit_clients_form(client.client_id, client.client_name, client.address, client.contact)">
                  <i class="fas fa-edit"></i> Edit
                </a>
                        <a class="btn btn-app" href="<?php ///echo "http://" . $_SERVER['SERVER_NAME'] . "/adpamo/clients/actions/delete/{{client.client_id}}"; ?>" ng-click="delete_clients(client.client_id)">
                  <i class="fas fa-inbox"></i> Delete
                </a>
                    </td>
                    
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
