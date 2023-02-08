@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-center">
                      <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attendence Report" }}</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <div class="">
        <section class="section">
            
                  
<!-- Modal with form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ "modalTitle" }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
               <form id="myForm" action="{{ route('master.Sheet')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      
                    <div class="form-group">
                      <label>Select Degree Level</label>
                     <input type="date" name="date" class="form-control">
                    </div>
                    <a style="color: white;" class="btn btn-primary btn-block master">master Sheet</a>
                     <a style="color: white;" class="btn btn-primary btn-block defualt">Defualt Seatings</a>
                 </form>
                </div>
            </div>
          </div>
        </div>
<div class="card">
         <div class="table-responsive">
                      <table class="table table-striped table-datatable" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Std First Name</th>
                            <th>Std Last Name</th>
                           <th>Std Roll No</th>
                            <th>Balance</th>
                            <th>Action</th>

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
                            <td>{{ $student->Std_LName ?? '--' }}</td>
                            <td>{{  '--' }}</td>
                            

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
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $students->links() !!}
                    </div>
      </section>
    </div>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
  $("#exampleModal").prependTo("body"); 
  $(".master").click(function () {
  window.location.href = "{{ route('master.Sheet')}}"
});
  $(".defualt").click(function () {
  window.location.href = "{{ route('defualt.Seating')}}"
});
</script>
@endsection   
