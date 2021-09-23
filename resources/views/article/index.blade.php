<!-- HOME -->
@extends('layouts.app')
@section('content')
<div class="container container-article text-center shadow">
    @foreach ($allArticles as $article)
        <h5>Titolo</h5> {{$article->title}}</br>
        <h5>Articolo</h5> {{$article->text}}</br>
        <span class="resize">Autore:</span> {{$article->author['name']}} {{$article->author['surname']}}</br>
        <span class="resize">Email:</span> {{$article->author['email']}}</br>
        <a href="/article/{{$article->id}}"><img class="photo" src="{{$article->cover}}" alt=""></a></br> 
        
            <div class="modal-container">
                
                <a href="{{route('article.edit', $article)}}"><h5><button type="button" class="btn btn-primary">Modifica articolo</button></h5></a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$article->id}}">
                Elimina articolo
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Elimina articolo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare questo articolo?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                <form action="{{route('article.destroy', $article)}}" method="POST">
                                    @csrf
                                    @method('DELETE') 
                                    <input class="btn btn-primary" type="submit" value="Elimina">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
    @endforeach
</div>
@endsection