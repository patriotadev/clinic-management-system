<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Record;
use App\Models\RecordMedicine;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    //
    public function index()
    {
        $currentDate = date('Y-m-d');

        $data = [
            'patients' => Patient::where('created_at', '>=', $currentDate)->get(),
            'medicines' => Medicine::all(),
        ];

        return view('records.index', $data);
    }

    public function postAddRecordForm(Request $request)
    {
        $data = [
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'description' => isset($request->description) ? $request->description : null,
            'medicines_name' => implode(', ', $request->medicines_name),
            'created_by' => session('user_name')
        ];

        $total = 0;
        $medicines = $request->medicines_name;
        $quantity = $request->qty;
        for ($i = 0; $i < count($medicines); $i++) {
            $price = Medicine::where('name', $medicines[$i])->first()->price;
            $total = $total + ($price * $quantity[$i]);
        }

        Record::create($data);
        Payment::create([
            'patient_id' => $request->patient_id,
            'total' => $total
        ]);
        $request->session()->flash('add_record_success', 'Data rekam medis berhasil ditambahkan.');
        return redirect('/records');
    }

    public function getRecordViewPage()
    {
        $data = [
            'records' => Record::orderBy('created_at', 'DESC')->get()
        ];

        return view('records.view', $data);
    }

    public function getPatientRecordDetailPage($patient_id)
    {
        $data = [
            'records' => Record::where('patient_id', $patient_id)->get()
        ];

        return view('records.record_detail', $data);
    }

    public function postDeletePatientRecord($id)
    {
        Record::where('id', $id)->delete();
    }
}
