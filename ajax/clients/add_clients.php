<button type="submit" class="btn btn-primary" ng-click="btn_add_clients()">Add Client</button>
<button type="submit" class="btn btn-primary" ng-click="btn_view_clients()">View Client</button>
</br></br>
<div class="alert alert-success alert-dismissible" ng-hide="add_client">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="hide_successful()">X</button>
                  <h5><i class="icon fas fa-check"></i> New Client Successfully Created</h5>
                </div>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" class="ng-pristine ng-valid">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name</label>
                    <input type="text" class="form-control" placeholder="Enter Client Name" ng-model="clientname">
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input type="text" class="form-control" placeholder="Enter Contact" ng-model="clientcontact">
                  </div>
<div class="form-group">
                    <label for="exampleInputEmail1">Client Address</label>
                    <input type="text" class="form-control" placeholder="Enter Address" ng-model="clientaddress">
                  </div>
<div class="form-group">
                        <label>Select</label>
                        <select class="form-control" ng-model="clienttype">
                            <option>Select Type Of Client</option><option value="Regular">Regular</option>
                          <option value="Corporate">Corporate</option>
                          
                        </select>
                      </div>
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="add_new_client(clientname, clientcontact, clientaddress, clienttype)">Submit</button>
                </div>
              </form>
            </div>
