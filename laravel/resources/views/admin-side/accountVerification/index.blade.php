@extends('admin-side.layout-admin.app')

@section('content')
<div class="container py-4" style="max-width: 1200px; background-color: #e9edf8; min-height: 100vh;">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <h4 class="mb-4 fw-bold">Verifikasi Akun</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td class="fw-semibold d-flex align-items-center">
                                <img src="{{ asset('path/to/default-avatar.png') }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>
                                @if($user->is_verified)
                                    <span class="badge bg-success-subtle text-success fw-medium rounded-pill px-3 py-2">Disetujui</span>
                                @else
                                    <span class="badge bg-warning-subtle text-warning fw-medium rounded-pill px-3 py-2">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                @if(!$user->is_verified)
                                    <form action="{{ route('akun-verifikasi.approve', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success btn-sm rounded-3">Setujui</button>
                                    </form>
                                @endif
                                <form action="{{ route('akun-verifikasi.reject', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger btn-sm rounded-3">Tolak</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($users->isEmpty())
                    <p class="text-center text-muted py-4">Belum ada akun yang mendaftar.</p>
                @endif
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary rounded-3 mt-4">Kembali</a>
        </div>
    </div>
</div>
@endsection
