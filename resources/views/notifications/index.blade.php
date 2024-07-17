@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notificações</div>

                <div class="card-body">
                    @if ($notifications->isEmpty())
                        <p>Nenhuma notificação pendente.</p>
                    @else
                        @foreach ($notifications as $notification)
                            <div class="notification mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p><strong>Projeto:</strong> {{ $notification->project->name }}</p>
                                        <p><strong>Status:</strong> 
                                            @if ($notification->status == 'pending')
                                                Pendente
                                            @elseif ($notification->status == 'accepted')
                                                Aceito
                                            @elseif ($notification->status == 'rejected')
                                                Rejeitado
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <form action="{{ route('notifications.accept', $notification->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Aceitar</button>
                                        </form>
                                        <form action="{{ route('notifications.reject', $notification->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Rejeitar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
