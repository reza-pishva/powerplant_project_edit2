<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{URL::to('/')}}/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/popper.min.js"></script>
    <script src="{{URL::to('/')}}/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="{{URL::to('/')}}/persian-date.js"></script>
    <script src="{{URL::to('/')}}/persian-datepicker.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/persian-datepicker.css">
    {{-- <script src="{{URL::to('/')}}/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/sweetalert.min.css"> --}}
    <script src="{{URL::to('/')}}/toastr.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/toastr.min.css">
    <script src="{{URL::to('/')}}/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/jquery.timepicker.min.css">
    <script src="sweetalert.min.js"></script>
    <script src="sweetalert2.js"></script>
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
        .personinfo{
            border-right: 1px solid black;
            border-left: 1px solid black;
        }
        .personinfo2{
            border-right: 1px solid black;
            border-left: 1px solid black;
        }
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
            width:60px;
            height:60px;
            margin-top: 10px;
        }
        img.reza5
        {
            border: 1px solid rgb(14,53,126);
            border-radius: 15px;
            opacity: 0.7;
            filter: alpha(opacity=100);
            width:40px;
            height:40px;
            margin-top: 10px;
        }

        img.reza22:hover
        {
            opacity: 1.0;
            filter: alpha(opacity=100);
            outline: 2px solid black;
            border-radius: 15px;
            outline-offset: 1px;
            width:125px;
            height:125px;
            cursor: pointer;
        }
        img.reza22
        {
            opacity: 0.7;
            filter: alpha(opacity=50);
            width:120px;
            height:120px;
            margin-top: 10px;
        }
        img.reza3
        {
            width:90px;
            height:90px;
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
        .persons_col
        {
            color: white;
            font-family: Tahoma;
            text-align: right;
            padding-right: 15px;
            height: 20px;
        }
        .persons_title
        {
            height: 10px;
        }
        .chk1
        {
            font-family: Tahoma;
            font-size: small;
            color: black;
        }
        .report_row2
        {
            color: black;
            font-size:smaller;
            font-family: Tahoma;
            text-align: center;
            border-bottom: 1px solid black ;
            padding-right: 20px;
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
<body style="margin:0;text-align: center;background-image: url('{{URL::to('/')}}/kz2.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;backdrop-filter: brightness(40%);">
<div class="container-fluid">
    <div class="row justify-content-center" style="height:100px;overflow: hidden">
        <div class="col-12" style="height: 100%">
            <div class="bg-dark" style="width: 100%;height:100%;margin-top: 3px;border-radius: 5px">
                <div class="row justify-content-center" style="height: 100%">
                    <div class="col-2"><img src="{{URL::to('/')}}/mapna.jpg" class="rounded-circle mt-2 ml-3" alt="Cinque Terre"></div>
                    <div class="col-1">.</div>
                    <div class="col-1">.</div>
                    <div class="col-1">.</div>
                    <div class="col-5"><p style="color: white;text-align: right;margin-top: 4px;font-family: Tahoma;font-size: large;font-weight: bold">نیروگاه سیکل ترکیبی کازرون</p><p style="color: white;text-align: right;font-family: Tahoma;font-size: small;font-weight: bold">نرم افزار مدیریت ورود و خروج افراد به نیروگاه</p></div>
                    <div class="col-2 pt-1"><img src="{{URL::to('/')}}/herasat006.png" class="rounded-circle" style="width:30%;height:50%"><p style="color: white;text-align: center;font-family: Tahoma;font-size: small">{{$full_name}}</p></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-2" style="height: 7%;">
        <div class="col-12">
           <div class="row" style="margin-top:1px;height: 110px">
               <div class="col-2">
                       <a href="/herasat2">
                           <img src="{{URL::to('/')}}/exit003.png" id="report" class="reza5" data-toggle="tooltip" data-placement="bottom" title="بازگشت به صفحه اصلی">
                       </a>
               </div>
               <div class="col-8" style="background: rgba(0, 45, 90, 0.7);border-radius: 8px;height:100px;font-size: smaller">
                   <div class="row" style="border-radius: 5px;height:100%;margin-top:6px">
                       <div class="col">
                           <div>
                               <a href="#">
                                   <img src="{{URL::to('/')}}/notcar001.png" id="eighth_report"  class="reza2" data-toggle="tooltip" data-placement="bottom" title="خودروهای غیر مجاز برای ورود به نیروگاه">
                               </a>
                           </div>
                       </div>
                       <div class="col">
                           <div>
                               <a href="#">
                                   <img src="{{URL::to('/')}}/car001.png" id="seventh_report" class="reza2" data-toggle="tooltip" data-placement="bottom" title="خودروهای مجاز به ورود به نیروگاه">
                               </a>
                           </div>
                       </div>
                       <div class="col">
                           <div>
                           </div>
                       </div>
                       <div class="col">
                           <div>
                           </div>

                       </div>
                       <div class="col">
                        <div>
                            <a href="/reportp">
                                <img src="{{URL::to('/')}}/report200.png" id="total_report" class="reza2" data-toggle="tooltip" data-placement="bottom" title="گزارش گیری">
                            </a>
                        </div>
                       </div>

                       <div class="col">
                           <div>
                               <a href="#">
                                   <img src="{{URL::to('/')}}/notebook3.png" id="notebook" class="reza2" data-toggle="tooltip" data-placement="bottom" title="دفتر ورود و خروج ">
                               </a>
                           </div>

                       </div>
                       <div class="col">
                           <div>
                               <a href="#">
                                   <img src="{{URL::to('/')}}/person_search002.png" id="second_report" class="reza2" data-toggle="tooltip" data-placement="bottom" title="لیست افراد حاضر در نیروگاه ">
                               </a>
                           </div>

                       </div>
                       <div class="col">
                           <div>
                               <a href="#">
                                   <img src="{{URL::to('/')}}/person_search007.png" id="first_report" class="reza2" data-toggle="tooltip" data-placement="bottom" title="بررسی مجوز ورود و ورود اطلاعات ورود و خروج افراد">
                               </a>
                           </div>

                       </div>
                   </div>
               </div>
               <div class="col-2"></div>
           </div>
        </div>
    </div>
    <div class="row" style="height: 850px;margin-top:80px">
        <div class="col ">
            <div class="row" style="border-radius: 5px;height: 100%;width: 100%;">
                <div class="col">
                    <div id="first_spinner1000" style="display:none;margin-top:55px;text-align:center;margin-left:20px">
                        <img src="preloader10.gif" style="width:200px;height:110px;border-radius: 100px">
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
