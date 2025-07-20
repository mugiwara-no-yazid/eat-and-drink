@extends('base') 

@section('banner')

    
        <h1>
            Ajouter un nouveau produit a votre stand
        </h1>
        <a class="retour" href="{{route('detailstand',$stand->id)}}">Revenir sur le stand</a>

@endsection
@section('content')
<style>
    .retour{
        background-color: orangered;
        margin-top: 15px;
        padding: 10px;
        cursor: pointer;
    }
    .retour:hover{
        background-color: rgba(255, 68, 0, 0.493);
        color: black;
    }
    .formulaire
    {
        padding-top: 50px;
        justify-items: center;
    }
    form{
    display: flex;
    flex-direction: column;
    width: 50vw;
    align-self: center;
    padding:0 0 5vw  0 ;
}
.form-actions
{
    display: flex;
    justify-content: space-around;
   
}
.form-actions button
{
    max-width: 10vw;
}
.error, .danger
{
    background-color: #f44336; 
    color: white; 
}
</style>
<div class="formulaire">
     @if(session('sucess'))
      <div style="background-color: #5aeb17ff; color: white; padding: 15px; border-radius: 5px; margin: 10px 0;">{{ session('sucess') }}</div>
      @endif
     <form action="" method="post" id="product-form" enctype="multipart/form-data">
        @csrf
                    <div class="form-group">
                        <label for="nom">Nom du produit *</label>
                        <input type="text" id="nom" name="nom" value="{{old('nom') }}" placeholder="Ex. Pain de campagne" required>
                        <div class="error">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name ="description"  placeholder="Décrivez votre produit..." rows="4">{{old('description') }}</textarea>
                        <div class="error">
                            @error('description')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="prix">Prix *</label>
                        <input type="number" id="prix" name="prix" value="{{old('prix') }}" placeholder="0" min="0" required>
                        <div class="error">
                            @error('prix')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image_url">Image du produit</label>
                        <input type="file" name="image_url" id="image_url" accept="image/*" required>
                    <div class="error">
                            @error('image_url')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Ajouter</button>
                        <a href="{{route('detailstand',$stand->id)}}"><button type="button" class="submit-btn danger">Annuler</button></a>
                    </div>
                </form>
</div>
@endsection
 