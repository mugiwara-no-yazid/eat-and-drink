<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css")
   @vite('resources/css/dashboard.css')
  @vite('resources/css/stylelogin.css')
  
</head>
<body>
  <header class="header">
    <nav class="nav">
      <div class="logo">Eat&Drink</div>
      <div class="stand"><a href="{{route('index')}}"><button>Stands</button></a></div>
      <div class="nav-buttons">
          <a  href="{{route('dashboard')}}"><button>Dashboard</button></a>
       @auth
         <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
          <a href="{{route('inscriptionStand')}}"><button>Ajouter un nouveau Stand</button></a>
      @endauth
      </div>
    </nav>
    <div class="banner">
       @yield("banner")
    </div>
  </header>

    <section>
        @yield("content")
    </section>
</body>
</html>
