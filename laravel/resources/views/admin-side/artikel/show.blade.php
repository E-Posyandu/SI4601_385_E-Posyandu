@extends('admin-side.layout-admin.app')

@section('content')
<div class="container py-4" style="max-width: 1200px; margin-left: 20px; margin-right: 20px; background-color: #e9edf8; min-height: 100vh;">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <h4 class="mb-4 fw-bold">Detail Artikel</h4>

            <div class="mb-4">
                <h2 class="fw-bold">{{ $artikel->judul }}</h2>
                <p class="text-muted mb-2">
                    {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }} • {{ $artikel->author }}
                </p>
            </div>

            <hr class="my-4">

            <div class="mt-4">
                {!! $artikel->isi !!}
            </div>

            <div class="mt-5">
                <a href="{{ route('artikel.index') }}" class="btn btn-primary rounded-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

