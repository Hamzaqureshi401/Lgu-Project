@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')
    <div class="table-responsive p-2">

        <table class="table" id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark ">
                    <th class="text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">CourseCode</th>
                    <th class="text-dark">CourseName</th>
                    <th class="text-dark">CreditHours</th>
                    <!-- <th class="text-dark">LectureType</th> -->
                    <!-- <th>Status</th> -->
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $course->CourseCode ?? '--' }}</td>
                        <td>{{ $course->CourseName ?? '--' }}</td>
                        <td>{{ $course->CreditHours ?? '--' }}</td>
                        <!-- <td>{{ $course->LectureType ?? '--' }}</td> -->
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $course->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $course->ID }}" class="btn bg_lgu_green text-white "><i
                                        class="far fa-edit"></i>{{ $modalTitle }}</a>




                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex ">
            {{ $courses->links() }}
        </div>
      </div>
    @include('Table.table_footer')
@endsection
