<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pembayaran</title>
    <link rel="stylesheet" href="{{asset('build/assets/app.821da831.css')}}">
    @livewireStyles
</head>
<body>
    <div class="navbar bg-info">
        <a class="btn btn-ghost normal-case text-xl ">Form Pembayaran</a>
      </div>
      <div class="container">
        {{$slot}}
      </div>
      @stack('modal')
      @livewireScripts
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

</body>
</html>
