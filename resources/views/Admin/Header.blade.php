<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
  
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>
  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/admin.js')}}"></script>
  <title>لوحة الادمن</title>

  <!-- Include datepicker -->
  <link rel="stylesheet" href="{{asset('datepicker/datepicker.css')}}">
  
  
<style>
body{
    font-size: 14px;
      font-family: 'Droid Arabic Kufi', serif;
      font-weight: normal;
    background-color: #F5F5F5;
}
#main {
    transition: 0.3s;
    padding: 0px;
}
#contact {
  top: 60px;
  background-color: #414956;
}
::-webkit-scrollbar {
  width: 2px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
  background: #888;
}
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>
{{-- Vertical_Navigation.blade --}}
<style>
  .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 5;
      top: 0;
      right: 0;
      /* background-color: #2D323E; */
      background-color: #222d32;
      overflow-x: hidden;
      transition: 0.3s;
      padding-top: 10px;
  }
  @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
  }
  #mytopOpenSid {
      text-align: left;
      cursor: pointer;
  }
  #mytopOpenSid span {
    position: absolute;
    right: -25px;
    transition: 0.3s;
    padding: 10px;
    width: 50px;
    text-decoration: none;
    font-size: 10px;
    color: white;
    border-radius: 5px 0px 0px 5px;
    z-index: 4;
  }
  #mytopOpenSid span:hover {
    right: 0;
  }
  .p4h-head-list {
      cursor: pointer;
      background-color: #222d32;
      color: rgb(241, 241, 241);
      padding: 10px 10px;
  }
  .p4h-head-list:hover {
      background-color: #1e282c;
  }
  .p4h-head-menu {
      color: #849da8;
  }
  .p4h-head-menu-list {
      cursor: pointer;
      padding: 10px 60px 10px 10px;
      background-color: #374850;
      border: none;
  }
  .p4h-head-menu-list a:hover {
    color: #FFF;
  }
  .p4h-head-menu-list a{
    text-decoration: none;
    display: block;
    color: #849da8;
  }
  .unicon_css {
    color:#fff;
    transition: 0.2s;
  }
  .p4h-head-menu-foter {
      position: absolute;
      bottom: 0;
      width: 100%;
      z-index: 6;
      text-align: center;
      margin: 0px 0px 0px 0px;
      padding: 10px 0px;
      border-top: 1px solid rgb(128, 127, 127);
      display: none;
  }
  /* text Caler */
  .tc-1{
    color: #b8c7ce;
  }
  .tc-1:hover {
      color: #FFF;
  }
  .sid-hed {
    background-color: #1a2226;
    color: #4b646f;
    padding: 7px 25px 7px 0px;
    font-size: small;
  }
  </style>
{{-- dtbl-ahmad  table --}}
<style>
.dtbl-ahmad thead tr th {
    border: none;
    font-weight: normal;
    font-size: 13px;
}
.dd-form-control {
    padding: 0;
    line-height: 20px;
    padding: 0px 5px;
    border-color: #bdbdbd;
}
.table-control {

}
.table-control tbody tr td{
  padding: 10px 2px 3px 5px;
  /* cursor: pointer; */
  
}
</style>
{{-- alert  --}}
<style>
.p4h_alert_success {
  position:fixed;
  cursor: pointer;
  width: 200px;
  background:rgb(33, 194, 54);
  left: 150px;
  top: 10px;
  z-index: 999;
  border-radius: 7px;
  opacity: 0.0;
}
#p4h_Progress {
  width: 1%;
  height: 4px;
  background-color: #d88334;
  border-radius: 10px;
  opacity: 1;
}
.success-animation { margin: 10px;}
.checkmark {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: block;
    stroke-width: 3;
    stroke: #ffffff;
    stroke-miterlimit: 10;
    box-shadow: inset 0px 0px 0px #4bb71b;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
    position:relative;
    margin: 0 auto;
}
.checkmark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 3;
    stroke-miterlimit: 10;
    stroke: #ffffff;
    fill: rgb(33, 194, 54);
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}
.checkmark__check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}
@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
}
@keyframes scale {
    0%, 100% {
        transform: none;
    }

    50% {
        transform: scale3d(1.1, 1.1, 1);
    }
}
@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 30px #4bb71b;
    }
}
</style>
<style>
.css_desc {
  width: 22px;
  height: 22px;
  float: left;
  cursor: pointer;
}
.css_asc {
  width: 22px;
  height: 22px;
  float: left;
  cursor: pointer;
  transform: rotate(180deg);
}
</style>
{{-- icon --}}
<style>
.icon_vue_mein {
  cursor: pointer;
  margin: 0px 1px;
}
</style>
<script>
  function p4h_set_alert (){
    $(document).ready(function(){
      var i = 0;
        if (i == 0) {
          i = 1;
          var elem = document.getElementById("p4h_Progress");
          var width = 1;
          var get_id = $("#p4h_alert");

          get_id.animate({left: '15px',opacity: '1'});
          var id = setInterval(frame, 1);
          setTimeout(function(){
              get_id.animate({left: '-=900px', opacity: 0}, 500);
          }, 3000);
          function frame() {
            if (width >= 100) {
              clearInterval(id);
              i = 0;
            } else {
              width++;
              elem.style.width = width + "%";
            }
          }
        }
    });
  }
</script>
{{-- <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script> --}}
<link rel="stylesheet" href="{{asset('fullcalendar/main.css')}}">
<script src="{{asset('fullcalendar/main.js')}}"></script>
<script src="{{asset('fullcalendar/locales/ar-sa.js')}}"></script>
{{-- calendar --}}
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      //locales: 'ar-sa',
      locale: 'ar',
      //allDayText: 'اليوم كله',
      
      direction: 'rtl',
      timezone: 'asia/riyadh',

      headerToolbar: {
        left: 'today prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      buttonText: {today: 'اليوم',dayGridMonth: 'الشهر',timeGridWeek: 'الاسبوع',timeGridDay: 'اليوم'},
      height: 500,
      //dayMaxEvents: false, // allow "more" link when too many events
      //eventColor: '#378006', // الشريط للحدث
      editable: true,
      eventDrop: function(info) {
        
        //console.log(info.event);

        //alert(info.event.title + " was dropped on " + info.event.start.toISOString());

        if (!confirm("Are you sure about this change?")) {
          info.revert();
        }
      },
      eventResize: function(info) {  // يتم تشغيله عند تغيير حجم التوقفات وتغير الحدث في المدة.
        
        console.log(info);
        if (!confirm("is this okay?")) {
          info.revert();
        }
      },
      eventClick: function(info) {
        var eventObj = info.event;

        if (eventObj.url) {
          alert(
            'Clicked ' + eventObj.title + '.\n' +
            'Will open ' + eventObj.url + ' in a new tab'
          );

          window.open(eventObj.url);

          info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
        } else {
          alert('Clicked ' + eventObj.title);
        }
      },
      // eventMouseEnter: function(info) {
      //   var eventObj = info.event;

      //   console.log(eventObj)

      // },
      events: [
        {
          title: 'مهام اليوم',
          description: 'description for Long Event',
          start: '2020-09-22' ,
          end: '2020-09-25' ,
        },
        {
          title: 'تصميم موقع',
          description: 'description for Long Event',
          start: '2020-09-20 16:30:01'
        },
        {
          title: 'event with URL',
          description: 'description for Long Event',
          url: 'https://www.google.com/',
          start: '2020-09-13'
        }
      ]

    });

    calendar.render();
  });
</script>


<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" href="{{asset('css/select2-bootstrap4.css')}}">
</head>
<body>
<div id="vue-app">

  {{--
    - اعدادات الموقع
      -
    - الاعضاء
    - تذاكر الدعم الفني
    - المنتجات
    - اقسام الموقع
    - الفواتير
    - الصيانة
  --}}

  @include('Admin.Vertical_Navigation')

  {{-- هنا يتم اضافة اصلاحيات المخصصة --}}
  @if(isset($role_permission))

    @if($role_permission == true)
      <div id="main">
        @include('Admin.Top_Navigation')
        <div class="m-3">
            @yield('content')
        </div>
      </div>
    @else
    {{-- في حال لم يمتلك صلاحيات يت أظهار رسالة تحذير --}}
    <div id="main">
      @include('Admin.Top_Navigation')
      <div class="m-3">
        <div class="alert alert-danger" role="alert">
          يتطلب صلاحيات لدخول الصفحة
        </div>
      </div>
    </div>
    @endif

    @else
    {{-- في حال لا يتطلب صلاحيات خاصة --}}

    <div id="main">
      @include('Admin.Top_Navigation')
      <div class="m-3">
          @yield('content')
      </div>
    </div>

  @endif

</div>


<script src="{{asset('js/select2.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('select').select2({
      theme: 'bootstrap4',
      dir: "rtl"
    });
    $('#select2__select').select2({
      dir: "rtl"
    });
  });
</script>


@extends('Admin.Footer')
