@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">📝 Revisión del Examen</h4>
            </div>
            <div class="card-body">
                @foreach ($respuestasUsuario as $index => $item)
                    <div class="mb-4 pb-3 border-bottom">
                        <p class="fw-semibold">Pregunta {{ $index + 1 }}: {{ $item->pregunta->texto }}</p>

                        @foreach ($item->pregunta->respuestas as $opcion)
                            <div class="form-check mb-2 p-3 rounded
                            {{ $opcion->id === $item->respuesta_id && !$opcion->es_correcta ? 'border border-danger bg-light' : '' }}
                            {{ $opcion->es_correcta ? 'border border-success bg-light' : 'border' }}">

                                <input class="form-check-input" type="radio" disabled
                                    {{ $opcion->id === $item->respuesta_id ? 'checked' : '' }}>

                                <label class="form-check-label ms-2">
                                    {{ $opcion->texto }}

                                    @if ($opcion->es_correcta)
                                        <span class="badge bg-success ms-2">✔ Correcta</span>
                                    @endif

                                    @if ($opcion->id === $item->respuesta_id && !$opcion->es_correcta)
                                        <span class="badge bg-danger ms-2">✘ Tu respuesta</span>
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
