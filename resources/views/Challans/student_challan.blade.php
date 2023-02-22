@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <div class="">
        <section class="section">
            <div class="section-body">
                <div class="section-body">
                    @if (!empty($student))
                        <div class="row d-none">
                        @else
                            <div class="row">
                    @endif
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title ?? '' }}</h4>
                            </div>
                            <form id="myForm" action="{{ route('find.StudentChallan') ?? '' }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    @if (!empty($Semester))
                                        <div class="row">
                                            <div class="form-group col-md-4 col-12">
                                                <label>Semester</label>
                                                <select class="form-control select2" name="SemSession" required>
                                                    @foreach ($Semester as $Semester)
                                                        <option value="{{ $Semester->SemSession }}">
                                                            {{ $Semester->SemSession }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-12">
                                                <label>Degree</label>
                                                <select class="form-control select2" name="DegreeName" required>
                                                    @foreach ($Degree as $Degree)
                                                        <option value="{{ $Degree->DegreeName }}">{{ $Degree->DegreeName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-12">
                                                <label>Roll Number</label>
                                                <input type="number" name="Rollno" placeholder="Example 001"
                                                    class="form-control" value="{{ old('Rollno') }}" required>
                                            </div>
                                        </div>
                                        <button id="button" type="submit"
                                            class="btn btn-primary btn-block submit-form">{{ $button ?? 'Submit' }}</button>
                                    @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-sm-4">
                <!--  -->
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                <img alt="image" src="{{ asset('assets/img/user.jpg') }}"
                                    class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a
                                        href="#">{{ $student->Std_FName ?? '--' }}{{ $student->Std_LName ?? '--' }}</a>
                                </div>
                                <div class="author-box-job">{{ $student->StdRollNo ?? '--' }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Personal Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Father Name
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->FatherName ?? '--' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Phone
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->StdPhone ?? '--' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Mail
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->Email ?? '--' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Cnic
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->CNIC ?? '--' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Address
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->Address ?? '--' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Class Section
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $student->Email ?? '--' }}
                                    </span>
                                </p>
                                <!-- <p class="clearfix">
                                   <span class="float-left">
                                   Dgree
                                   </span>
                                   <span class="float-right text-muted">
                                   {{ $student->Email ?? '--' }}
                                   </span>
                                   </p> -->
                                <p class="clearfix">
                                    <span class="float-left">
                                        Registration No
                                    </span>
                                    <span class="float-right text-muted">
                                        <a>{{ $Registration->ID ?? '--' }}</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about"
                                        role="tab" aria-selected="true">Enrollments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                        aria-selected="false">Exam/Igrade</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="card">
                                    <div class="padding-20">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                                    href="#about" role="tab" aria-selected="true">Enrollments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings"
                                                    role="tab" aria-selected="false">Exam/Igrade</a>
                                            </li>
                                        </ul>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-datatable" id="sortable-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <i class="fas fa-th"></i>
                                                        </th>
                                                        <th>Student Name</th>
                                                        <th>Issue Date</th>
                                                        <th>Due Date</th>
                                                        <th>Paid Date</th>
                                                        <th>Status</th>
                                                        <th>Fine</th>
                                                        <th>Amount</th>
                                                        <th>Type</th>
                                                        <!-- <th>Status</th> -->

                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($challans))
                                                        @foreach ($challans as $challan)
                                                            <tr>
                                                                <td>
                                                                    <div class="sort-handler">
                                                                        <i class="fas fa-th"></i>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $challan->registration->student->Std_FName ?? '--' }}
                                                                    {{ $challan->registration->student->Std_LName ?? '--' }}
                                                                </td>
                                                                <td>{{ $challan->IssueDate ?? '--' }}</td>
                                                                <td>{{ $challan->DueDate ?? '--' }}</td>

                                                                <form id="myForm"
                                                                    action="{{ route('approve.Challan') }}/{{ $challan->ID }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}

                                                                    @if ($challan->Status === 'Valid')
                                                                        <td> <input type="date" name="paiddate"
                                                                                id="paiddate"
                                                                                value="{{ old('paiddate') }}"
                                                                                class="form-control" required>
                                                                        </td>
                                                                     @else
                                                                     <td>{{ $challan->PaidDate ?? '--' }}</td>

                                                                    @endif

                                                                    <td>{{ $challan->Status ?? '--' }}</td>
                                                                    <td>{{ $challan->Fine ?? '--' }}</td>
                                                                    <td>{{ $challan->Amount ?? '--' }}</td>
                                                                    <td>{{ $challan->Type ?? '--' }}</td>
                                                                    <td> <a class="btn btn-primary"
                                                                            href="{{ route('print.Challan') }}/{{ $challan->ID }}">Challan</a>
                                                                        @if (session()->has('Emp_session'))
                                                                            <!-- only change id -->
                                                                            @if ($challan->Status === 'Valid')

                                                                            <button type="submit"
                                                                                class="btn btn-primary gt-data"
                                                                                data-toggle="modal"
                                                                                data-id="{{ $challan->ID }}"
                                                                                data-target="#exampleModal"><i
                                                                                    class="far fa-edit"></i>
                                                                                {{ 'Confirm' }}</button>

                                                                                @endif
                                                                            {{-- <a class="btn btn-primary far fa-edit mt-4"
                                                                                href="{{ route('approve.Challan') }}/{{ $challan->ID }}/{{ $challan->PaidDate }}">Confirm</a> --}}
                                                                        @endif
                                                                    </td>

                                                                </form>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        var toggle = '';
        $(document).on('click', '.showr', function() {

            var click = $(this).data('id');
            console.log(click);
            $('#' + click).toggle();

        });

        $('.tb').toggle();
    </script>
@endsection
