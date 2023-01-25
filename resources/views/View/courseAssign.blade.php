@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 
                
                  <div class="card-body">
                   <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Course Code</label>
                      <input type="text"  class="form-control" value="{{ $courses->CourseCode }} "readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Course Name</label>
                      <input type="text"  class="form-control" value="{{ $courses->CourseName }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Credit Hours</label>
                      <input type="tel" id="CreditHours" data-inputmask="'mask': '9-9-99'" placeholder="Example 9-9-09" maxlength=6 class="form-control" value="{{ $courses->CreditHours }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Lecture Type</label>
                      <input type="text"  class="form-control" value="{{ $courses->LectureType }}" readonly>
                    </div>
                      <div class="form-group col-md-6 col-12">
                      <label>Section</label>
                      <select class="form-control" name="Section"  required>
                        @foreach (range('A', 'Z') as $l) 
                          <option value="{{ $l }}">{{ $l }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group col-md-6 col-12">
                      <label>Lecture Type</label>
                      <textarea type="text"  class="form-control" value="{{ $courses->LectureType }}"></textarea>
                    </div>
                  </div>
                  
                   <div class="section-body bg-danger">
            
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-danger d-flex justify-content-center">
                    <h4 style="color: white;">Merge</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
                  </div>
                </div>
              </div>
            </div>
           <div class="table-responsive">
                      <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Sr</th>
                            <th>Pending Review</th>
                            <th>HoD-Approved</th>
                            <th>Pending</th>
                            <th>HoD Rejected</th>
                            <th>CoE-Rejected</th>
                            <th>CoE-Approved</th>
                                          
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          
                          </tr>                 
                        </tbody>
                      </table>
                    </div>
                 

                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
               
    
                
@include('Forms.formFooter')   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


@endsection



      