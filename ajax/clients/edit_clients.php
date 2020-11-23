<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label>Clients ID</label>
                        <input type="text" class="form-control" id="Clients_id" placeholder="Clients ID" value="{{clients_id}}" ng-model="clients_id">
                    
                  </div>
                  <div class="form-group">
                    <label>Clients Name</label>
                    <input type="text" class="form-control" id="Clients_name" placeholder="Enter Clients Name" value="{{clients_name}}" ng-model="clients_name">
                  </div>
                  <div class="form-group">
                    <label>Clients Address</label>
                    <input type="text" class="form-control" id="Enter Clients Location" placeholder="Enter Clients Address" value="{{clients_address}}" ng-model="clients_address">
                  </div>
                    <div class="form-group">
                    <label>Clients Contact Number</label>
                    <input type="text" class="form-control" id="Enter Clients Location" placeholder="Enter Clients Conact Number" value="{{clients_number}}" ng-model="clients_number">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="update_clients_details(clients_id, clients_name, clients_address, clients_number)">Submit</button>
                </div>
              </form>
            </div>