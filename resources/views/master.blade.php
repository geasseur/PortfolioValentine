<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <title>PortFolio Valentine</title>
        <script type="text/javascript" src="{{URL::asset('js/file.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/cv.js')}}"></script>
    </head>
    <body onload="chargementCV()">
      <header class='container d-flex justify-content-between align-items-center mt-2 mb-2 bg-warning'>
      <h1 class=''>Valentine Ventura</h1>
      <section>
        <a href="{{route('display.cv')}}">À propos |</a>
        <a href="{{ route('display.contact') }}">contact</a>
      </section>
      </header>
      <main class='container d-flex justify-content-between align-items-start bg-faded'>
        <section class='d-flex justify-content-around align-items-center flex-wrap'>
          @yield('content')
        </section>
        <aside class="">
          <section class='rubrique'>
            <form class="" action="{{ route('illustrations.display')}}" method="post">
              {{csrf_field()}}
              <input class='btnRubrique' type="submit" name="" value="Illustration">
            </form>
          </section>

          <section class='rubrique'>
            <form class="" action="{{ route('animations.display')}}" method="post">
              {{csrf_field()}}
              <input class='btnRubrique' type="submit" name="" value="Animation">
            </form>

          </section>

          <section class='rubrique'>
            <form class="" action="" method="post">
              {{csrf_field()}}
              <input type="submit" name="" value="Scenatio/BD">
            </form>
          </section>

          <section class='rubrique'>
            <form class="" action="" method="post">
              {{csrf_field()}}
              <input type="submit" name="" value="Working Progress">
            </form>
          </section>
        </aside>
      </main>
      <footer class='container d-flex justify-content-between align-items-center mt-2 mb-2 bg-danger'>
        <a href="#">facebook</a>
        <a href="#">Tumblr</a>
      </footer>
    </body>
</html>
