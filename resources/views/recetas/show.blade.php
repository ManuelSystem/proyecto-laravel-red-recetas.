@extends('layouts.app')

@section('content')

<article class="contenido-receta">
    <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
    <div class="imagen-receta">
        <img src="/storage/{{$receta->imagen}}" alt="imagen de la receta" class="w-100">
    </div>
    <div class="receta-meta mt-2">
        <p>
            <span class="font-weight-bold text-primary">Escrito en:</span>
            {{$receta->categoria->nombre}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            {{--TODO: mostrar el usuario--}}
            {{$receta->user_id}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            {{--TODO: mostrar la fecha--}}
            {{$receta->created_at}}
        </p>
        <div class="ingredientes">
            <h2 class="my-3 text-primary">Ingredientes</h2>
            {{--de esta manera se elimina el codigo html con el que se guarda en la base de datos y se muestra solo la info--}}
            {!! $receta->ingredientes !!}
        </div>
        <div class="preparacion">
            <h2 class="my-3 text-primary">Preparación</h2>
            {{--de esta manera se elimina el codigo html con el que se guarda en la base de datos y se muestra solo la info--}}
            {!! $receta->preparacion !!}
        </div>
    </div>

</article>
@endsection