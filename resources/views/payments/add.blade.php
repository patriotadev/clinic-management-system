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
                                            <h5 class="m-b-10">Data Pembayaran</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/payments"><i class="feather icon-users"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/payments/add">Tambah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row mb-3 d-flex justify-content-end">
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <form action="/payments/add" method="post">
                                        @csrf
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex justify-content-between">
                                                        <h5>Form Tambah Pembayaran</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <select name="patient_id" class="form-control">
                                                            <option value="">-- Pasien --</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" type="button"><i class="feather icon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="container">
                                                <div class="row d-flex justify-content-center">
                                                    
                                                    {{-- <div class="col">
                                                        <label>Sebagai</label>
                                                        <select name="roles" class="@error('roles') is-invalid @enderror form-control" >
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Admin" {{ old('roles') == 'Admin' ? 'selected' : ''}} >Admin</option>
                                                            <option value="Dokter" {{ old('roles') == 'Dokter' ? 'selected' : ''}}>Dokter</option>
                                                            <option value="Petugas" {{ old('roles') == 'Petugas' ? 'selected' : ''}}>Petugas</option>
                                                            <option value="Kasir" {{ old('roles') == 'Kasir' ? 'selected' : ''}}>Kasir</option>
                                                        </select>
                                                        @error('roles')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div> --}}
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <label>Nama Pasien</label>
                                                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Nama pengguna" value="{{ old('name') }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <label>Password</label>
                                                        <input type="password" class="@error('password') is-invalid @enderror form-control" name="password" placeholder="Password pengguna" value="{{ old('password') }}">
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
