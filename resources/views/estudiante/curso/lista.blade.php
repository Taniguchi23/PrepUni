@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection
@section('content')

    <div class="panel">
        <div class="container my-5">
            <h2 class="mb-4 text-center">📚 Lista de cursos</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($cursos as $curso)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{$curso->nombre}}</h5>
                                <p class="card-text">{{$curso->descripcion}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-end">
                                <a href="{{route('estudiante.cursos.ver',['id' => $curso->id])}}" class="btn btn-primary">Ver Curso</a>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-end">
                                <a href="{{route('estudiante.examen.crear',['id' => $curso->id])}}" class="btn btn-primary">Tomar Examen</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Card 1 -->


            </div>
        </div>

    </div>

    </div>
@endsection
@section('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
