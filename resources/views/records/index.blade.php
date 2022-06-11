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
                                            <h5 class="m-b-10">Rekam Medis</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/"><i class="feather icon-users"></i></a></li>
                                            <li class="breadcrumb-item"><a href=""></a></li>
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
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h5>Tabel Data Pasien</h5>
                                                <a href="/records/views" class="btn btn-success text-light">Lihat Semua</a>
                                            </div>
                                            {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Umur</th>
                                                            <th>Alamat</th>
                                                            <th>No. Telp</th>
                                                            <th>Tanggal</th>
                                                            <th>Rekam Medis</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patients as $patient)                                                            
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $patient->name }}</td>
                                                            <td>{{ $patient->gender }}</td>
                                                            <td>{{ $patient->age }} Tahun</td>
                                                            <td>{{ $patient->address }}</td>
                                                            <td>{{ $patient->phone }}</td>
                                                            <td>{{ $patient->created_at }}</td>
                                                            <td>
                                                                <button onclick="patientIdValue({{ $patient->id }})" type="button" class="badge badge-primary border-0" data-toggle="modal" data-target="#form-add">Tambah</button>
                                                                @if (App\Models\Record::where('patient_id', $patient->id)->count() > 0)
                                                                    <a href="/records/views/{{ $patient->id }}" class="badge badge-info" >Lihat</a>    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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

<!-- [ Modal ]-->
@include('records.modal')
@endsection


@section('js')

@if (session('add_record_success'))
<script>
    Swal.fire(
    'Berhasil!',
    '<?= session('add_record_success'); ?>',
    'success'
    )
</script>
@endif

@if (session('edit_patient_success'))
<script>
    Swal.fire(
    'Berhasil!',
    '<?= session('edit_patient_success'); ?>',
    'success'
    )
</script>
@endif

<script>
    const patientIdValue = (id) => {
        $('#patient_id').val(id);
    }
</script>

@endsection
