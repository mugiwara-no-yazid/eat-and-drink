@extends('admin.home')

@section('content')
<h2 class="title">Stands Approuvés</h2>

    @if(!$approved || count($approved) === 0)
        <div class="bord-10 card empty flex justify-c w-100 box-s text-c" style="padding:50px;">
                <div>
                    <div class="flex justify-c p-10 m-10" style="margin:20px auto;"><i data-lucide="store" transform="scale(2)"></i></div>
                    <strong>Aucune demande de stand approuvée.</strong>
                </div>
            </div>    
    @endif
   @foreach($approved as $elem)

       <div class="card approved bord-10 flex bet">
            <div class="flex" style="gap:15px;">
                 {!! ($elem["logo"] !== null)
    ? "<img src='{$elem['logo']}' />" 
    : '<div style="border-radius: 100%; padding: 10px; border: solid 0.1px gray;">' . strtoupper($elem['name_stand'][0] . $elem['name_stand'][1]) . '</div>' 
!!} 
                    <div > 
                        <h3>{{ $elem['name_stand'] }}</h3>
                        <p class="flex start just-self-start" style="margin-top: 5px; gap:2px;"> <span class="flag" style="transform: translateX(-5px) scale(0.8); " > {{ $elem['category']}} </span> <span> {{ count($elem['products'])}} produits </span></p>
                    </div>
            </div>
            <div class="column flex">
                <p class="flag" style="background: rgba(102, 202, 69, 0.42);">&check; Approuvé</p>
                <p style="text-align: center;">{{ $elem['updated_at']}}</p>
            </div>
       </div>

       
   @endforeach

@endsection

@section('script')
    <script>
        document.querySelector('.approve').classList.add('card', 'box-s')
    </script>
@endsection