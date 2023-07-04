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
                <div class="card-body px-4 py-4">
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
	                      <td>{{ 
                        
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Defence')->pluck('ID')->count() 

                        }}</td>
	                      <td>{{ 
                        
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Civilian')->pluck('ID')->count()

                        }}</td>
                        <td>{{ 
                        
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Shaheed')->pluck('ID')->count()

                        }}</td>
                        <td>{{ 
                        
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Sports')->pluck('ID')->count() 

                        }}</td>
                        <td>{{ 
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Defence')->pluck('ID')->count()  
                          +
                         $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Civilian')->pluck('ID')->count()
                          +
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Shaheed')->pluck('ID')->count()
                          +
                          $students->where('Degree_ID' , $degree->ID)->where( 'Category' , 'Sports')->pluck('ID')->count()
                        }}</td>
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
          