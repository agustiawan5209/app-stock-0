<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{public_path('build/assets/app.3f308fd3.css')}}">
</head>

<body>
    <center>
        <table class="w-full">
            <tr>
                <th class="text-2xl font-bold ">UD MEGA BUANA</th>
            </tr>
            <tr>
                <th class="text-base font-normal">@yield('title')</th>
            </tr>
            <tr>
                <th>Tanggal : {{Carbon\Carbon::now()->format('Y-m-d')}} </th>
            </tr>
        </table>
    </center>
    @yield('content')

    <table class="w-full">
        <caption>Penanggung Jawab</caption>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr>
            <td>Drs.H. Idrus Husain</td>
        </tr>
    </table>
</body>

</html>
