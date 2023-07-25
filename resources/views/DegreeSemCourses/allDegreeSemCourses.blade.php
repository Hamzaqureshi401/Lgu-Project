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
                    <th class="text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Degree Batch Name</th>
                    <th class="text-dark">Semester Course Name</th>
                    <th class="text-dark">Section</th>
                    <th class="text-dark">Employee</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($degreeSemCourses as $key => $degreeSemCourse)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $degreeSemCourse->degreeBatch->degree->DegreeName ?? '--' }} /
                            {{ $degreeSemCourse->degreeBatch->batch->SemSession ?? '--' }}</td>
                        <td>{{ $degreeSemCourse->semesterCourse->semester->SemSession ?? '--' }} /
                            {{ $degreeSemCourse->semesterCourse->course->CourseName ?? '--' }}</td>
                        <td>{{ $degreeSemCourse->Section ?? '--' }}</td>
                        <td>{{ $degreeSemCourse->employee->Emp_FirstName ?? '--' }}
                            {{ $degreeSemCourse->employee->Emp_LastName ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <a href="{{ $getEditRoute }}/{{ $degreeSemCourse->ID }}"
                                    class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $degreeSemCourses->links() }}
    @include('Table.table_footer')
@endsection
