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
            <div class="card w-mc bord-10 box-s">Dashboard</div>

            <div class="flex">
                <div class="cursp card box-s bord-5 standard-hover" style="width:max-content; color: #333;">Administration</div>
                <div class="flex bord-5 standard-hover w-mc" style="color: #333; font-size:0.9em; padding:7px 10px;"><i data-lucide="user" width="15" stroke="#333"></i> Profil</div>
                <a href="{{ route('ad-logout') }}" class="flex bord-5 p-10 standard-hover" style="padding:7px 10px;"><i data-lucide="log-out" width="20"></i></a>
            </div>
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
                <div class="card flex"> <i data-lucide="shopping-cart"></i><p><strong style="font-size: 2em; color: black;">{{ $stats['commands'] }}</strong> Commandes totales</p></div>
            </div>

            <nav class="flex nav2">  
                    <a class=" text-c block flex wait" href="{{ route('waitingList')}}"> <i data-lucide="users"></i> Demandes</a>
                    <a class=" text-c flex block approve" href="{{ route('standApproved')}}" > <i data-lucide="users"></i> Stands approuvés</a>
                    <a class=" text-c flex block command" href="{{ route('commands') }}"> <i data-lucide="users"></i> Commandes</a>
            </nav>
        </section>
       
        <section class="main-section">
            @yield('content')
        </section>

        @yield('script')
    </main>
</body>
</html>