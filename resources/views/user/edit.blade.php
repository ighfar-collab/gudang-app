@extends('layouts.admin.main')

@section('content')
<div class="section-header">
<div class="container">
    
                <form action="{{ route('user.resetPassword', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               required>
                    </div>

                    <div class="text-right">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            Batal
                        </a>
                        <button class="btn btn-danger">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection