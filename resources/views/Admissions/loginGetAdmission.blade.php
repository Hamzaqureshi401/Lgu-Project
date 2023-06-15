<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lahore Garrison University</title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/bundles/fullcalendar/fullcalendar.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}"> --}}


    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' width="5px" height="2px" type='image/x-icon'
        href='{{ asset('images/LOGO-Final-V2.png') }}' />

    <!-- Normalize or reset CSS with your favorite library -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"> --}}

    <!-- Load paper.css for happy printing -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> --}}

    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Student Admission</h4>
                            </div>
                            <div class="card-body">

                               @if (session('message'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('message') }}
                                    </div>
                                </div>
                            @endif

                           @if ($semester->exists() && $semester->first()->AdmissionStartDate <= date('Y-m-d') && $semester->first()->AdmissionEndDate >= date('Y-m-d') )
    <form id="myForm" action="{{ $route ?? '' }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }} <div class="form-group">
                                        <label for="email">Student CNIC</label>
                                        <input type="number" name="CNIC" value="{{ old('CNIC') }}" id="CNIC"
                                            class="form-control" oninput="maxLengthCheck(this)" maxlength="13">
                                        <div class="invalid-feedback">
                                            Please fill in your CNIC
                                        </div>
                                    </div>
                                    <script>
                                        function maxLengthCheck(object) {
                                            if (object.value.length > object.maxLength)
                                                object.value = object.value.slice(0, object.maxLength)
                                        }
                                    </script>
                                    

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
@else
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ "Admission Not Started" }}
        </div>
    </div>
@endif



                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </section>
    </div>
    <!-- General JS Scripts -->
    
     <script src="{{ asset('assets/js/app.min.js') }}"></script>
 
 <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/toastr.js') }}"></script>
  

  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
   <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/sweetalert.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>


  <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}" ></script>
  <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
         @if(session('successToaster'))
       
        var msg = "{{session('successToaster')}}";
        var title = "{{session('title')}}";
        
         iziToast.success({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @elseif(session('errorToaster'))
        var msg = "{{session('errorToaster')}}";
        var title = "{{session('title')}}";
         iziToast.error({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @elseif(session('infoToaster'))
         var msg = "{{session('infoToaster')}}";
         var title = "{{session('title')}}";
         iziToast.info({
          title: title,
          message: msg,
          position: 'topRight'
        });
         @elseif(session('warningToaster'))
         var msg = "{{session('warningToaster')}}";
         var title = "{{session('title')}}";
         iziToast.warning({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @endif
    </script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>
