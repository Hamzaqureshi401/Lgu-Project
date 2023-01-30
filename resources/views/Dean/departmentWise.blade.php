 <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Department Wise Students</h4>
                  <div class="card-header-form">
                    <form>
                     <!--  <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div> -->
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped dataTable">
                      <thead>
                      <tr>
                        <th>Department</th>
                        <th>Defence</th>
                        <th>Civilian</th>
                        <th>Shaheed</th> 
                        <th>Sports</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($departments as $department)
                      
                      <tr>
	                      <td>{{ $department->Dpt_Name }}</td>
	                      <td>{{ $department->countStudent($department->ID)->count()  }}</td>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                      </tr>  
                      
                      @endforeach
                      </tbody>                   
                    </table>
                    <div class="d-flex justify-content-center">
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          