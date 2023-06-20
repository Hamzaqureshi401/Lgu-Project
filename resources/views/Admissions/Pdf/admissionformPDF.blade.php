<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OPOSsum') }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            font-size: 13px;
            /* border-spacing:3px; */
            /* margin:0; */
        }

        .borderof1px {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    @include('Admissions.AdmissionForm1')
    <div class="page-break"></div>
    @include('Admissions.VerificationofparentPDF')
    <div class="page-break"></div>
    @include('Admissions.Pdf.faterAndSondiclaration')

    <img class="img-fluid" src="{{ public_path('images/HalafNama.jpg') }}" alt="Order Header Image"
        style="max-width: 100%; max-height: 100vh; width: auto; height: auto;" />


    
</body>

</html>