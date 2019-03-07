@extends('home.public.header')

@section('content_01')
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/reception_public/Rotation/css/normalize.css" />
	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/reception_public/Rotation/css/main.css">
</head>
<body>
	{{-- 轮播开始 --}}
		<div class="trent-slider">
			{{-- 轮播图遍历 --}}
			@foreach($advertising_data as $k =>$v)
			<div class="t-slide {{ $v->ad_id == $first_id ? 'current-t-slide': '' }} " >
				<img src="all_uploads/{{ $v->ad_image }}" alt=""  />
			</div>
			@endforeach
			<div class="t-slider-controls" >
				<div class="arrow right-arrow">
					<div class="arrow-container">
						<div class="arrow-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="arrow left-arrow">
					<div class="arrow-container">
						<div class="arrow-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="t-load-bar">
					<div class="inner-load-bar"></div>
				</div>
				<div class="t-dots-container">
					<div class="t-slide-dots-wrap">
						<div class="t-slide-dots">

						</div>
					</div>
				</div>
			</div>
		</div>
	{{-- 轮播结束 --}}	
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="/reception_public/Rotation/js/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="/reception_public/Rotation/js/main.js"></script>
</body>
@endsection