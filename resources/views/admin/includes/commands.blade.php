@extends('admin.home')

@section('content')
<h2 class="title">Liste des commandes</h2>

@if(!$commands || count($commands) === 0)
    <div class="bord-10 card empty flex justify-c w-100 box-s text-c" style="padding:50px;">
        <div>
            <div class="flex justify-c p-10 m-10" style="margin:20px auto;"><i data-lucide="shopping-cart" transform="scale(2)"></i></div>
            <strong>Aucune commande n'a encore été effectuée.</strong>
        </div>
    </div>
@endif
    @foreach($commands as $elem)
        <div class="commands card bord-10" style="padding: 20px;">
            <p style="font-size:1.2em;">Commande #{{$elem['id']}}</p>
            <div class="flex bet  py-10">
                <div class="flex column justify-c" style="color:#716d54;">
                    <p>Client: {{ $elem['user']['name'] }} </p>
                    <p>Stand: {{ $elem['stand']['name_stand'] }} </p>
                </div>

                <div class="flex column">
                    <p class="flag w-mc">{{$elem['statut']}}</p>
                    <p style="font-size:0.9em; color: #716d54;">{{ $elem['updated_at'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        document.querySelector('.command').classList.add('card')
    </script>
@endsection