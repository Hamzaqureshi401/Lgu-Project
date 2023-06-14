
<link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <a > <img class="img-fluid ml-md-3 mt-3" src="{{ asset('images/LOGO-Final-V2.png') }}" alt="Order Header Image" width="270px" height="90px"/>
                  </a>
                  <div class="card-header">
                    <h4 class="text-dark">{{ $title ?? '' }}</h4>
                  </div>

                  <form id="myForm" action="{{ $route ?? '' }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  

                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
