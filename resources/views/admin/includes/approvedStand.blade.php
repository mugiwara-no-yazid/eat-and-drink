@extends('admin.home')

@section('content')
<h2 class="title">Stands Approuvés</h2>

    @if(!$approved || count($approved) === 0)
        <p>Aucune demande de stand approuvée.</p>
    @endif
   @foreach($approved as $elem)

       <div class="card approved bord-10 flex bet">
            <div class="flex" style="gap:15px;">
                 {!! ($elem["logo"] !== null)
    ? "<img src='{$elem['logo']}' />" 
    : '<div style="border-radius: 100%; padding: 10px; border: solid 0.1px gray;">' . strtoupper($elem['name_stand'][0] . $elem['name_stand'][1]) . '</div>' 
!!} 
                    <div> 
                        <h3>{{ $elem['name_stand'] }}</h3>
                        <p class="flex" style="margin-top: 5px;"> <span class="flag"> {{ $elem['category']}} </span> <span> {{ count($elem['products'])}} produits </span></p>
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