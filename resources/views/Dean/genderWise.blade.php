<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Gender Wise</h4>
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
                <div class="card-body px-4 py-4">
                  <div class="table-responsive">
                    <table class="table table-striped dataTable" >
                      <thead>
                      <tr>
                        <th>Degree - Batch</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                      </tr>
                     </thead>
                     <tbody>
                        @foreach($degreeBatches as $degreeBatche)
                         <tr>
	                      <td>{{ $degreeBatche->degree->DegreeName ?? ''}}/{{ $degreeBatche->batch->SemSession ?? ''}}</td>
	                      <td>{{ 
                          $students->where('Degree_ID' , $degreeBatche->Degree_ID )->where('Gender' , 'Male')->pluck('ID')->count()  }}</td>
	                      <td>{{ 
                          $students->where('Degree_ID' , $degreeBatche->Degree_ID )->where('Gender' , 'Female')->pluck('ID')->count()  }}</td>
	                      <td>{{ $students->where('Degree_ID' , $degreeBatche->Degree_ID )->where('Gender' , 'Male')->pluck('ID')->count() +  $students->where('Degree_ID' , $degreeBatche->Degree_ID )->where('Gender' , 'Female')->pluck('ID')->count()}}</td>
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
          