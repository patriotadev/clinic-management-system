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
                                            <h5 class="m-b-10">Data Pasien</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/patients/registration"><i class="feather icon-users"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/patients/registration/edit/{{ $patient->id }}">Ubah</a></li>
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
                                        <form action="/patients/registration/edit/{{ $patient->id }}" method="post">
                                        @csrf
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h5>Form Ubah Pasien</h5>
                                            </div>
                                            {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Nama</label>
                                                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Nama pasien" value="{{ $patient->name }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="gender" class="@error('gender') is-invalid @enderror form-control" >
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Laki-Laki" {{ $patient->gender == 'Laki-Laki' ? 'selected' : ''}} >Laki-Laki</option>
                                                            <option value="Perempuan" {{ $patient->gender == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                                        </select>
                                                        @error('gender')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <label>Umur</label>
                                                        <input type="number" class="@error('age') is-invalid @enderror form-control" name="age" placeholder="Umur pasien" value="{{ $patient->age }}">
                                                        @error('age')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <label>No. Telp</label>
                                                        <input type="text" class="@error('phone') is-invalid @enderror form-control" name="phone" placeholder="Nomor telepon pasien" value="{{ $patient->phone }}">
                                                        @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label>Alamat</label>
                                                        <input type="text" class="@error('address') is-invalid @enderror form-control" name="address" placeholder="Alamat pasien" value="{{ $patient->address }}">
                                                        @error('address')
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
