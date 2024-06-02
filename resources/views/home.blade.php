    @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
    @endif

@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="wrapper__left">
        <h1 class="heading">Accueil</h1>
    </div>
    <div class="wrapper__right">
        <div class="grid">
            @foreach ($categories as $category)
            <div class="grid__item">
                <div class="grid__content">
                    <p class="grid__text">{{ $category->title }}</p>
                    <p class="grid__text">{{ $category->description }}</p>
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
