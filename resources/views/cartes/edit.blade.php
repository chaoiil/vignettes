@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supprimer une carte</h1>
    <form action="{{ route('cartes.destroy', $carte->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Êtes-vous sûr de vouloir supprimer cette carte ? Cette action est irréversible.</p>
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="{{ route('cartes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
