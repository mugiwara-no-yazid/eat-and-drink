<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eat&Drink - Inscription Exposant</title>
  @vite('resources/css/stylelogin.css')
</head>
<body>
  <header class="header">
    <nav class="nav">
      <div class="logo">Eat&Drink</div>
      <div class="nav-buttons">
      @auth
         <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
      @endauth
       @guest
          <a href="{{route('login')}}"><button>Se connecter</button></a>
          <a href="{{route('inscription')}}"><button class="active">S'inscrire</button></a>
        @endguest
      </div>
    </nav>
    <div class="banner">
      <h2>Devenir Exposant</h2>
      <h3>Rejoignez l'événement Eat&Drink et présentez vos créations culinaires</h3>
    </div>
  </header>

  <section class="form-section">
    <div class="form-container">
      <h3>Inscription Exposant</h3>
      <p>Remplissez ce formulaire pour demander votre participation à l'événement</p>
      
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Nom de l'entreprise *</label>
          <input id="name" name ="name" placeholder="Ex: La Boulangerie Artisanale" value="{{old('name')}}" required>
          @error('name')
            {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <label for="email">Email professionnel *</label>
          <input type="email" id="email" name="email" placeholder="contact@votreentreprise.fr" value="{{old('email')}}" required>
          @error('email')
            {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <label for="number">Téléphone *</label>
          <input type="tel" name="number" id="number" placeholder="0123456789" value="{{old('number')}}" pattern="^(?:\+229|00229|0)[1-9][0-9]{8}$" required>
          @error('number')
            {{$message}}
          @enderror
        </div> 
        <div class="form-row">
          <div class="form-group">
            <label for="password">Mot de passe *</label>
            <input type="password" name="password" id="password"  placeholder="••••••••" required>
            @error('password')
               {{$message}}
            @enderror
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe *</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
          </div>
          @error('password_confirmation')
             {{$message}}
          @enderror
        </div>
        
        <button type="submit" class="submit-btn">Envoyer ma demande</button>
      </form>
    </div>
  </section>
</body>
</html>