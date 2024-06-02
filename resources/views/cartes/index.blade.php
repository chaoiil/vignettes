@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cartes</h1>
    <a href="{{ route('cartes.create') }}" class="btn btn-success mb-3">Créer une nouvelle carte</a>

    <div class="mb-3">
        <label for="categorie" class="form-label">Filtrer par catégorie</label>
        <select id="categorie" class="form-select" onchange="filterByCategory(this.value)">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        @foreach($cartes as $carte)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">{{ $carte->titre }}</div>
                    <div class="card-body">
                        @if($carte->image)
                            <img src="{{ asset('storage/' . $carte->image) }}" alt="{{ $carte->titre }}" class="img-fluid">
                        @elseif($carte->video)
                            <video controls class="img-fluid">
                                <source src="{{ asset('storage/' . $carte->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @elseif($carte->musique)
                            <audio controls class="img-fluid">
                                <source src="{{ asset('storage/' . $carte->musique) }}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        @endif
                        <p class="card-text">{{ $carte->description }}</p>
                        <p class="card-text">Catégorie: {{ $carte->category->nom }}</p>
                        <p class="card-text">Propriétaire: {{ $carte->proprietaire->id }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('cartes.show', $carte->id) }}" class="btn btn-primary btn-sm">Voir la carte</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
function filterByCategory(categoryId) {
    window.location.href = "{{ route('cartes.index') }}?category=" + categoryId;
}
</script>
@endsection
