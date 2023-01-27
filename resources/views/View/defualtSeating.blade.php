@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')
                    <div class="table-responsive">
                      <table class="table table-striped table-datatable" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Std Roll No</th>
                            <th>Std Name</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Emp Name</th>
                            <th>Percent</th>
                            <th>ABS</th>
                            <th>Per</th>
                            <th>Date</th>
                            <th>Center</th>
                            <th>Group Id</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Scholarship</th>
                            <th>Paid_Fee</th>
                            <th>Paid</th>
                            <th>BP</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($students as $student)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>


                            <td>{{ $student->Std_FName ?? '--' }}</td>
                            <td>{{ $student->Std_LName ?? '--' }}</td>
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
                            <td>{{ $student->Degrees_ID ?? '--' }}</td>
                            <td>{{ $student->CurrentSemester ?? '--' }}</td>
                            <td>{{ $student->Status ?? '--' }}</td>
                            <td>{{ $student->AdmissionSession ?? '--' }}</td>
                            <td>{{ $student->BloodGroup ?? '--' }}</td>
                            <td>{{ $student->FatherEmail ?? '--' }}</td>
                            <td>{{ $student->Files ?? '--' }}</td>
                            <td>{{ $student->Image ?? '--' }}</td>

                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $student->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $student->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $students->links() !!}
                    </div>
@include('Table.table_footer')
@endsection
