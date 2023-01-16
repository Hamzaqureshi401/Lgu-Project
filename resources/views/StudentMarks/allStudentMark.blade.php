@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table table-striped " id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Semester Course</th>
                            <th>Markes Obtained</th>
                           <th>Enrolled</th>
                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($StudentMarks as $StudentMark)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $StudentMark->semestercourse->semester->SemSession ?? '' }} {{ $StudentMark->semestercourse->course->CourseName ?? '' }}</td>
                            <td>{{ $StudentMark->ObtainedMarks ?? '' }}</td>
                           <td>{{ $StudentMark->enrollment->student->Std_FName ?? '' }} {{ $StudentMark->enrollment->student->Std_LName ?? '' }}</td>
                           
                            <td> <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $StudentMark->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $StudentMark->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $StudentMarks->links() !!}
                    </div>
@include('Table.table_footer')    
@endsection   
