<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/stylelogin.css')
    @vite('resources/css/admin.css')
    @vite('resources/js/app.js')
    @vite('resources/js/adminHome.js')
</head>
<body class="admin">
    <header>
        <nav class="nav flex bet">
            <div class="logo">Eat&Drink</div>

            <div class="cursp card box-s bord-5" style="width:max-content; color: #333;">Administration</div>
        </nav>
    </header>

    <main class="">
        <section>
            <div class="first">
                <h1>Administration</h1>
                <p style="font-size: 0.9em; color: gray; margin-top: 10px;">Gérez l'évenenement Eat&Drink</p>
            </div>

            <div class="stats flex">
                <div class="card flex"> <i data-lucide="users"></i> <p> <strong style="font-size: 2em; color: black;">{{ $stats['pending'] }}</strong> Demandes en attente </p> </div>
                <div class="card flex"> <i data-lucide="store" ></i> <p> <strong style="font-size: 2em; color: black;"> {{ $stats['accepted'] }} </strong> Stands approuvés</p></div>
                <div class="card flex"> <i data-lucide="shopping-cart"></i><strong style="font-size: 2em; color: black;">{{ $stats['commands'] }}</strong> <p>Commandes totales</p> </div>
            </div>

            <nav class="flex nav2">  
                    <a class=" text-c block flex box-s" href="{{ route('waitingList')}}"> <i data-lucide="users"></i> Demandes</a>
                    <a class=" text-c flex block" href="{{ route('standApproved')}}" > <i data-lucide="users"></i> Stands approuvés</a>
                    <a class=" text-c flex block" href=""> <i data-lucide="users"></i> Commandes</a>
            </nav>
        </section>
       
        <section class="main-section">
            @yield('content')
        </section>
    </main>
</body>
</html>