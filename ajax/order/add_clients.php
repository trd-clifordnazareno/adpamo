<div class="card card-primary">
  <div class="alert alert-success alert-dismissible" ng-hide="insert_successful" ng-click="close_successful()">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success alert preview. This alert is dismissable.
                </div>
  
              <div class="card-header">
                <h3 class="card-title">Add Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label> Select Clients Type</label>
                        <div class="form-group">
                        
                        <select class="form-control" ng-model="selectedOption" ng-change="updateSelected(selectedOption)">
                          <option value="Corporate">Corporate</option>
                          <option value="Regular">Regular</option>
                          <option value="WalkIn">WalkIn</option>
                          
                        </select>
                      </div>
                    
                  </div>
                    
                    
                    <div class="form-group" ng-hide="select_clients_corporate">
                        <label> Select Corporate Clients</label>
                        <div class="form-group">
                        
                            <select class="form-control" ng-model="selectedOptioncorporate">
                          <option ng-repeat="x in corporate_list" value="{{x.client_id}}">{{x.client_name}}</option>
                          
                        </select>
                      </div>
                    
                  </div>
                    
                    
                    <div class="form-group" ng-hide="select_clients_regular">
                        <label> Select Regular Clients</label>
                        <div class="form-group">
                        
                        <select class="form-control" ng-model="selectedOptioncorporate">
                          <option ng-repeat="x in corporate_list" value="{{x.client_id}}">{{x.client_name}}</option>
                          
                        </select>
                      </div>
                    
                  </div>
                  <div class="form-group" ng-hide="select_clients_walkin">
                    <label>Wak In Clients Name</label>
                    <input type="text" class="form-control" id="Clients_name" placeholder="Enter Clients Name" value="{{clients_name}}" ng-model="selectedOptioncorporate">
                  </div>
                  <div class="form-group">
                   
                    <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                      <input type="date" class="form-control float-right" id="reservation" ng-model="setdate">
                  </div>
                  <!-- /.input group -->
                </div>
                  </div>
                    
                    <div class="form-group">
                        
                        <div class="form-group">
                        <label>Item Details</label>
                        <select class="form-control" ng-model="typeoftarp">
                          <option>Please Select</option>
                          <option value="tarp 10">Tarp 10</option>
                          <option value="tarp 20">Tarp 20</option>
                          <option value="tarp 30">Tarp 30</option>
                        </select>
                      </div>
                    
                  </div>
                    <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" id="tarpquantity" placeholder="Enter Quantity" ng-model="tarpquantity">
                  </div>
                    <div class="form-group">
                    <label>Size</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Size Y</label>
                        <input type="text" class="form-control" id="tarpsize" placeholder="Enter Size" ng-model="tarpsizey">
                    </div>
                    <div class="col-sm-6">
                        <label>Size X</label>
                        <input type="text" class="form-control" id="tarpsize" placeholder="Enter Size" ng-model="tarpsizex">
                    </div>
                    </div>
                    
                  </div>
                    
                    
                    
                    <div class="form-group">
                        <label>Measurement</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="inches" ng-model="type_of_measurement">
                          <label for="customRadio1" class="custom-control-label">Inches</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="foot" ng-model="type_of_measurement">
                          <label for="customRadio2" class="custom-control-label">Foot</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio" value="centimeter" ng-model="type_of_measurement">
                          <label for="customRadio3" class="custom-control-label">CentiMeter</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio4" name="customRadio" value="meter" ng-model="type_of_measurement">
                          <label for="customRadio4" class="custom-control-label">Meter</label>
                        </div>
                        
                      </div>
                    
                    
                    
                    <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" id="tarpprice" placeholder="Enter Price" ng-model="tarpprice">
                  </div>
                    <div class="form-group">
                    <label>Total Price</label>
                    <input type="text" class="form-control" id="tarppricetotal" placeholder="Total Price" ng-init="tarppricetotal" value="{{((tarpsizey * tarpsizex) * tarpprice) * tarpquantity}}" disabled="" ng-if="type_of_measurement == 'inches'">
                    <input type="text" class="form-control" id="tarppricetotal" placeholder="Total Price" ng-init="tarppricetotal" value="{{(((tarpsizey * 12) * (tarpsizex*12)) * tarpprice) * tarpquantity}}" disabled="" ng-if="type_of_measurement == 'foot'">
                    <input type="text" class="form-control" id="tarppricetotal" placeholder="Total Price" ng-init="tarppricetotal" value="{{(((tarpsizey / 2.54) * (tarpsizex/2.54)) * tarpprice) * tarpquantity}}" disabled="" ng-if="type_of_measurement == 'centimeter'">
                    <input type="text" class="form-control" id="tarppricetotal" placeholder="Total Price" ng-init="tarppricetotal" value="{{(((tarpsizey * 39.37) * (tarpsizex*39.37)) * tarpprice) * tarpquantity}}" disabled="" ng-if="type_of_measurement == 'meter'">
                  </div>
                  
                  
                  <div class="form-group">
                        <label> Design Layout Option</label>
                        <div class="form-group">
                        
                        <select class="form-control" ng-model="layoutoption">
                          <option value="withlayout">With Layout</option>
                          <option value="none">None</option>
                          
                        </select>
                      </div>
                    
                  </div>
                    
                    <div class="form-group">
                    <label>Name Of Artist</label>
                    <input type="text" class="form-control" id="artistname" placeholder="Enter Name of Artist" ng-model="artistname">
                  </div>
                  
                    <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" class="form-control" id="projectname" placeholder="Enter Project Name" ng-model="projectname">
                  </div>
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="clickOptioncorporate(selectedOption, selectedOptioncorporate, setdate, typeoftarp, tarpquantity, tarpsizex, tarpsizey, tarpprice, tarppricetotal, projectname, type_of_measurement)">Submit</button>
                </div>
              </form>
            </div>


{{msg}}
