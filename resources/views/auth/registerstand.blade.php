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
          <label for="name">Nom du Stand *</label>
          <input id="name" name ="name" placeholder="Ex: La Boulangerie Artisanale" value="{{old('name')}}" required>
          @error('name')
            {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <label for="category">Catégorie d'activité *</label>
          <input id="category" name="category" value="{{old('category')}} " placeholder="Ex: Boulangerie, Pâtisserie, Fromages..." required>
          @error('category')
            {{$message}}
          @enderror
        </div>

        
        <div class="form-group">
          <label for="description">Description de votre stand *</label>
          <textarea id="description" name="description" rows="4" value="{{old('description')}}" placeholder="Présentez votre entreprise, vos spécialités, votre savoir-faire..." required></textarea>
          <p class="info-text">Cette description sera visible sur votre page stand</p>
          @error('description')
             {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <label>Logo de l'entreprise</label>
             <input type="file" id="logo" name="logo" accept="image/*" class="file-input">
          @error('logo')
             {{$message}}
          @enderror
        </div>
        
        <div class="form-group">
          <div class="conditions">
            <h3>Conditions de participation</h3>
            <ul>
              <li>Respect des normes d'hygiène alimentaire</li>
              <li>Assurance responsabilité civile professionnelle</li>
              <li>Produits de qualité artisanale ou locale</li>
              <li>Présence obligatoire pendant toute la durée de l'événement</li>
            </ul>
          </div>
        </div>
        
        <button type="submit" class="submit-btn">Envoyer ma demande</button>
      </form>
    </div>
  </section>
 
</body>
</html>