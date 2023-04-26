{{-- Layout --}}
@extends("layouts.app")
{{-- Content --}}
@section('content')
    {{-- Container --}}
    <div class="container">
        {{-- Carta --}}
        <div class="card mt-5">
            <div class="card-header">
                Progetto
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text">Cliente: {{ $project->client }}</p>
                <p class="card-text">Tipo: {{ $project->type->name }}</p>
                <p class="card-text">Descrizione: {{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection