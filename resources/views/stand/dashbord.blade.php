@extends('base') 

@section('banner')
      <h1>La listes de vos stands</h1>
@endsection
@section('content')
<style>
      /* Style pour la liste principale */
a{
      margin-bottom: 5px;
}
ul {
    list-style: none;
    padding: 0;
    margin: 20px 0;
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 16px;
}

/* Style pour les éléments de liste */
li {
    padding: 12px 16px;
    margin-bottom: 8px;
    background-color: white;
    border-radius: 6px;
    border-left: 4px solid #ff6b35;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-weight: 500;
    color: #333;
    transition: all 0.2s ease;
}

a:last-child {
    margin-bottom: 0;
}

/* Style alternatif avec puces personnalisées */
li::before {
    content: "▪";
    color: #ff6b35;
    font-size: 16px;
    margin-right: 8px;
}

/* Style du bouton */
button {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    margin-top: 16px;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #5a6268;
}
</style>
 <main class="main-content">
      @if(session('error'))
      <div class="alert alert-danger" style="background-color: #f44336; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('error') }}</div>
      @endif
      <ul>
            @foreach($stands as $stand)
                 <a href="{{ route('detailstand', ['id' => $stand->id]) }}"><li>{{ $stand->name_stand }}</li></a>
            @endforeach
      </ul>
       <div class="nav-buttons">
        <a href="{{route('inscriptionStand')}}"><button>Ajouter un nouveau stand</button></a>
      </div>
      

 </main>
@endsection