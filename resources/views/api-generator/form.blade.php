@extends('layouts.app')

@section('content')
<div class="container">
    <h3>JSON API'den Laravel Dosyaları Oluştur</h3>
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <form method="POST" action="{{ route('api.generate') }}">
        @csrf
        <div class="mb-3">
            <label>JSON API URL</label>
            <input type="url" name="url" class="form-control" placeholder="https://..." required>
        </div>
        <div class="mb-3">
            <label>Tablo adı</label>
            <input type="text" name="table" class="form-control" placeholder="fortune_tellers" required>
        </div>
        <button type="submit" class="btn btn-primary">Tümünü Oluştur</button>
    </form>
</div>
@endsection
