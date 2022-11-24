<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>เว็บเก็บข้อมูลรายรับ-รายจ่าย</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

   <!-- Custom styles for this template-->
  <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css" />

</head>


<body>

    <!-- <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-topleft w3-padding-large w3-xlarge">
            Logo
        </div>
        <div class="w3-display-middle">
            <h1 class="w3-jumbo w3-animate-top">COMING SOON</h1>
            <hr class="w3-border-grey" style="margin:auto;width:40%">
            <p class="w3-large w3-center">35 days left</p>
        </div>
        <div class="w3-display-bottomleft w3-padding-large">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>
    </div> -->

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">หน้าหลัก</a>
            @else
            <a href="{{ route('login') }}">เข้าสู่ระบบ</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">สมัครสมาชิก</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <i class="fas fa-edit" weight="250" height="250"></i>
            <div class="title m-b-md">
                VRU MY-WALLET
            </div>
            <h1>เว็บไซต์เก็บข้อมูลรายรับ-รายจ่ายของนักศึกษา มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์</h1>
            <br>
            <marquee scrollamount="10" direction="left">จัดทำโดย นายปิยบุตร สมสกุล นักศึกษาจาก
                มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์</marquee>
        </div>
    </div>
</body>

</html>