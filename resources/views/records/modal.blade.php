  <!-- Modal -->
<div class="modal fade" id="form-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Rekam Medis</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/records/add" method="POST">
        <div class="modal-body">
                @csrf
                <div class="row" id="diagnosis-row">
                    <input type="hidden" id="patient_id" name="patient_id" value="">
                    <div class="col">
                        <label>Diagnosis</label>
                        <input type="text" class="form-control" name="diagnosis" required>
                        <div class="d-flex justify-content-end mt-2 description-btn">
                            <button onclick="addDescriptionRow(this)" class="text-success rounded border-0">+ Keterangan</button>
                        </div>
                    </div>
                </div>
                <div id="medicine-row" class="row mt-3">
                    <div class="col-md-7">
                        <label>Obat</label>
                        <select name="medicines_name[]" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->name }}">{{ $medicine->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" min="0" name="qty[]" placeholder="Jumlah obat" required>
                        <div class="d-flex justify-content-end mt-2">
                            <button onclick="addMedicineRow()" class="text-success rounded border-0">+ Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script>
        const addMedicineRow = () => {
            const row = `<div id="medicine-row" class="row select-medicine-row">
                            <div class="col-md-7">
                                <label>Obat</label>
                                <select name="medicines_name[]" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->name }}">{{ $medicine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" min="0" name="qty[]" placeholder="Jumlah obat" required>
                                <div class="d-flex justify-content-end mt-2">
                                    <button onclick="deleteMedicineRow(this)" class="text-danger rounded border-0">- Hapus</button>
                                </div>
                            </div>
                        </div>`;

            $('#medicine-row:last').after(row);
        };

        const deleteMedicineRow = (e) => {
            let element = e;
            $(element).parents('.select-medicine-row').remove();
        };

        const addDescriptionRow = (e) => {
            let element = e;
            const row = `<div class="row" id="description-row">
                            <div class="col">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>`;
            
            const deleteDescription = `<button onclick="deleteDescriptionRow(this)" class="text-danger rounded border-0">- Keterangan</button>`;
            $('#diagnosis-row').after(row);
            $(element).remove()
            $('.description-btn').html(deleteDescription);
        }

        const deleteDescriptionRow = (e) => {
            let element = e;
            $('#description-row').remove();
            const addDescription = `<button onclick="addDescriptionRow(this)" class="text-success rounded border-0">+ Keterangan</button>`;
            $('.description-btn').html(addDescription);
        }
    </script>