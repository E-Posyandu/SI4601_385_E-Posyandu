@extends('admin-side.layout-admin.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: auto;">
    <h1 class="mb-4">Verifikasi Akun</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('verifikasi-akun.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    <form method="POST" action="{{ route('verifikasi-akun.saveStatus') }}">
        @csrf
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status Saat Ini</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="@if($user->status == 'approved') table-success 
                                @elseif($user->status == 'rejected') table-danger 
                                @elseif($user->status == 'waiting') table-warning @endif">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            @if($user->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($user->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning text-dark">Waiting</span>
                            @endif
                        </td>
                        <td>
                            <select name="status[{{ $user->id }}]" class="form-select">
                                <option value="waiting" {{ $user->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="approved" {{ $user->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $user->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada akun yang mendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($users->count())
            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        @endif
    </form>
</div>
@endsection
