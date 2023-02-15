@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
      <div class="">
        <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ $Sem_ID->semester->SemSession }} / {{ $Sem_ID->course->CourseName }}</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="search" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <form action="{{ route('store.Attandences')}}" method="POST">
                    {{ csrf_field() }}
                  <div class="card-body">                 
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            
                            <th>Roll No</th>
                            <th>Student Name</th>
                            
                            <th>Attendance</th>
                                           
                          </tr>
                        </thead>
                        <tbody>
                          <input type="hidden" name="Date" value="{{ $day }}">
                          @foreach ($students as $student)
                          <input type="hidden" name="Enroll_ID[]" value="{{ $student->ID }}">
                          <tr>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $student->student->StdRollNo}}</td>
                          <td>{{ $student->student->Std_FName}} {{ $student->student->Std_LName}}</td>
                          
                          <td><div class="pretty p-switch p-slim">
                          <input type="checkbox" name="Status[]" >
                          <div class="state p-success">
                            <label>Present</label>
                          </div>
                        </div>
                        </td>
                          
                         
                         
                          @endforeach
                          </tr>                 
                        </tbody>
                      </table>
                    </div>
                     <div class="form-group justify-content-center">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="form-control">
                        <button class="btn btn-block btn-primary">Submit</button>
                      </div>
                    </div>

            </form>
           
          
               <div class="d-flex justify-content-center">
                      
               </div>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
  $("#exampleModal").prependTo("body"); 

  $(document).on('submit', 'form', function() {
    $(this).find('input[type=checkbox]').each(function() {
        var checkbox = $(this);

        // add a hidden field with the same name before the checkbox with value = 0
        if ( !checkbox.prop('checked') ) {
            checkbox.clone()
                .prop('type', 'hidden')
                .val(0)
                .insertBefore(checkbox);
        }
    });
});
</script>

<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection   
