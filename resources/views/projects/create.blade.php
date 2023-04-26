{{-- Layout --}}
@extends("layouts.app")
{{-- Content --}}
@section('content')
    {{-- Container --}}
    <div class="container">
        {{-- Titolo --}}
        <h1 class="mt-5">
            Create
        </h1>
        {{-- Form --}}
        <form class="row g-3 pt-3" action="{{ route("projects.store") }}" method="POST">
            {{-- Cross-Site Request Forgery --}}
            @csrf
            {{-- Titolo --}}
            <div class="col-12">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error("title") is-invalid @enderror" name="title" value="{{ old("title") }}">
                {{-- Errore --}}
                @error("title")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Cliente --}}
            <div class="col-12">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" class="form-control @error("client") is-invalid @enderror" name="client" value="{{ old("client") }}">
                {{-- Errore --}}
                @error("client")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Tipo --}}
            <div class="col-12">
                <label for="type_id" class="form-label">Tipo</label>
                <select name="type_id" class="form-select @error("category_id") is-invalid @enderror" aria-label="Default select example">
                    <option selected>- Seleziona il tipo di progetto -</option>
                    @foreach ($types as $type)
                        <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                {{-- Errore --}}
                @error("type_id")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Descrizione --}}
            <div class="col-12">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error("description") is-invalid @enderror" id="floatingTextarea" name="description">{{ old("description") }}</textarea>
                {{-- Errore --}}
                @error("description")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Invia --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crea</button>
            </div>
        </form>
    </div>
@endsection