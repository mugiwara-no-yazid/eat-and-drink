@extends('base') 

@section('banner')
      <h1>La listes de vos stands</h1>
      
@endsection
@section('content')
 <main class="main-content">
      @if(session('error'))
      <div class="alert alert-danger" style="background-color: #f44336; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('error') }}</div>
      @endif
      <ul>
            @foreach($stands as $stand)
                 <li><a href="{{ route('detailstand', ['id' => $stand->id]) }}">{{ $stand->name_stand }}</a></li>
            @endforeach
      </ul>
             
 </main>
@endsection