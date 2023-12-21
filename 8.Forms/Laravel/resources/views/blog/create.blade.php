@extends('base')

@section('title', 'Créer un Article ')

@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="Article 1">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div>
            <textarea name="content">Content de Article</textarea>
            @error('content')
                {{$message}}
            @enderror
        </div>
        <button>Enregistrer</button>
    </form>
@endsection