@extends('admin.home')

@section('content')
<h2 class="title">Stands Approuvés</h2>

    @if(!$approved || count($approved) === 0)
        <p>Aucune demande de stand approuvée.</p>
    @endif

   @foreach($approved as $elem)
        
       <div class="card approved bord-10 flex bet">
            <div class="flex" style="gap:15px;">
                 {!! ($elem['logo'] && $elem['logo'] !== 0) 
    ? "<img src='{$elem['logo']}' />" 
    : '<div style="border-radius: 100%; padding: 10px; border: solid 0.1px gray;">' . strtoupper($elem['stand_name'][0] . $elem['stand_name'][1]) . '</div>' 
!!} 
                    <div> 
                        <h3>{{ $elem['stand_name'] }}</h3>
                        <p class="flex" style="margin-top: 5px;"> <span class="flag"> {{ $elem['category'] ?? 'Rien'}} </span> <span> {{ $stand['products'] ?? 0 }} produits </span></p>
                    </div>
            </div>
            <div class="column flex">
                <p class="flag" style="background: rgba(102, 202, 69, 0.42);">&check; Approuvé</p>
                <p style="text-align: center;">{{ $elem['updated_at'] ?? 'Today' }}</p>
            </div>
       </div>

       
   @endforeach

@endsection