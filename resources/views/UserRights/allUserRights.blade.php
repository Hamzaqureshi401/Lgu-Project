@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')

    <div class="table-responsive p-2">

        <table class="table  " id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark ">
                    <th class="text-center text-dark" >
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Designation</th>
                    <th class="text-dark">Module</th>
                    <th class="text-dark">IsInsert</th>
                    <th class="text-dark">IsUpdate</th>
                    <th class="text-dark">IsDelete</th>
                    <th class="text-dark">IsBrowse</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userRights as $userRight)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $userRight->designation->Designation ?? '--' }}</td>
                        <td>{{ $userRight->module->ModuleName ?? '--' }}</td>
                        <td>{{ $userRight->IsInsert ?? '--' }}</td>
                        <td>{{ $userRight->IsUpdate ?? '--' }}</td>
                        <td>{{ $userRight->IsDelete ?? '--' }}</td>
                        <td>{{ $userRight->IsBrowse ?? '--' }}</td>
                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $userRight->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $userRight->ID }}" class="btn bg_lgu_green text-white" ><i
                                        class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $userRights->links() }}
        </div>
    </div>

    @include('Table.table_footer')
@endsection
