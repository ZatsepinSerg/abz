<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{mix('/css/all.css')}}" />
    <title>Document</title>
</head>
<body>
@yield('content')


</body>
<script type="application/javascript" src="{{mix('/js/app.js')}}"></script>
<script type="application/javascript" src="{{mix('/js/all.js')}}"></script>

<script type="text/javascript">
    $('.tree').treegrid();
</script>
</html>