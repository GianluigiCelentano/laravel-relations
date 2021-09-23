{{-- CREA POST --}}
@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('article.store')}}" method="POST">
        @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    </div>
    <div class="form-group">
        <label for="text">Text</label>
        <input type="text" name="text" id="text">
    </div>
    <div class="form-group">
        <label for="author_id">Author</label>
        <input type="text" name="author_id" id="author_id">
    </div>
    <div class="form-group">
        <label for="cover">Cover</label>
        <input type="text" name="cover" id="cover">
    </div>
    <div class="form-group">
        <input class="btn btn-success" type="submit" value="Aggiungi">
    </div>
    </form>
</div>
@endsection