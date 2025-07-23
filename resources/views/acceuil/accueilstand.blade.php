
  <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tous nos Exposants - Eat&Drink</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      padding-top: 80px; /* Espace pour la navbar fixe */
    }

    /* NAVBAR */
    .header {
      background: linear-gradient(135deg, #ff9a56, #ff7b00);
      color: white;
      display: flex;
      flex-direction: column;
      height: 40vh;
      width: 100vw;
      padding-top: 70px; /* Compensation pour la nav fixe */
    }

    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.616);
      color: #ff7a00;
      padding: 15px 40px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      display: flex;
      align-items: center;
    }
    .stand {
        align-items: center;
        font-size: 20px;
    }

    a {
      text-decoration: none;
    }

    .nav-buttons {
      display: flex;
      gap: 10px;
    }

    .nav-buttons button {
      background-color: #f5f5f5;
      color: #666;
      font-weight: 600;
      border: 1px solid #ddd;
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .nav-buttons .active {
      background-color: #ff7b00;
      color: white;
      border-color: #ff7b00;
    }

    .nav-buttons button:hover:not(.active) {
      background-color: #e8e8e8;
      color: #333;
    }
    .btn {
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn-primary {
      background-color: #f97316;
      color: white;
    }

    .btn-secondary {
      background-color: white;
      border: 1px solid #ccc;
      color: #444;
    }

    .banner {
      background-color: #f97316;
      color: white;
      text-align: center;
      padding: 60px 20px;
    }

    .banner h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .banner p {
      font-size: 18px;
    }

    .search-filter {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      padding: 30px;
      background-color: white;
    }

    .search-filter input,
    .search-filter select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      min-width: 250px;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 30px 20px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-body {
      padding: 15px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }

    .badge {
      background-color: #ffe9d6;
      color: #f97316;
      font-size: 12px;
      padding: 4px 8px;
      border-radius: 15px;
    }

    .details {
      font-size: 14px;
      color: #555;
      margin-bottom: 10px;
    }

    .description {
      font-size: 14px;
      color: #666;
      flex-grow: 1;
    }

    .card a {
      display: block;
      background-color: #f97316;
      color: white;
      text-align: center;
      padding: 10px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
      margin-top: 15px;
    }
    .stand button{
      background-color: transparent;
      border: none;
      font-size: 25px;
      cursor: pointer;
      text-decoration: underline;
    }
    .stand button:hover{
     color: #ff7a00;
    }
  </style>
</head>
<body>

  <!-- NAV -->
 <nav class="nav">
      <div class="logo">Eat&Drink</div>
      <div class="stand"><a href="{{route('index')}}"><button>Stands</button></a></div>
      <div class="nav-buttons">  
        @auth
         <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
      @endauth
       @guest
          <a href="{{route('login')}}"><button>Se connecter</button></a>
          <a href="{{route('inscription')}}"><button class="active">S'inscrire</button></a>
        @endguest </div>
       
    </nav>

  <!-- BANNER -->
  <section class="banner">
    <h1>Tous nos Exposants</h1>
    <p>Découvrez {{count($stands)}} artisans passionnés et leurs spécialités</p>
  </section>

  <!-- SEARCH BAR -->
  
  <!-- SECTION PRODUITS -->
  <div class="container">
    <h2 style="margin-bottom: 20px; color: #444;">{{count($stands)}} stands trouvés</h2>
    
    <div class="grid">

      <!-- Exemple de carte produit statique -->
   
   @foreach($stands  as $stand)  
   

    <div class="card">
        <img src="{{asset('photos/'.$stand->logo)}}" alt="Nom du Stand">
        <div class="card-body">
          <div class="card-header">
            <h3>{{$stand->name_stand}}</h3>
            <span class="badge">{{$stand->category}}</span>
          </div>
          <p class="description">
            {{$stand->description}}
          </p>
          <a href="{{route('voirStand',['id'=>$stand->id])}}">Voir le stand</a>

        </div>
      </div>
@endforeach

      <!-- Ajoute autant de cartes que tu veux ici -->

    </div>
  </div>

  <!-- JS pour effet scroll -->
  <script>
    window.addEventListener('scroll', function () {
      const header = document.getElementById('main-header');
      if (window.scrollY > 80) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  </script>

</body>
</html>