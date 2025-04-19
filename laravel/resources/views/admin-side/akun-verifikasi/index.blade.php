@extends('admin-side.layout-admin.app')

@section('content')
<div class="container mt-4">
    <h2>Akun Verifikasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('verifikasi-akun.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Cari</button>
        </div>
    </form>

    <form method="POST" action="{{ route('verifikasi-akun.saveStatus') }}">
        @csrf

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <select name="status[{{ $user->id }}]" class="form-select 
                                @if($user->status == 'approved') text-success
                                @elseif($user->status == 'rejected') text-danger
                                @endif
                            ">
                                <option value="waiting" {{ $user->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="approved" {{ $user->status == 'approved' ? 'selected' : '' }}>Approval</option>
                                <option value="rejected" {{ $user->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada akun yang mendaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->count())
        <button type="submit" class="btn btn-primary mt-3">Save</button>
        @endif
    </form>
</div>
@endsection
