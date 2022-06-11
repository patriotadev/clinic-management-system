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
                                                <h5>Tabel Rekam Medis</h5>
                                                <a href="/records" class="btn btn-light text-dark">&larr; Kembali</a>
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
                                                            <th>Diagnosis</th>
                                                            <th>Keterangan</th>
                                                            <th>Obat</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($records as $record)                                                            
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ App\Models\Patient::where('id', $record->patient_id)->first() != null ? App\Models\Patient::where('id', $record->patient_id)->first()->name : 'Pasien Dihapus' }}</td>
                                                            <td>{{ $record->diagnosis }}</td>
                                                            <td>{{ $record->description }}</td>
                                                            <td>{{ $record->medicines_name }}</td>
                                                            <td>{{ $record->created_at }}</td>
                                                            <td>
                                                                {{-- <button onclick="patientIdValue(`{{ $record->id }}`)" type="button" class="badge badge-primary border-0" data-toggle="modal" data-target="#form-edit">Ubah</button> --}}
                                                                <button onclick="deleteRecordAlert({{ $record->id }})" type="button" class="badge badge-danger border-0">Hapus</button>
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
{{-- @include('records.modal') --}}
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
    $(document).ready(function() {
        $('.select-medicine').select2();
    });

    const deleteRecordAlert = (id) => {
        record_id = id
        Swal.fire({
            title: 'Hapus data rekam medis?',
            text: "Data rekam medis akan terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
              url:'/records/views/delete/' + record_id,
              type: 'GET',
              success: function() {
                  Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data rekam medis berhasil dihapus!',
                        icon: 'success',
                      }).then(function() {
                    location.reload();
                  });
                },
                error: function() {
                  Swal.fire({
                        title: 'Gagal!',
                        text: 'Data rekam medis gagal dihapus!',
                        icon: 'danger',
                      }).then(function() {
                    location.reload();
                  });
                }
              })
            }
        })
    }
</script>

@endsection
