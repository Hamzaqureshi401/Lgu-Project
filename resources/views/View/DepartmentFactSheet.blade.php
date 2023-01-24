@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<!-- Main Content -->
<section class="section">
     <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4>Department's Students Strength</h4>
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
                          $students->where(['Degrees_ID' => $degreeBatche->degree->ID , 'Gender' => 'Male'])->count()  }}</td>
                         <td>{{ 
                          $students->where(['Degrees_ID' => $degreeBatche->degree->ID , 'Gender' => 'Female'])->count()  }}</td>
                         <td>{{ "Status" }}</td>
                        </tr>     
                        @endforeach
                                      
                    </table>
                     <div class="d-flex justify-content-center">
                        {{ $degreeBatches->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4>Category Wise Strength</h4>
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
                        <th>Degree</th>
                        <th>Army</th>
                        <th>Civilian</th>
                        <th>Shuhuda</th>
                        <th>Total</th>
                      </tr>
                     
                        @foreach($degreeBatches as $degreeBatche)
                         <tr>
                         <td>{{ $degreeBatche->degree->DegreeName ?? ''}}/{{ $degreeBatche->batch->SemSession ?? ''}}</td>
                         <td>{{ 
                          $students->where(['Degrees_ID' => $degreeBatche->degree->ID , 'Gender' => 'Male'])->count()  }}</td>
                         <td>{{ 
                          $students->where(['Degrees_ID' => $degreeBatche->degree->ID , 'Gender' => 'Female'])->count()  }}</td>
                         <td>{{ "Status" }}</td>
                        </tr>     
                        @endforeach
                                      
                    </table>
                     <div class="d-flex justify-content-center">
                        {{ $degreeBatches->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>


          



</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
@endsection