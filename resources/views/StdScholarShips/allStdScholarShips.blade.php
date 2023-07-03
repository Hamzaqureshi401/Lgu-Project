@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')

    <div class="table-responsive">
        <table class="table" id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark">
                    <th class="text-center text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Student</th>
                    <th class="text-dark">Percentage</th>
                    <th class="text-dark">Category</th>
                    <th class="text-dark">Scholarship Type</th>
                    <th class="text-dark">Emp</th>
                    <th class="text-dark">Sem</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stdScholarShips as $stdScholarShip)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $stdScholarShip->student->Std_FName ?? '--' }}
                            {{ $stdScholarShip->Student->Std_LName ?? '--' }}</td>
                        <td>{{ $stdScholarShip->Percentage ?? '--' }}</td>
                        <td>{{ $stdScholarShip->Category ?? '--' }}</td>
                        <td>{{ $stdScholarShip->Scholarship_Type ?? '--' }}</td>
                        <td>{{ $stdScholarShip->employee->Emp_FirstName ?? '--' }}{{ $stdScholarShip->employee->Emp_LastName ?? '--' }}
                        </td>
                        <td>{{ $stdScholarShip->semester->SemSession ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $stdScholarShip->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $stdScholarShip->ID }}"
                                    class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex ">
            {{ $stdScholarShips->links() }}
        </div>
    </div>
    @include('Table.table_footer')
@endsection
