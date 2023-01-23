<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Gender Wise</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Degree - Batch</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                      </tr>
                     
                        @foreach($degreeBatches as $degreeBatche)
                         <tr>
	                      <td>{{ $degreeBatche->degree->DegreeName ?? ''}}/{{ $degreeBatche->batch->SemSession ?? ''}}</td>
	                      <td>{{ 
                          $students->where(['Degrees_ID' => $degreeBatche->degree , 'Gender' => 'Male'])->count()  }}</td>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
                        </tr>     
                        @endforeach
                                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="d-flex justify-content-center">
                        {{ $degreeBatches->links() }}
                    </div>