<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Dashboard
    </title>
</head>
<body>
    
    @session('status')
       <h1> {{ $value }}</h1>
    
    @endsession
    
    @if (session('status'))
     <div style="color: green; font-weight: bold; margin: 10px;">
        {{ session('status') }}
     </div>
    @endif


      @yield('content')

    <section>
 
      @yield('morecontent')

     </section>
        

</body>
</html>