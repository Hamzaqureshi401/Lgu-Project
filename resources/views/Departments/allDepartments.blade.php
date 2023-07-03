@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')

    <div class="table-responsive">
        <table class="table border-1 rounded border-dark" id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark ">
                    <th class="text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Dpt Name</th>
                    <th class="text-dark">Dpt Full Name</th>
                    <th class="text-dark">HOD</th>
                    <th class="text-dark">Dean</th>
                    <th class="text-dark">Status</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $department->Dpt_Name ?? '--' }}</td>
                        <td>{{ $department->Dpt_FullName ?? '--' }}</td>
                        <td>{{ $department->hod->Emp_FirstName ?? '--' }} {{ $department->hod->Emp_LastName ?? '--' }}</td>
                        <td>{{ $department->dean->Emp_FirstName ?? '--' }} {{ $department->dean->Emp_LastName ?? '--' }}
                        </td>
                        <td>{{ $department->Status ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $department->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $department->ID }}" class="btn bg_lgu_green text-white "><i
                                        class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $departments->links() !!}
        </div>
    </div>
    @include('Table.table_footer')
@endsection
