@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">📝 Examen del curso: {{ $curso->nombre }}</h4>
        <form action="{{ route('estudiante.examen.guardar',['id' => $curso->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
            @foreach($preguntas as $index => $pregunta)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $index + 1 }}. {{ $pregunta->texto }}
                    </div>
                    <div class="card-body">
                        @foreach($pregunta->respuestas as $respuesta)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="respuestas[{{ $pregunta->id }}]" value="{{ $respuesta->id }}" required>
                                <label class="form-check-label">{{ $respuesta->texto }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="text-center">
                <button type="submit" class="btn btn-success">Guardar Examen</button>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
