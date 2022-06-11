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
                                            <h5 class="m-b-10">Pembayaran</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/payments"><i class="feather icon-users"></i></a></li>
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
                                                <h5>Tabel Data Pembayaran</h5>
                                                @if (session('user_roles') == 'Admin')
                                                    <a href="/payments" class="btn btn-light text-dark">&larr; Kembali</a>    
                                                @endif
                                            </div>
                                            {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID Pasien</th>
                                                            <th>Nama</th>
                                                            <th>Total Pembayaran</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($payments as $payment)                                                            
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $payment->patient_id != null ? $payment->patient_id : 'Tidak Ditemukan' }}</td>
                                                            <td>{{ App\Models\Patient::where('id', $payment->patient_id)->first() != null ? App\Models\Patient::where('id', $payment->patient_id)->first()->name : 'Pasien Dihapus' }}</td>
                                                            <td>Rp. {{ number_format($payment->total, 2) }}</td>
                                                            <td>
                                                                @if($payment->status == 0)
                                                                    <span class="badge badge-pill badge-warning">Belum Bayar</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-success">Sudah Bayar</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $payment->created_at }}</td>
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
    @if (session('add_payments_success'))
    <script>
        Swal.fire(
        'Berhasil!',
        '<?= session('add_payments_success'); ?>',
        'success'
        )
    </script>
    @endif

    @if (session('edit_payments_success'))
    <script>
        Swal.fire(
        'Berhasil!',
        '<?= session('edit_payments_success'); ?>',
        'success'
        )
    </script>
    @endif

    <script>
        const updatePaymentStatus = (id) => {
            $.ajax({
                url: '/payments/update/' + id,
                type: 'GET',
                beforeSend: function() {
                    Swal.showLoading()
                },
                success: function() {
                    Swal.close();
                    location.reload();
                },
                error: function() {
                    Swal.close();
                    location.reload();
                }
            })
        } 
    </script>
@endsection
