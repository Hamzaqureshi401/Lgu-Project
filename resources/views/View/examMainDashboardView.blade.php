@extends('layouts.app_new')
@section('title')
@endsection <!--add title here -->
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endpush <!-- Main Content -->
    <div class="">
        <section class="section">
            <form id="myForm" action="{{ route('exam.examMainDashboardView') }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-12">
                    <select
                        class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark"
                        name="semsessionid" required>
                        @foreach ($semester as $semesterdata)
                            <option {{ $semsessionid == $semesterdata->ID ? 'selected' : '' }}
                                value="{{ $semesterdata->ID }}">{{ $semesterdata->SemSession }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="button" type="submit"
                    class="btn bg_lgu_green text-white btn-block submit-form">Check</button>
            </form>
            <br>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Courses Offered : </h5>
                                            <span class="text-danger font-18 font-bold">{{ $semester_course_count }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/3.png" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"> Enrollment : </h5>
                                            <span class="text-danger font-18 font-bold">{{ $Enrollment_count }}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/3.png" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Courses Enrollment</h5>
                                            <span class="text-danger font-18 font-bold">{{ $Courses_Enrollment_count }}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- @include('Dean.charts') -->
            <div class="section-body bg-danger">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header bg-danger d-flex justify-content-center">
                                <h4 style="color: white;">EXAM SUBMISSION</h4>
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ 'Final Exam' }}</h4>
                                    <div class="card-header-action">
                                        <form>
                                            <div class="input-group">
                                                <input type="search" class="search-inp form-control" id="myInputTextField"
                                                    placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <form method="post" action="https://e.lgu.edu.pk/result/AdvanceSearch">
                                            <table
                                                class="table table-striped table-hover table-datatable
                       form-control-sm"
                                                id="tableExport">
                                                <!--  <thead>
                                          <tr>
                                              <th colspan="10" class="bg-danger" style="text-align:center;color:white;"><b>EXAM SUBMISSION</b></th>
                                          </tr>
                                      </thead> -->
                                                <tbody>
                                                    <tr>
                                                        <td>Pending Review</td>
                                                        <td>HoD-Approved</td>
                                                        <td>Pending</td>
                                                        <td>HoD Rejected</td>
                                                        <td>CoE-Rejected</td>
                                                        <td>CoE-Approved</td>
                                                        <td>Rejected-Igrade</td>
                                                        <td><b>Absolute Grading Awards</b></td>
                                                        <td><b>Relative Grading Awards</b></td>
                                                        <td>Total Awards</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a></td>
                                                        <td><a href="">0</a> </td>
                                                        <td><a href="">0</a> </td>
                                                        <td><a href="">0</a></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" style="text-align:center">Advance Search</td>
                                                        <td colspan="5"><input type="number" class="form-control"
                                                                name="id" placeholder="Enter Award Id"></td>
                                                        <td colspan="3">
                                                            <!-- <button type="submit" class="btn btn-success form-control waves-effect waves-light waves-round">Submit</button> -->
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body bg-success">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-success d-flex justify-content-center">
                                        <h4 style="color: white;">I GRAD SUBMISSION</h4>
                                        <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <section class="section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>{{ 'I Grade Student' }}</h4>
                                            <div class="card-header-action">
                                                <form>
                                                    <div class="input-group">
                                                        <input type="search" class="search-inp form-control"
                                                            id="myInputTextField" placeholder="Search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary"><i
                                                                    class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <form method="post" action="https://e.lgu.edu.pk/result/AdvanceSearch">
                                                    <table
                                                        class="table table-striped table-hover table-datatable
                       form-control-sm"
                                                        id="tableExport">
                                                        <!--  <thead>
                                          <tr>
                                              <th colspan="10" class="bg-danger" style="text-align:center;color:white;"><b>EXAM SUBMISSION</b></th>
                                          </tr>
                                      </thead> -->
                                                        <tbody>
                                                            <tr>
                                                                <td>ExamType</td>
                                                                <td>Total Applications</td>
                                                                <td>Pending</td>
                                                                <td>HoD</td>
                                                                <td>Dean</td>
                                                                <td>CoE</td>
                                                                <td>Rejected</td>
                                                                <td>Hod Rejected</td>
                                                                <td>Dean Rejected</td>
                                                                <td>ELIGIBLE APPLICATIONS</td>
                                                                <td>MARKS-UPDATED</td>
                                                                <td>MARKS-PENDING</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mid-Term</td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>

                                                            </tr>
                                                            <tr>
                                                                <td>Final-Term</td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>
                                                                <td><a href="">0</a></td>


                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                    <footer class="main-footer">
                        <div class="footer-left">
                            <a href="templateshub.net"></a></a>
                        </div>
                        <div class="footer-right">
                        </div>
                    </footer>
            </div>
    </div>
    <!-- <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/page/index.js') }}"></script>
        <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
         -->
@endsection
