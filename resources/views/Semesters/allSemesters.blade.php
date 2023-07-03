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
                    <th class="text-dark">Sem Session</th>
                    <th class="text-dark">Year</th>
                    <th class="text-dark">Sem Start Date</th>
                    <th class="text-dark">Sem End Date</th>
                    <th class="text-dark">Enrollment Start Date</th>
                    <th class="text-dark">Enrollment End Date</th>
                    <th class="text-dark">Exam Start Date</th>
                    <th class="text-dark">Exam End Date</th>
                    <th class="text-dark">I mid StartDate</th>
                    <th class="text-dark">I mid EndDate</th>
                    <th class="text-dark">I final StartDate</th>
                    <th class="text-dark">I final EndDate</th>
                    <th class="text-dark">Admission Start Date</th>
                    <th class="text-dark">Admission End Date</th>
                    <!-- <th>Status</th> -->
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semesters as $semester)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $semester->SemSession ?? '--' }}</td>
                        <td>{{ $semester->Year ?? '--' }}</td>
                        <td>{{ $semester->SemStartDate ?? '--' }}</td>
                        <td>{{ $semester->SemEndDate ?? '--' }}</td>
                        <td>{{ $semester->EnrollmentStartDate ?? '--' }}</td>
                        <td>{{ $semester->EnrollmentEndDate ?? '--' }}</td>
                        <td>{{ $semester->ExamStartDate ?? '--' }}</td>
                        <td>{{ $semester->ExamEndDate ?? '--' }}</td>
                        <td>{{ $semester->I_mid_StartDate ?? '--' }}</td>
                        <td>{{ $semester->I_mid_EndDate ?? '--' }}</td>
                        <td>{{ $semester->I_final_StartDate ?? '--' }}</td>
                        <td>{{ $semester->I_final_EndDate ?? '--' }}</td>
                        <td>{{ $semester->AdmissionStartDate ?? '--' }}</td>
                        <td>{{ $semester->AdmissionEndDate ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semester->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $semester->ID }}" class="btn bg_lgu_green text-white "><i
                                        class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
          {!! $semesters->links() !!}
      </div>
    </div>
    {{-- {{ $semesters->links() }} --}}
    @include('Table.table_footer')
@endsection
