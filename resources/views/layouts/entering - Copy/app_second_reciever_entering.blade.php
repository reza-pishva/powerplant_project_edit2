<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="persian-date.js"></script>
    <script src="persian-datepicker.js"></script>
    <link rel="stylesheet" href="persian-datepicker.css">
    <script src="sweetalert.min.js"></script>
    <link rel="stylesheet" href="sweetalert.min.css">
    <script src="toastr.min.js"></script>
    <link rel="stylesheet" href="toastr.min.css">
    <script src="jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="jquery.timepicker.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mapna Group') }}</title>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .description{
            text-align: right;
        }
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border-bottom: 1px solid black;
        }

        div.modal-body p{
            display: inline;
            font-family: Tahoma;
            font-size: small;
            direction: rtl;
        }
        #note{
            font-weight: bold;
            color: crimson;
        }
        img.reza2:hover
        {
            opacity: 1.0;
            filter: alpha(opacity=100);
            outline: 2px solid white;
            outline-offset: 1px;
            /*width:80px;*/
            /*height:80px;*/
            cursor: pointer;
        }
        img.reza2
        {
            border: 1px solid rgb(14,53,126);
            border-radius: 15px;
            opacity: 0.7;
            filter: alpha(opacity=100);
            width:50px;
            height:50px;
            margin-top: 10px;
        }
        li a
        {
            color: white;
            font-size: small;
        }
        li.nav-item{
            margin-right: 30px;
        }
        #request_table
        {
            border-collapse : collapse;
        }

        #request_table td
        {
            border-bottom : 2px solid black;
        }

        #request_table tr
        {
            text-align : center;
        }

        #request_table tr:first-child
        {
            font-weight : normal;
        }

        #request_table tr:nth-child(even)
        {
            background-color : white;
        }

        #request_table tr:nth-child(odd)
        {
            background-color : silver;

        }
        .person
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .cars
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .car
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .els
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .el
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
            padding-right: 10px;
        }
        .eqs
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .eq
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
            padding-right: 10px;
        }

        .equs
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
        }
        .equ
        {
            color: black;
            font-size: smaller;
            font-family: Tahoma;
            text-align: center;
            border-left: 1px solid black;
            border-top: 1px solid black ;
            border-right: 1px solid black;
            padding-right: 10px;
        }
        #person_table{
            border: 1px solid black;
        }
        .persons
        {
            border-right: 1px solid black;
        }
    </style>
</head>
<body style="margin:0;text-align: center;background-image: url('./12.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;backdrop-filter: brightness(40%);">
<div class="container-fluid">
    <div class="row justify-content-center" style="height: 100px">
        <div class="col-12">
            <div class="bg-dark" style="width: 100%;height:95px;margin-top: 3px;border-radius: 5px">
                <div class="row justify-content-center" style="height: 100px">
                    <div class="col-2"><img src="./mapna.jpg" class="rounded-circle mt-3 ml-3" alt="Cinque Terre"></div>
                    <div class="col-1">.</div>
                    <div class="col-1">.</div>
                    <div class="col-1">.</div>
                    <div class="col-5"><p style="color: white;text-align: right;margin-top: 10px;font-family: Tahoma;font-size: large;font-weight: bold">نیروگاه سیکل ترکیبی کازرون</p><p style="color: white;text-align: right;font-family: Tahoma;font-size: small;font-weight: bold">نرم افزار مدیریت درخواست مجوز ورود افراد به نیروگاه</p></div>
                    <div class="col-2 mt-3"><img src="./modir004.jpg" class="rounded-circle" style="width: 30%;height: 50%"><p style="color: white;text-align: center;font-family: Tahoma;font-size: small">{{$full_name}}</p></div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand bg-info rounded col-12" style="height: 30px;direction: rtl;margin-top: 1px">
        <ul class="navbar-nav" >
            <li class="nav-item">
                <a class="nav-link" href="/home">صفحه اصلی</a>
            </li>

        </ul>
                </nav>
    <div class="row" style="height: 500px">
        <div class="col-10">
            <div class="row" style="border-radius: 5px;height: 495px;width: 100%;">
                <div class="col-1"></div>
                <div class="col-10">@yield('content')</div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="col-2">
            <div class="row mt-1" style="height:495px;margin: auto;width:100%">
                    <div class="col-10" style="border-radius: 5px;height: 495px;background-color:rgba(14,53,126,0.5);text-align: center">
                        <div class="bg-secondary" style="height: 40px;width: 100%;margin-top: 30px;border-radius: 3px">
                            <p style="font-family: Tahoma;font-size: small;margin-top: 4px;color: white">گزارشات مربوط به گردش درخواست</p>
                        </div>
                        <div>
                            <img src="./sent.jpg" id="first_report" class="reza2" data-toggle="tooltip" data-placement="left" title="از اینجا می توانید مواردی که جهت تایید برای شما ارسال شده اند ببینید">
                        </div>
                        <div>
                            <img src="./herasat005.png" id="second_report" class="reza2" data-toggle="tooltip" data-placement="left" title="از اینجا می توانید مواردی را که هنوز توسط حراست نیروگاه مورد بررسی قرار نگرقته مجددا به کارتابل شخصی جهت هر نوع تجدید نظر از لحاظ تایید و یا عدم تایید برگردانید">
                        </div>
                        <div>
                            <img src="./nono.jpg" id="third_report" class="reza2" data-toggle="tooltip" data-placement="left" title="در اینجا می توانید مواردی که از طرف شما مورد تایید قرار نگرفته مجددا به کارتابل شخصی جهت هر نوع تجدید نظر از لحاظ تایید و یا عدم تایید برگردانید">
                        </div>
                        <div class="bg-secondary" style="height: 30px;width: 100%;margin-top: 20px;border-radius: 3px">
                            <p style="font-family: Tahoma;font-size: small;margin-top: 4px;color: white">فرم گزارش گیری</p>
                        </div>
                        <div>
                            <img src="./notebook2.png" id="notebook" class="reza2" data-toggle="tooltip" data-placement="bottom" title="دفتر ورود و خروج ">
                        </div>
                        <div>
                            <img src="./person_search002.png" id="present" class="reza2" data-toggle="tooltip" data-placement="bottom" title="لیست حاضرین ">
                        </div>
                        <div>
                            <a href="/reportp">
                                <img src="./reports.png" class="reza2" data-toggle="tooltip" data-placement="left" title="از اینجا می توانید گزارشات مورد نظر خود را تهیه کنید">
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
