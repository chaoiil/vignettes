@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier la Catégorie</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $category->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        </form>
    </div>
@endsection
