@extends('layout.base')


@section('content') 
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Data Pengguna</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/users"><i class="feather icon-users"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/users/edit/{{ $user->id }}">Ubah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <form action="/users/edit/{{ $user->id }}" method="post">
                                        @csrf
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h5>Form Ubah Pengguna</h5>
                                            </div>
                                            {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Nama</label>
                                                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Nama pengguna" value="{{ $user->name }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <label>Sebagai</label>
                                                        <select name="roles" class="@error('roles') is-invalid @enderror form-control" >
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Admin" {{ $user->roles == 'Admin' ? 'selected' : ''}} >Admin</option>
                                                            <option value="Dokter" {{ $user->roles == 'Dokter' ? 'selected' : ''}}>Dokter</option>
                                                            <option value="Petugas" {{ $user->roles == 'Petugas' ? 'selected' : ''}}>Petugas</option>
                                                            <option value="Kasir" {{ $user->roles == 'Kasir' ? 'selected' : ''}}>Kasir</option>
                                                        </select>
                                                        @error('roles')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <label>Username</label>
                                                        <input type="text" class="@error('username') is-invalid @enderror form-control" name="username" placeholder="Username pengguna" value="{{ $user->username }}">
                                                        @error('username')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <label>Password</label>
                                                        <input type="password" class="@error('password') is-invalid @enderror form-control" name="password" placeholder="Password pengguna" value="{{ $user->plain_password }}">
                                                        @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
@endsection
