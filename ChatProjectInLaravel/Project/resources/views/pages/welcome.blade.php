<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/Project/public/">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyApp</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
@yield('style')
</head>
<body>

@yield('content')
@yield('scripts')
</body>
</html>