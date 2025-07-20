@extends('base') 

@section('banner')

    
      <div>
        @if(!isset($stand->logo))
        <h1>Gestion du stand {{$stand->name_stand}}</h1>
        @else
        <div>
            <img class="logostand" src="{{asset('photos/'.$stand->logo)}}" alt="logo du stand"  >
            <h1>Gestion du stand {{$stand->name_stand}}</h1>
        </div>
        @endif
      </div>

@endsection
@section('content')
 <main class="main-content">
@if(session('success'))
      <div style="background-color: #5aeb17ff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('success') }}</div>
@endif
@if(session('error'))
      <div style="background-color: #e41b1bff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('error') }}</div>
@endif

        <div class="page-header">
            <div>
                <h1 class="page-title">Tableau de bord</h1>
                <p class="page-subtitle">Gérez toute l'activité de vos produits</p>
            </div>
           
        </div>

        <nav class="tab-nav">
            <a href="#" class="tab">Commandes</a>
        </nav>

        <section class="app">
            <div class="section-header">
                <h2 class="section-title">Mes Produits</h2>
                <a href="{{ route('addproduit', ['id' => $stand->id]) }}"><button class="add-product-btn">Ajouter un produit</button></a>
            </div>
            <div class="products-grid">

                @foreach ($produits as $produit)
                    <div class="product-card">
                    <img src="{{asset('photos/'.$produit->image_url)}}" alt="{{$produit->nom}}" class="product-image">
                    <div class="product-info">
                        <h3 class="product-name">{{$produit->nom}}</h3>
                        <p class="product-description">{{$produit->description}}</p>
                        <div class="product-price">{{$produit->prix}}franc CFA</div>
                        <div class="product-actions">
                           <a href="{{ route('modifieproduit', ['id' => $stand->id,'produit'=>$produit->id]) }}"><button class="btn-modify"><i class="fas fa-edit"></i> Modifier</button></a>
                            <a href="{{ route('supprimerproduit', ['id' => $stand->id,'produit'=>$produit->id]) }}"> <button class="btn-delete"><i class="fas fa-trash"></i></button> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection