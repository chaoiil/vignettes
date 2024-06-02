@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Détails de la Catégorie</h2>
        <p><strong>Titre :</strong> {{ $category->title }}</p>
        <p><strong>Description :</strong> {{ $category->description }}</p>
        <!-- Lien pour la modification -->
        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Modifier</a>
        <!-- Formulaire pour la suppression -->
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection
