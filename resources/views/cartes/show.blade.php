@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier une carte</h1>
    <form action="{{ route('cartes.update', $carte->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $carte->titre }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $carte->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>
            <select name="id_categorie" id="id_categorie" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $carte->id_categorie == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_taille_cart" class="form-label">Taille de la carte</label>
            <select name="id_taille_cart" id="id_taille_cart" class="form-control" required>
                <option value="1" {{ $carte->id_taille_cart == 1 ? 'selected' : '' }}>Petit (1 x 1)</option>
                <option value="2" {{ $carte->id_taille_cart == 2 ? 'selected' : '' }}>Large (2 x 1)</option>
                <option value="3" {{ $carte->id_taille_cart == 3 ? 'selected' : '' }}>Grand (2 x 2)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_proprietaire" class="form-label">Propriétaire</label>
            <select name="id_proprietaire" id="id_proprietaire" class="form-control" required>
                @foreach($proprietaires as $proprietaire)
                    <option value="{{ $proprietaire->id }}" {{ $carte->id_proprietaire == $proprietaire->id ? 'selected' : '' }}>{{ $proprietaire->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="musique" class="form-label">Musique</label>
            <input type="file" name="musique" id="musique" class="form-control">
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Vidéo</label>
            <input type="file" name="video" id="video" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection

