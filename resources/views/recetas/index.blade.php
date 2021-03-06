@extends('layouts.app')

@section('botones')
@include('ui.navegacion')<!--se incluye los botones de administrador que se encuentran en navegacion.blade-->
@endsection
@section('content')
<h2 class="text-center mb-5">Administra tus Recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Título</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--con este for recorro el arreglo de la variable $recetas del Recetacontroller, que es lo que
            le estoy cargando a la vista desde el controller.-->
            @foreach ($recetas as $receta)
            <tr>
                <td>{{$receta->titulo}}</td>
                <td>{{$receta->categoria->nombre}}</td>
                <td>
                    <eliminar-receta
                    receta-id="{{$receta->id}}">
                    </eliminar-receta>
                    <a href="{{route('recetas.edit', ['receta' =>$receta->id])}}" class="btn btn-dark d-block mb-2">Editar</a>
                    <a href="{{route('recetas.show', ['receta' =>$receta->id])}}" class="btn btn-success d-block">Ver</a>
                <!--para visualizar se le pasa el alias de la ruta del controlador, junto con el el metodo de receta, el cual contiene el id de la receta
                -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12 justify-content-center d-flex">
        {{$recetas->links()}}<!--con esto automaticamente laravel me genera la paginación de acuerdo a la cantidad de
            registros que me va a mostrar por pagina, que se le determina en el index de recetacontroller-->
    </div>
    <h2 class="text-center my-5">Recetas que te Gustan</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        @if (count($usuario->meGusta) > 0)


        <ul class="list-group">
            @foreach ($usuario->meGusta as $receta)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p> {{$receta->titulo}}</p>
                    <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-outline-success">Ver</a>
                </li>
            @endforeach
        </ul>
        @else
        <P class="text-center">Aún no te gusta ninguna receta... <br>Empieza a marcar las recetas que te gustan y se te
            mostrarán aquí! </P>
        @endif
    </div>
</div>
@endsection

