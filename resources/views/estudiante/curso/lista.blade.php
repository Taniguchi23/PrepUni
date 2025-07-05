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
                                <h5 class="card-title">{{ $curso->nombre }}</h5>
                                <p class="card-text">{{ $curso->descripcion }}</p>
                            </div>

                            <!-- Footer con botones alineados horizontalmente -->
                            <div class="card-footer bg-transparent border-0 d-flex justify-content-between gap-2">
                                <a href="{{ route('estudiante.cursos.ver', ['id' => $curso->id]) }}" class="btn btn-outline-primary btn-sm">
                                    Ver Curso
                                </a>

                                <a href="{{ route('estudiante.examen.crear', ['id' => $curso->id]) }}" class="btn btn-outline-success btn-sm">
                                    Tomar Examen
                                </a>

                                <button onclick="predecirNota({{ $curso->id }})" class="btn btn-outline-info btn-sm">
                                    Predecir
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach
                <!-- Card 1 -->


            </div>
        </div>

    </div>

    </div>

    <div id="modal-container"></div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>\
    <script>
        function predecirNota(cursoId) {
            fetch(`/service/prediccion/nota?curso_id=${cursoId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    const modalHtml = `
                            <div class="modal fade" id="predModal" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog"><div class="modal-content">
                                <div class="modal-header"><h5 class="modal-title">Predicción</h5></div>
                                <div class="modal-body">
                                  <p>Nota predicha: <strong>${data.prediccion}</strong></p>
                                  <p>${data.mensaje}</p>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                              </div></div>
                            </div>`;
                    document.getElementById('modal-container').innerHTML = modalHtml;
                    const modal = new bootstrap.Modal(document.getElementById('predModal'));
                    modal.show();
                })
                .catch(err => {
                    console.error(err);
                    alert("Ocurrió un error al predecir.");
                });
        }
    </script>
@endsection
