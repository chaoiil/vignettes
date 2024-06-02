@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Catégories</h2>
    <div class="grid">
        @foreach ($categories as $category)
            <div class="item" style="height: {{ rand(150, 300) }}px;"> 
                <div class="content">
                    <h2>{{ $category->title }}</h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
