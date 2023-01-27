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
                            <th>Father Name</th>
                            <th>Joining Session</th>
                            <th>Category</th>
                            <th>Paid Date</th>
                            <th>Degree</th>
                            <th>Student Cnic</th>
                            <th>Parent Cnic</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $students->links() !!}
                    </div>
@include('Table.table_footer')
@endsection
