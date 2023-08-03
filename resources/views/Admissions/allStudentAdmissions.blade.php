@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')
                    <div class="table-responsive">
                      <div class="table-container">
                      <table id="table1" class="table table-striped dataTable">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Std First Name</th>
                            <th class="text-dark">Std Last Name</th>

                            <th class="text-dark">Student RollNo</th>

 
                            <th class="text-dark">Password</th>
                            <th class="text-dark">Class Section</th>
                            <th class="text-dark">CNIC</th>
                            <th class="text-dark">Nationality</th>
                            <th class="text-dark">DOB</th>
                            <th class="text-dark">Gender</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Father Name</th>
                            <th class="text-dark">Father CNIC</th>
                            <th class="text-dark">Guardian Name</th>
                            <th class="text-dark">Guardian CNIC</th>
                            <th class="text-dark">Std Phone</th>
                            <th class="text-dark">Father Phone</th>
                            <th class="text-dark">Guardian Phone</th>
                            <th class="text-dark">Parent Occupation</th>
                            <th class="text-dark">Address</th>
                            <th class="text-dark">Tehsil</th>
                            <th class="text-dark">City</th>
                            <th class="text-dark">Province</th>
                            <th class="text-dark">Country</th>
                            <th class="text-dark">Degree</th>
                            <th class="text-dark">Current Semester</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Admission Session</th>
                            <th class="text-dark">Blood Group</th>
                            <th class="text-dark">Father Email</th>
                            <th class="text-dark">stdfilename</th>
                            <th class="text-dark">stdImagename</th>
                            

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($students as $student)
                          <tr class="border border-1 rounded border-dark table-hover">
                             <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $student->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $student->ID }}" class="btn btn-primary btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                 <a class="btn btn-info" href="{{ route('emp.Get.Student.Roll.No.Slip' , $student->ID) }}">Get Roll No Slip</a>
                                 <a class="btn btn-dark" href="{{ route('find.StudentChallan' , $student->ID) }}">Get Challans</a>

                              </div>
                            </td>
                            </td>


                            <td>{{ $student->Std_FName ?? '--' }}</td>
                            <td>{{ $student->Std_LName ?? '--' }}</td>

                            <td>{{ $student->StdRollNo ?? '--' }}</td>

                            <td>{{ $student->Password ?? '--' }}</td>
                            <td>{{ $student->ClassSection ?? '--' }}</td>
                            <td>{{ $student->CNIC ?? '--' }}</td>
                            <td>{{ $student->Nationality ?? '--' }}</td>
                            <td>{{ $student->DOB ?? '--' }}</td>
                            <td>{{ $student->Gender ?? '--' }}</td>
                            <td>{{ $student->Email ?? '--' }}</td>
                            <td>{{ $student->FatherName ?? '--' }}</td>
                            <td>{{ $student->FatherCNIC ?? '--' }}</td>
                            <td>{{ $student->GuardianName ?? '--' }}</td>
                            <td>{{ $student->GuardianCNIC ?? '--' }}</td>
                            <td>{{ $student->StdPhone ?? '--' }}</td>
                            <td>{{ $student->FatherPhone ?? '--' }}</td>
                            <td>{{ $student->GuardianPhone ?? '--' }}</td>
                            <td>{{ $student->ParentOccupation ?? '--' }}</td>
                            <td>{{ $student->Address ?? '--' }}</td>
                            <td>{{ $student->Tehsil ?? '--' }}</td>
                            <td>{{ $student->City ?? '--' }}</td>
                            <td>{{ $student->Province ?? '--' }}</td>
                            <td>{{ $student->Country ?? '--' }}</td>
                            <td>{{ $student->Degree_ID ?? '--' }}</td>
                            <td>{{ $student->CurrentSemester ?? '--' }}</td>
                            <td>{{ $student->Status ?? '--' }}</td>
                            <td>{{ $student->AdmissionSession ?? '--' }}</td>
                            <td>{{ $student->BloodGroup ?? '--' }}</td>
                            <td>{{ $student->FatherEmail ?? '--' }}</td>
                            <td>{{ $student->Files ?? '--' }}</td>
                            <td>{{ $student->Image ?? '--' }}</td>

                           
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                      </div>
                      <div class="d-flex text-center">
                          {!! $students->links() !!}
                      </div>

      
                    </div>

                 
@include('Table.table_footer')
@endsection
