<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pembayaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</body>
</html>
