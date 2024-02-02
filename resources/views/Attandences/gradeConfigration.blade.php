@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<!-- Main Content -->
<section class="section" id="printableArea">
   <div class="row">
      <div class="col-7 col-md-7 col-lg-7">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-info">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Courses Info</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Course Code</th>
                                             <th>Courses Name</th>
                                             <th>Credit Hours</th>
                                             <th>Asessment</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                {{ $SemesterCourse->course->CourseCode ?? '--'}}
                                             </td>
                                             <td>
                                                {{ $SemesterCourse->course->CourseName ?? '--'}}
                                             </td>
                                             <td>
                                                {{ $SemesterCourse->course->CreditHours ?? '--'}}
                                             </td>
                                             <td>
                                                {{ $type ?? '--'}}
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-5 col-md-5 col-lg-5">
         <div class="card">
            <div class="padding-20">
               <div class="section-body">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-warning d-flex justify-content-center">
                              <h4 style="color: white;">Graph</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body p-0">
                         
                                 <canvas id="myChart" width="400" height="300"></canvas>


                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-info">
                  <div class="row">
                     <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Bell Input</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th> <span class="text-left">A</span> 
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">C</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left"> A-</span> 
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">C+</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left"> B+</span> 
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">C-</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left">B</span>  
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">D</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left">B-</span>  
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">F</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left"> Min Marks</span> 
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th><span class="text-left">Max Marks</span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span>
                                             </th>
                                          </tr>
                                          <tr>
                                             <th> <span class="text-left"> Actual Mean</span>  
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                             <th>
                                                <span class="text-left">
                                                   <div class="pretty p-switch p-slim">
                                                      <input type="checkbox" name="Status[]" >
                                                      <div class="state p-success">
                                                         <label>Adj Mean</label>
                                                      </div>
                                                   </div>
                                                </span>
                                                <span class="float-right"> <input type="number" name="" class="form-control" style="width: 100px;"> </span> 
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-success">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Bell Input</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table  table-bordered ">
                                       <thead>
                                          <tr>
                                             <th>A</th>
                                             <th>A-</th>
                                             <th>B+</th>
                                             <th>B</th>
                                             <th>B-</th>
                                             <th>C+</th>
                                             <th>C</th>
                                             <th>C-</th>
                                             <th>D</th>
                                             <th></th>
                                             <th>F</th>
                                             <th></th>
                                             <th>I</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                             <td>0</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4>Final Submission</h4>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control"></textarea>
               </div>
               <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1 form-control" type="submit">Submit</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-6 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-info">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Courses Assessment</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Assessment</th>
                                             <th>0</th>
                                             <th>0</th>
                                             <th>0</th>
                                             <th>0</th>
                                             <th>1</th>
                                          </tr>
                                          <tr>
                                             <th>Total</th>
                                              @foreach($optionSemesterCourseWeightages as $key => $semesterCourseWeightage)
                                             <th>{{ $semesterCourseWeightage->Type }}</th>
                                             @endforeach                                             
                                          </tr>

                                          <tr>
                                             <th>Status</th>
                                             @foreach($optionSemesterCourseWeightages as $key => $semesterCourseWeightage)
                                             <th>{{ $semesterCourseWeightage->Weightage }}</th>
                                             @endforeach
                                            
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   
         
       
         
         


   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-success">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Student Result</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Student Roll No. </th>
                                             <th>Student Name </th>
                                             <th>Class Participation Theory {{ 't' }} </th>
                                             <th>Assignment Theory {{ 't' }} </th>
                                             <th>Quiz Theory {{ 't' }} </th>
                                             <th>Mid Term Theory {{ 't' }} </th>
                                             <th>Final Term Theory {{ 't' }} </th>
                                             <th>Total  </th>
                                             <th>Grade</th>
                                             <th>I Grade</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($enrollments as $enrollment)
                                          <tr>
                                             <td>{{ $enrollment->student->StdRollNo }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>
                                                <div class="form-group">
                                                   @php
                                                   $grades = [
                                                   'Actual Grade' , 'Grade' , 'Igrade'
                                                   ];
                                                   @endphp
                                                   <select class="form-control" name="Dpt_ID"  required>
                                                      <option value="Abscent" selected>Absent </option>
                                                      @foreach($grades as $grade)
                                                      <option value="{{ $grade }}">{{ $grade }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-danger">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-danger d-flex justify-content-center">
                              <h4 style="color: white;">Student Result Excluded from Grade</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Student Roll No. </th>
                                             <th>Student Name </th>
                                             <th>Class Participation Theory {{ 't' }} </th>
                                             <th>Assignment Theory {{ 't' }} </th>
                                             <th>Quiz Theory {{ 't' }} </th>
                                             <th>Mid Term Theory {{ 't' }} </th>
                                             <th>Final Term Theory {{ 't' }} </th>
                                             <th>Total  </th>
                                             <th>Grade</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($enrollments as $enrollment)
                                          <tr>
                                             <td>{{ $enrollment->student->StdRollNo }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                             <td>{{ $enrollment->student->Std_FName }}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
 <div class="bg-white text-center" style=" margin-left: 50px; margin-bottom: 90px; width:93%;">
   <a class="btn btn-warning btn-icon icon-left" style="color: white; margin: 10px;" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</a>
   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
   
       window.print();
   
       document.body.innerHTML = originalContents;
    }
   
</script>

<script>

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F'],
        datasets: [{
            label: 'Students',
            data: [5, 10, 15, 12, 6, 2, 3, 1, 0, 0], // Example data, replace with actual data
            backgroundColor: [
               'rgba(240, 5, 5)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(199, 199, 199)',
                'rgba(83, 102, 255)',
                'rgba(40, 159, 64)',
                'rgba(255, 99, 132)'
            ],
            borderColor: [
               'rgba(240, 5, 5)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(159, 159, 159)',
                'rgba(83, 102, 255)',
                'rgba(40, 159, 64)',
                'rgba(255, 99, 132)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Grades Distribution'
            }
        }
    }
});



document.addEventListener('DOMContentLoaded', function () {
    // Define a function to update the chart
    function updateChart() {
        // Fetch the new values from the inputs
        const gradeA = parseInt(document.getElementById('gradeA').value) || 0;
        const gradeB = parseInt(document.getElementById('gradeB').value) || 0;
        // Repeat for other grades...

        // Update the chart data
        myChart.data.datasets[0].data = [gradeA, gradeB /*, ...other grades*/];
        
        // Refresh the chart
        myChart.update();
    }

    // Attach event listeners to the input fields
    document.getElementById('gradeA').addEventListener('input', updateChart);
    document.getElementById('gradeB').addEventListener('input', updateChart);
    // Repeat for other inputs...

    // Initialize your chart here if it's not already initialized outside this script
});


</script>



@endsection