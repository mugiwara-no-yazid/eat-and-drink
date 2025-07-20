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
      
    </nav>
    <div class="banner">
        <h1>
          Votre demande est en cours de traitement
        </h1>
    </div>
  </header>

    <section>
        @yield("content")
    </section>
</body>
</html>
