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
                                            <h5 class="m-b-10">Pendaftaran</h5>
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
                                                <h5>Tabel Pendaftaran Pasien</h5>
                                                    <a href="/patients/registration" class="btn btn-light text-dark">&larr; Kembali</a>
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
@endsection

@section('js')
    @if (session('add_patient_success'))
    <script>
        Swal.fire(
        'Berhasil!',
        '<?= session('add_patient_success'); ?>',
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
        const openDeleteAlert = (id) => {
        patient_id = id
        Swal.fire({
            title: 'Hapus data pasien?',
            text: "Data pasien akan terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
              url:'/patients/registration/delete/' + patient_id,
              type: 'GET',
              success: function() {
                  Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data pasien berhasil dihapus!',
                        icon: 'success',
                      }).then(function() {
                    location.reload();
                  });
                },
                error: function() {
                  Swal.fire({
                        title: 'Gagal!',
                        text: 'Data pasien gagal dihapus!',
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
