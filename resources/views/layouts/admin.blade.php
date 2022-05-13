<!DOCTYPE html>
<!-- saved from url=(0050)https://smarthr.dreamguystech.com/light/index.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Dabster SoftTech">
    <meta name="author" content="Dabster">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://smarthr.dreamguystech.com/light/assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
     <!--<link rel="stylesheet" href="assets/css/morris.css">-->
    <link rel="stylesheet" href="{{asset('assets/css/morris.css')}}">
    <!--<link rel="stylesheet" href="assets/style.css">-->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
	 <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">-->
	 <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">		
    <!--[if lt IE 9]>
			<script src="assets/images/js/html5shiv.min.js"></script>
			<script src="assets/images/js/respond.min.js"></script>
		<![endif]-->
<style>
	button.attendance_button {
    border: unset;
    background: unset;

}
label.error {
    color: #b30b1a;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    width: 100%;
    margin-top: 11px;
    background-color: #f8d7da;
    padding: 5px 15px;
}
input.alert-danger {
    background: #fff;
}
.alert-danger {
    border-color: #f5c6cb !important;
}
select.alert-danger {
    background: #fff;
}
span.short {
    color: red;
}
#div1, #div2, #div3, #div4, #div5{
	float: left;
    width: 100%;
    height: auto;
    padding: 10px;
    border: 1px solid #cfd9e2;
}


</style>

</head>

<body data-new-gr-c-s-check-loaded="14.1026.0" data-gr-ext-installed="">
    <div class="main-wrapper">
       @include('layouts.header')
       @include('layouts.sidebar')
        <div class="page-wrapper" style="min-height: 880px;">
			<div class="content container-fluid">
				@yield('content')		
			</div>
        </div>

    </div>
   @include('layouts.footer')   
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</body>
</html>