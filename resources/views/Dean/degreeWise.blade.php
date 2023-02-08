   <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Degree Wise</h4>
                  <div class="card-header-form">
                    <form>
                      <!-- <div class="input-group">
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
                        <th>Degrees</th>
                        <th>Defence</th>
                        <th>Civilian</th>
                        <th>Shaheed</th>
                        <th>Sports</th>
                        <th>Total</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                       @foreach($degrees as $degree)
                      <tr>

	                      <td>{{ $degree->DegreeName }}</td>
	                      <td>{{ $students->where('Degrees_ID' , $degree->ID)->count() }}</td>
	                      <td>{{ "--" }}</td>
                        <td>{{ "--" }}</td>
                        <td>{{ "--" }}</td>
                        <td>{{ "--" }}</td>
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
          