@extends('admin-side.layout-admin.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Upload Report Perkembangan</h2>

            <form action="{{ route('report-perkembangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="id_balita" class="form-label">Nama Balita</label>
                    <select name="id_balita" id="id_balita" class="form-select" required>
                        <option selected disabled>Pilih balita</option>
                        @foreach($balita as $baby)
                            <option value="{{ $baby->id_balita }}">{{ $baby->nama_balita }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Report</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Upload File</label>
                    <input type="file" name="file" id="file" accept=".pdf,.doc,.docx" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
