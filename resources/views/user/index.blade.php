@extends('layouts.admin.main')

@section('content')
<div class="section-header">
<div class="container">
    <h3>Daftar User</h3>
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
<p><br>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Data</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                  <th>Role</th>

                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
              <td>@if($u->hasRole('admin'))
    <span class="badge badge-success">Admin</span>
@elseif($u->hasRole('mitra'))
    <span class="badge badge-warning">Mitra</span>
@elseif($u->hasRole('driver'))
    <span class="badge badge-info">Driver</span>
@else
    <span class="badge badge-danger">Super Admin</span>
@endif

<form action="{{ route('user.updateRole', $u->id) }}" method="POST">
    @csrf
    <select name="role" required>
        <option value="super-admin">Superdmin</option>
        <option value="kasir">Kasir</option>

    </select>
    <button class="btn btn-warning btn-sm">Ubah Role</button>
</form></td>
                <td style="width: 350px;">
                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                           <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
</form>
                         
                             
        

   <a href="{{ route('user.reset', $u->id) }}" class="btn btn-warning btn-sm">Reset Password</a>
<br>
<br>
<br>
<br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
</div>
@endsection
