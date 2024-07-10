<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard de Projetos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        
        <script>
            new WOW().init();
        </script>
    </head>
    <body>
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2 wow animate__animated animate__fadeInDown"><i class="fas fa-tachometer-alt"></i> Dashboard de Projetos</h1>
                <button type="button" class="btn btn-primary wow animate__animated animate__pulse" data-wow-iteration="infinite" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                    <i class="fas fa-plus"></i> Novo Projeto
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-3 wow animate__animated animate__fadeInUp">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-layer-group"></i> Total de Projetos</h5>
                            <p class="card-text display-4">{{ $totalProjects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-spinner"></i> Em Andamento</h5>
                            <p class="card-text display-4">{{ $inProgressProjects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-check-circle"></i> Concluídos</h5>
                            <p class="card-text display-4">{{ $completedProjects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Atrasados</h5>
                            <p class="card-text display-4">{{ $overdueProjects }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title mb-4 wow animate__animated animate__fadeInLeft"><i class="fas fa-clock"></i> Projetos Recentes</h2>
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-md-4 mb-3 wow animate__animated animate__zoomIn">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $project->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <span class="badge 
                                                @if($project->status === 'Concluído') bg-success 
                                                @elseif($project->status === 'Em Andamento') bg-warning 
                                                @else bg-danger 
                                                @endif" value="{{ $project->status ?? '' }}">
                                                {{ $project->status ?? '' }}
                                            </span>
                                        </h6>
                                        <p class="card-text">Progresso:</p>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: {!! $project->progress !!}%; " aria-valuenow="{!! $project->progress !!}" aria-valuemin="0" aria-valuemax="100">{!! $project->progress !!}%</div>
                                        </div>
                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Ver</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Modal para criar novo projeto -->
            <div class="modal fade wow animate__animated animate__zoomIn" id="newProjectModal" tabindex="-1" aria-labelledby="newProjectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="newProjectModalLabel"><i class="fas fa-plus"></i> Novo Projeto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome do Projeto:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrição:</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Prazo:</label>
                                    <input type="date" class="form-control" id="deadline" name="deadline">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Criar Projeto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            new WOW().init();
        </script>
    </body>
</x-app-layout>
