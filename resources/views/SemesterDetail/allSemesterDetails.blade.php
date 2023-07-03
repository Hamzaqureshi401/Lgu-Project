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
                    <th class="text-dark">Degree</th>
                    <th class="text-dark">Semester</th>

                    <th class="text-dark">Semester Fee</th>
                    <th class="text-dark">Magazine Fee</th>
                    <th class="text-dark">Exam Fee</th>
                    <th class="text-dark">Society Fee</th>
                    <th class="text-dark">Misc Fee</th>
                    <th class="text-dark">Registration Fee</th>
                    <th class="text-dark">Practical charges</th>
                    <th class="text-dark">Sports Fund</th>
                    <th class="text-dark">Fee Type</th>
                    <th class="text-dark">Tuition Fee</th>
                    <!-- <th>Status</th> -->
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semesterDetails as $semesterDetail)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $semesterDetail->degreeBatches->degree->DegreeName ?? '--' }} /
                            {{ $semesterDetail->degreeBatches->batch->SemSession ?? '--' }}</td>
                        <td>{{ $semesterDetail->semester->SemSession ?? '--' }}</td>
                        <td>{{ $semesterDetail->SemesterFee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Magazine_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Exam_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Society_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Misc_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Registration_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Practical_charges ?? '--' }}</td>
                        <td>{{ $semesterDetail->Sports_Fund ?? '--' }}</td>
                        <td>{{ $semesterDetail->FeeType ?? '--' }}</td>
                        <td>{{ $semesterDetail->Tuition_Fee ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterDetail->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $semesterDetail->ID }}"
                                    class="btn bg_lgu_green text-white "><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $semesterDetails->links() !!}
        </div>
    </div>
    @include('Table.table_footer')
@endsection
