@include('inculdes.Header_resourses')


<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Student Login</h4>

                            <a style="text-decoration: none" href="{{ url('/') }}">
                                <div style="margin-top: 25px;margin-left:40px;" class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                        Employee Login
                                    </button>

                                </div>
                            </a>


                        </div>
                        <div class="card-body">
                            <p style="font-weight: bold;color:red;">{{ $error }}</p>

                            <form method="POST" action="{{ url('/') }}/Std_login" class="needs-validation"
                                novalidate="">
                                @csrf

                                <select name="batch" class="form-control form-control-sm">
                                    <option selected disabled>Batch</option>
                                    @foreach ( $batch as $batchdata)
                                    <option value="{{$batchdata->AdmissionSession}}">{{$batchdata->AdmissionSession}}</option>

                                    @endforeach




                                </select>


                                <br>
                                <select name="department" class="form-control form-control-sm">
                                    <option selected disabled>Department</option>
                                    @foreach ( $department as $Departmentsdata)
                                    <option value="{{$Departmentsdata->Dpt_Name}}">{{$Departmentsdata->Dpt_Name}}</option>

                                    @endforeach
                                </select>

                                <br>
                                <div class="form-group">
                                    <label for="rollno">RollNo

                                    </label>
                                    <input id="rollno" type="number" class="form-control" name="rollno"
                                        tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        @error('rollno')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="invalid-feedback">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div> --}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('inculdes.Footer_resourses')
