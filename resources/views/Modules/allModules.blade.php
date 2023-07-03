@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')
    <div class="table-responsive">
        <table class="table " id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark">
                    <th class="text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Module Name</th>
                    <th class="text-dark">Url</th>
                    <th class="text-dark">Status</th>

                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $module->ModuleName ?? '--' }}</td>
                        <td>{{ $module->URL ?? '--' }}</td>
                        <td>{{ $module->Status ?? '--' }}</td>

                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $module->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $module->ID }}" class="btn bg_lgu_green text-white"><i
                                        class="far fa-edit"></i>{{ $modalTitle }}</a>




                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex ">
            {{ $modules->links() }}
        </div>
    </div>
    @include('Table.table_footer')
@endsection
