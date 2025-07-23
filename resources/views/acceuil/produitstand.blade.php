<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Boulangerie Artisanale</title>
  @vite('resources/css/dashboard.css')
  @vite('resources/css/stylelogin.css')
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
.facture {
  background-color: #f8f9fa;
  border-radius: 10px;
  padding: 20px;
  margin-top: 30px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  gap: 15px;
  max-width: 400px;
  margin-left: auto;
  margin-bottom: 10vh;
}

.totale {
  font-size: 24px;
  font-weight: bold;
  color: #2c3e50;
}

.qte {
  font-size: 18px;
  color: #7f8c8d;
  margin-bottom: 5px;
}

button[type="submit"] {
  background-color: #3498db;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 5px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
}

button[type="submit"]:hover {
  background-color: #2980b9;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

    .quantity-selector {
    display: flex;
    margin-bottom: 10px;
}

.quantity-selector button {
    width: 30px;
    height: 30px;
    background: #f0f0f0;
    border: 1px solid #ddd;
    cursor: pointer;
}

.quantity-input {
    width: 50px;
    text-align: center;
    border: 1px solid #ddd;
    margin: 0 5px;
}

.add-to-cart-btn {
    display: inline-block;
    padding: 8px 15px;
    background: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 4px;
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
input {
  border: none;
  border-bottom: 2px solid #e0e0e0;
  width: 50px;
  padding: 5px 0;
  font-size: 16px;
  background-color: transparent;
  transition: all 0.3s ease;
  outline: none;
  color: #333;
  margin: 0 5px;
}

input:focus {
  border-bottom: 2px solid #4285f4; /* Couleur bleue Google */
  box-shadow: 0 2px 0 0 rgba(66, 133, 244, 0.2);
  width: 60px; /* Légère augmentation pour l'effet focus */
}

/* Style pour hover (optionnel) */
input:hover {
  border-bottom: 2px solid #b3b3b3;
}

/* Style pour les inputs remplis */
input:not(:placeholder-shown) {
  border-bottom: 2px solid #4caf50; /* Vert pour indiquer qu'il y a du contenu */
}

/* Animation alternative */
@keyframes inputHighlighter {
  from { background: #4285f4; }
  to   { width: 0; background: transparent; }
}

/* Version plus moderne avec flex pour l'alignement */
.input-container {
  display: flex;
  align-items: center;
  margin: 10px 0;
}

.input-container label {
  margin-right: 10px;
  font-family: 'Roboto', sans-serif;
  color: #555;
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
    .btn-add {
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
      <div class="stand"><a href="{{route('index')}}"><button>Stands</button></a></div>
      <div class="nav-buttons">
        @auth
        <a href="{{route('panier')}}"><button>Voir pannier</button></a>
         <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
      @endauth
       @guest
          <a href="{{route('login')}}"><button>Se connecter</button></a>
          <a href="{{route('inscription')}}"><button class="active">S'inscrire</button></a>
        @endguest </div>
    </nav>
    
  <div class="container">
    
    <div class="image-section">
    <img src="{{asset('photos/'.$stand->logo)}}" alt="Nom du Stand">    
  </div>
    <div class="info-section">
      <span style="background:#eee; padding: 0.3rem 0.6rem; border-radius: 5px; font-size: 0.9rem;"> {{$stand->category}}</span>
      <h1>{{$stand->name_stand}}</h1>
      <p> {{$stand->description}}</p>
      <div class="info-boxes">
        <div class="info-box">
          <strong> {{$proprietaire->number}}</strong>
          <p>Téléphone</p>
        </div>
        <div class="info-box">
          <strong> {{$proprietaire->email}}</strong>
          <p>EMail</p>
        </div>
      </div>
    </div>
  </div>
@if(session('success'))
      <div style="background-color: #5aeb17ff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('success') }}</div>
@endif
@if(session('error'))
      <div style="background-color: #e41b1bff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('error') }}</div>
@endif
  <div class="products">
    <div class="produits-container">
    <h1>Produits du stand : {{ $stand->name_stand }}</h1>
    @if(count($produits)===0 )
      <h1>Ce stand n'as plus de produits en stock</h1>
    @else

  
     <div class="products-grid">
                
                
                @foreach ($produits as $produit)
                
                    <div class="product-card">
    <img src="{{asset('photos/'.$produit->image_url)}}" alt="{{$produit->nom}}" class="product-image">
    <div class="product-info">
        <h3 class="product-name">{{$produit->nom}}</h3>
        <p class="product-description">{{$produit->description}}</p>
        <div class="product-price">{{$produit->prix}} Franc CFA</div>
        <div class="product-card">
    <!-- ... autres éléments du produit ... -->
    <div class="product-actions">
        <div class="quantity-selector">
            <button class="quantity-minus">-</button>
            <input type="number" id="quantity-{{ $produit->id }}" value="1" min="1" class="quantity-input">
            <button class="quantity-plus">+</button>
        </div>
        <a href="#" class="add-to-cart-btn" data-id="{{ $produit->id }}">
            Ajouter au panier
        </a>
    </div>
</div>
    </div> </div>
                @endforeach
            </div>
  
    @endif
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
   document.querySelectorAll('.quantity-minus').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.nextElementSibling;
        if (input.value > input.min) input.value--;
    });
});

document.querySelectorAll('.quantity-plus').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.previousElementSibling;
        input.value++;
    });
});

document.querySelectorAll('.add-to-cart-btn').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const productId = this.getAttribute('data-id');
        const quantity = document.getElementById(`quantity-${productId}`).value;
        window.location.href = `/addcommande/${productId}?quantity=${quantity}`;
    });
});
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
