<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  @vite('resources/css/stylelogin.css')
</head>
<body class="flex">
        <nav class="nav">
        <div class="logo">Eat&Drink</div>
        <!-- <div class="nav-buttons">
            <a  href="{{route('dashboard')}}"><button>Dashboard</button></a>
        @auth
            <a href="{{route('deconnexion')}}"><button>Se deconnecter</button></a>
        @endauth -->
        </div>
        </nav>


        <form action="" class="card rounded admin-login" method="POST">
            @csrf
            <h1 style="text-align: center;">Login</h1>

            <input type="email" name="email" placeholder="Votre email" class="rounded">
            <input type="password" name="password" placeholder="Mot de passe" class="rounded">

            <button type="submit">Soumettre</button>
        </form>
    </body>
</html>
