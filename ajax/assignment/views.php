<!--<div ng-repeat="chassis in chassises">{{chassis.motherboard}}</div>-->


            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-tools"></h3>

                <p class="card-text">
                    <h3>select chassis</h3>
                        
                    </p>
                </div>
            <div class="card-body" style="padding: 30px; background-color:#6c757d;">
            <select ng-model="selectedOption" ng-change="get_chassis_id(selectedOption)" class="bg-navy disabled color-palette ng-pristine" style="height:30px;">
                            <option ng-repeat="chassis in chassises" value="{{chassis.motherboard}}">{{chassis.chassis_title}}</option>
                        </select>
            </div>
            <!-- /.card-body -->
          </div>       


            
            

<div class="row">
<div class="col-md-6">
<div class="card card-primary ng-scope">
            <div class="card-header">
              <h3 class="card-title">Chassis Specs</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              
              
              
              
              <div class="form-group">
                <div class="col-6">
                  
 
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">chassis title:</th>
                        <td>{{title}} </td>
                      </tr>
                      <tr>
                        <th>price of chassis :</th>
                        <td>{{chassis_price}}</td>
                      </tr>
                      <tr>
                        <th>motherboard model:</th>
                        <td>{{motherboard}}</td>
                      </tr>
                      <tr>
                        <th>motherboard price :</th>
                        <td>{{motherboard_price}}</td>
                      </tr>


                      <th style="width:50%">installed memory :</th>
                        <td>{{motherboard_memory}} {{memory_name}}</td>
                      </tr>
                      <tr>
                        <th>installed memory price :</th>
                        <td>{{memory_price}}</td>
                      </tr>
                      <tr>
                        <th>installed cpu family : </th>
                        <td>{{motherboard_cpu_family}} / {{cpu_name}}</td>
                      </tr>
                      <tr>
                        <th>cpu price :</th>
                        <td>{{cpu_price}}</td>
                      </tr>
                      <tr>
                        <th class="text-primary">Total Price : </th>
                        <td class="text-info">{{get_price_for_chassis(motherboard_price, memory_price, cpu_price)}}</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

</div>
<div class="col-md-6">
<div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Motherboard Specs</h3>

              
            </div>
            <div class="card-body">
              
              </br>
 
              <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%" class="bg-navy disabled color-palette">select memory :</th>
                        <td class="bg-navy disabled color-palette"><select ng-model="selectedOption_for_memory" ng-change="get_memory(selectedOption_for_memory)" class="bg-navy disabled color-palette">
            <option ng-repeat="motherboard_spec in memory_specs" value="{{motherboard_spec.memory_name}}" class="">{{motherboard_spec.memory_type}} / {{motherboard_spec.memory_name}}</option>
            </select></td>
                      </tr>
                      <tr>
                        <th style="width:50%" class="bg-navy disabled color-palette">select cpu :</th>
                        <td class="bg-navy disabled color-palette"><select ng-model="selectedOption_for_cpu" ng-change="get_cpu(selectedOption_for_cpu)" class="bg-navy disabled color-palette">
            <option ng-repeat="motherboard_spec in cpu_specs" value="{{motherboard_spec.cpu_name}}">{{motherboard_spec.cpu_name}}</option>
            </select></td>
                      </tr>
                      <tr>
                        <th style="width:50%">motherboard model :</th>
                        <td>{{mother_board}} </td>
                      </tr>
                      <tr>
                        <th>motherboard price :</th>
                        <td>{{motherboard_price}}</td>
                      </tr>
                      <tr>
                        <th>memory price :</th>
                        <td>{{item_memory_price}}</td>
                      </tr>
                      <tr>
                        <th>cpu price :</th>
                        <td>{{item_cpu_family}}</td>
                      </tr>


                      <tr><th style="width:50%" class="text-primary">Total Price</th>
                        <td class="text-info">{{get_price_for_motherboard_memory_cpu(motherboard_price, item_memory_price, item_cpu_family)}} </td>
                      </tr>
                      
                      
                      
                      
                    </tbody></table>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>

</div>
</div>
            