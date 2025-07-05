@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">📋  Mis Exámenes : {{$curso->nombre}}</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($examenes as $index => $examen)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ \App\Helpers\Util::fecha($examen->created_at)  }}</td>
                        <td class="text-center">{!!  \App\Helpers\Util::colorNota($examen->nota) !!}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                <a href="{{ route('estudiante.cursos.examen.ver', ['id' => $examen->id]) }}"
                                   class="btn btn-outline-primary btn-sm" title="Ver detalles del examen">
                                    <i class="fas fa-eye me-1"></i> Ver
                                </a>

                                <form action="{{ route('estudiante.cursos.examen.exportar', ['id' => $examen->id]) }}"
                                      method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm" title="Exportar examen">
                                        <i class="fas fa-file-word me-1"></i> Exportar
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
