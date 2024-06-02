@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle carte</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cartes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" value="{{ old('titre') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>
            <select name="id_categorie" class="form-select" id="id_categorie" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->title }}">{{ $categorie->title }}</option>
                @endforeach
            </select>
        </div>      

        <div class="mb-3">
            <label for="id_taille_cart" class="form-label">Taille de la carte</label>
            <select name="id_taille_cart" class="form-select" id="id_taille_cart" required onchange="updateBlockSize(this.value)">
                <option value="">Sélectionner une taille</option>
                @foreach($tailles as $taille)
                    <option value="{{ $taille->id }}" {{ old('id_taille_cart') == $taille->id ? 'selected' : '' }}>
                        {{ $taille->nom }} ({{ $taille->largeur }} x {{ $taille->hauteur }})
                    </option>
                @endforeach
            </select>
        </div>
        

        <div class="mb-3">
            <label for="id_proprietaire" class="form-label">Propriétaire</label>
            <select name="id_proprietaire" class="form-select" id="id_proprietaire" required>
                <option value="">Sélectionner un propriétaire</option>
                @foreach($proprietaires as $proprietaire)
                    <option value="{{ $proprietaire->id }}" {{ old('id_proprietaire') == $proprietaire->id ? 'selected' : '' }}>{{ $proprietaire->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (facultatif)</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="musique" class="form-label">Musique (facultatif)</label>
            <input type="file" name="musique" class="form-control" id="musique" accept="audio/*">
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Vidéo (facultatif)</label>
            <input type="file" name="video" class="form-control" id="video" accept="video/*">
        </div>

        <button type="submit" class="btn btn-primary">Créer la carte</button>
    </form>
</div>
@endsection
