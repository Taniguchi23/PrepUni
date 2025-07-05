<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Examen PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .pregunta { margin-bottom: 20px; }
        .correcta { color: green; font-weight: bold; }
        .incorrecta { color: red; }
    </style>
</head>
<body>
<h2>Examen del curso: {{ $examen->curso->nombre }}</h2>
<p>Fecha: {{ $examen->created_at->format('d/m/Y') }}</p>
<p>Nota: {{ $examen->nota }}</p>

@foreach ($examen->usuarioRespuestas as $item)
    <div class="pregunta">
        <strong>Pregunta:</strong> {{ $item->pregunta->texto }}
        <ul>
            @foreach ($item->pregunta->respuestas as $respuesta)
                <li class="{{ $respuesta->es_correcta ? 'correcta' : ($respuesta->id == $item->respuesta_id ? 'incorrecta' : '') }}">
                    {{ $respuesta->texto }}
                    @if($respuesta->es_correcta)
                        (Correcta)
                    @elseif($respuesta->id == $item->respuesta_id)
                        (Tu respuesta)
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endforeach
</body>
</html>
