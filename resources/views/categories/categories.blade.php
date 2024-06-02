@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Catégories</h2>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
</div>
@endsection
