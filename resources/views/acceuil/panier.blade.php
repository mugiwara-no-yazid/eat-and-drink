@extends('base') 
<style>
    .product-card
    {
        margin-top: 25vh;
    }
.panier-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.produit-item {
    display: flex;
    border-bottom: 1px solid #eee;
    padding: 15px 0;
    gap: 20px;
}

.produit-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.produit-info {
    flex-grow: 1;
}

.quantity-control {
    margin: 10px 0;
}

.checkout-btn {
    display: inline-block;
    padding: 10px 20px;
    background: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}
</style>
@section('banner')
@if(session('success'))
      <div style="background-color: #5aeb17ff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('success') }}</div>
@endif
@if(session('error'))
      <div style="background-color: #e41b1bff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('error') }}</div>
@endif
@endsection
@section('content')
@endsection
@section('content')
<div class="panier-container">
    <h2>Votre Panier</h2>
    
    @if(count($products) > 0)
        <div class="produits-list">
            @foreach($products as $product)
                <div class="produit-item">
                    <img src="{{ asset('photos/'.$product['image']) }}" alt="{{ $product['nom'] }}">
                    <div class="produit-info">
                        <h3>{{ $product['nom'] }}</h3>
                        <p>Prix unitaire: {{ $product['prix'] }} CFA</p>
                        <div class="quantity-control">
                            <form action="{{ route('update-cart', $product['id']) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $product['quantite'] }}" min="1">
                                <button type="submit">Mettre à jour</button>
                            </form>
                            <a href="{{ route('remove-from-cart', $product['id']) }}">Supprimer</a>
                        </div>
                        <p>Total: {{ $product['total'] }} CFA</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="panier-total">
            <h3>Total Général: {{ $total }} CFA</h3>
            <a href="" class="checkout-btn">Passer la commande</a>
        </div>
    @else
        <p>Votre panier est vide</p>
        <a href="{{ route('index') }}">Continuer vos achats</a>
    @endif
</div>                    
@endsection