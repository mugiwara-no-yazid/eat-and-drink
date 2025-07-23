<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Boulangerie Artisanale</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f6f2;
    }

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
    .container {
      display: flex;
      padding: 10rem;
    }
    .image-section img {
      width: 500px;
      border-radius: 10px;
    }
    .info-section {
      padding-left: 10rem;
      max-width: 600px;
    }
    .info-section h1 {
      font-size: 2.2rem;
      margin: 0.5rem 0;
    }
    .info-section p {
      color: #666;
      line-height: 1.6;
    }
    .info-boxes {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 1rem;
    }
    .info-box {
      background: #fff;
      border-radius: 10px;
      padding: 1rem;
      flex: 1 1 250px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .info-box p {
      margin: 0.5rem 0 0;
      color: #333;
    }
    .products {
      display: flex;
      padding: 2rem;
      gap: 1rem;
      
    }
    .product {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 1rem;
      width: 100%;
      max-width: 300px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .product img {
      width: 100%;
      border-radius: 10px;
    }
    .product h3 {
      margin: 1rem 0 0.5rem;
    }
    .product p {
      color: #777;
      font-size: 0.9rem;
      margin: 0;
    }
    .price {
      font-weight: bold;
      color: #f57c00;
      margin: 1rem 0;
    }
    .btn {
      background-color: #f57c00;
      color: #fff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<nav class="nav">
      <div class="logo">Eat&Drink</div>
      <div class="nav-buttons">
        @auth
         <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
      @endauth
       @guest
          <a href="{{route('login')}}"><button>Se connecter</button></a>
          <a href="{{route('inscription')}}"><button class="active">S'inscrire</button></a>
        @endguest </div>
    </nav>
  <div class="container">
    <div class="image-section">
      <img src="c:\Users\HP Elitebook\Downloads\WhatsApp Image 2025-06-13 at 07.14.13.jpeg" alt="Boulangerie produits">
    </div>
    <div class="info-section">
      <span style="background:#eee; padding: 0.3rem 0.6rem; border-radius: 5px; font-size: 0.9rem;">Boulangerie</span>
      <span style="color: #f57c00; font-weight: bold; margin-left: 0.5rem;">★ 4.8</span>
      <h1>La Boulangerie Artisanale</h1>
      <p>Depuis 1952, notre boulangerie perpétue la tradition artisanale française.<br>
        Nous utilisons exclusivement des farines locales et des méthodes de fermentation lente pour vous offrir des pains d'exception.</p>
      <div class="info-boxes">
        <div class="info-box">
          <strong>📍 Stand A12</strong>
          <p>Emplacement</p>
        </div>
        <div class="info-box">
          <strong>🕒 7h00 - 19h00</strong>
          <p>Horaires</p>
        </div>
        <div class="info-box">
          <strong>📞 01 42 33 44 55</strong>
          <p>Téléphone</p>
        </div>
        <div class="info-box">
          <strong>📧 contact@boulangerie-artisanale.fr</strong>
          <p>Email</p>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="produits-container">
    <h1>Produits du stand : {{ $stand->name_stand }}</h1>

    @foreach($produits as $produit)
    <div class="product">
      <img src="/mnt/data/Capture d'écran 2025-07-22 214418.png" alt="Pain bio">
      <h3>Croissants pur beurre</h3>
      <p>Viennoiseries feuilletées, beurre AOP Charentes-Poitou</p>
      <div class="price">1.80 €</div>
      
      <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
         @csrf
         <button class="btn">+ Ajouter au panier</button>
      </form>
    </div>
    @endforeach
    <!-- ajout de message d'ajout au panier -->
    <!-- @if(session('success'))
    <div style="
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 15px;
        font-weight: bold;
    ">
        ✅ {{ session('success') }}
    </div>
@endif -->



    
  </div>
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
