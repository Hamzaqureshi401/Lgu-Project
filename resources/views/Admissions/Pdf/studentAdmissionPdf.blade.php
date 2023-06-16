<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OPOSsum') }}</title>

    <style>
        body {
            margin: 0px;
            padding: 0px
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        .bg-refund {
            color: #fff;
            background: #ff7e30;
            border-color: #ff7e30
        }

        .table {
            width: 100% !important;
            border-style: none;
            font-family: arial, sans-serif !important;
            /* border-collapse: collapse; */
            width: 100%;
            font-size: 13px !important;
            /* border-spacing:3px; */
            /* margin:0; */
        }

        .thead-dark {
            color: white;
            border-color: #343a40;
            background-color: #343a40;

        }

        #table-th th {
            font-size: 12px !important;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .table-td td {
            font-size: 12px !important;
        }

        p {
            margin-top: 0;
            margin-bottom: 0rem;
            font-size: 12px;
        }

        hr {
            margin-bottom: 0;
        }

        #item tr td {
            padding-top: 6px !important;
            padding-bottom: 6px !important;
            vertical-align: middle !important;
        }

        #item tr th {
            font-size: 12px;
            padding-top: 8px !important;
            padding-bottom: 8px !important;
            vertical-align: middle !important;
        }

        td {
            border-style: none;
        }

        th {
            border-style: none;
        }

        .text-bold {
            font-weight: bold;
            font-size: 12px;
        }

        span {
            font-size: 12px;
        }

        tr td span {
            /*width: 80px !important;*/
            /*height: 60px !important;*/
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
            cursor: pointer;
            padding: 10px 20px;
            color: black;
            display: inline-block;
            font-weight: 400;
            margin-top: 10px;
        }

        .active {
            border-radius: 10px;
            color: white;
            padding: 10px 25px;
            background-color: black;
        }

        .rad-info-box .heading {
            font-size: 1.2em;
            font-weight: 300;
            text-transform: uppercase;
        }

        .row-spacing td {
            padding-bottom: 10px;
        }

        .underline {
            text-decoration: underline;
        }

        .table-td td {
            border: 1px solid black;
            padding: 5px;
        }

        /* Page break directives */

        .page-break {
            display: block;
            page-break-before: always;
        }

        .borderof1px {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    @include('Admissions.Pdf.studentDetail&Education')
    <div class="page-break"></div>
    @include('Admissions.Pdf.faterAndSondiclaration')
    <div class="page-break"></div>
    @include('Admissions.Pdf.Verificationofparentcategory')


    <img class="img-fluid" src="{{ public_path('images/HalafNama.jpg') }}" alt="Order Header Image"
        style="max-width: 100%; max-height: 100vh; width: auto; height: auto;" />
</body>

</html
