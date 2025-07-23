<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eat&Drink - Connexion</title>
  @vite('resources/css/stylelogin.css')
</head>
<body>
  <header class="header">
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
    <div class="banner">
      <h2>Connexion</h2>
      <h3>Accédez à votre espace personnel</h3>
    </div>
  </header>

  <section class="form-section">
    <div class="form-container">

      <h3>Espace Exposant</h3>
      <p>Connectez-vous pour gérer votre stand</p>
      
      <form action="" method="post">
          @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="contact@votreentreprise.fr" value="{{old('email')}}" required>
          @error('email')
            {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" value="{{old('password')}}" placeholder="••••••••" required>
         @error('password')
             {{$message}}
          @enderror
        </div>
        
        <button type="submit" class="submit-btn">Se connecter</button>
        
        <div class="signup-link">
          <p>Pas encore inscrit ?</p>
           <a href="{{route('inscription')}}"><button type="button" class="submit-btn">Devenir exposant</button></a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>