<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pembayaran</title>
    <link rel="stylesheet" href="{{asset('build/assets/app.2b2f47e4.css')}}">
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body>
    <div class="navbar bg-info">
        <a class="btn btn-ghost normal-case text-xl ">Form Pembayaran</a>
      </div>
      <div class="container mx-auto py-2">
        {{$slot}}
      </div>
      @stack('modal')
      @livewireScripts
    <script defer src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

</body>
</html>
