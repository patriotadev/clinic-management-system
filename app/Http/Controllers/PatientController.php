<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //

    public function index()
    {
        $currentDate = date('Y-m-d');
        $data = [
            'patients' => Patient::where('created_at', '>=', $currentDate)->orderBy('created_at', 'DESC')->get(),
        ];

        return view('patients.index', $data);
    }

    public function getViewAllPatientPage()
    {
        $data = [
            'patients' => Patient::orderBy('created_at', 'DESC')->get()
        ];

        return view('patients.view_all', $data);
    }

    public function getAddPatientPage()
    {
        return view('patients.add');
    }

    public function postAddPatientForm(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required'
            ],
            [
                'name.required' => 'Nama pasien tidak boleh kosong.',
                'gender.required' => 'Jenis kelamin pasien tidak boleh kosong.',
                'age.required' => 'Umur pasien tidak boleh kosong.',
                'phone.required' => 'Nomor telepon pasien tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon pasien harus numerik.',
                'address.required' => 'Alamat pasien tidak boleh kosong'
            ]
        );

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_by' => session('user_name')
        ];

        Patient::create($data);
        $request->session()->flash('add_patient_success', 'Pasien berhasil ditambahkan.');
        return redirect('/patients/registration');
    }

    public function getEditPatientPage($id)
    {
        $data = [
            'patient' => Patient::where('id', $id)->first(),
        ];

        return view('patients.edit', $data);
    }

    public function postEditPatientForm($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required'
            ],
            [
                'name.required' => 'Nama pasien tidak boleh kosong.',
                'gender.required' => 'Jenis kelamin pasien tidak boleh kosong.',
                'age.required' => 'Umur pasien tidak boleh kosong.',
                'phone.required' => 'Nomor telepon pasien tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon pasien harus numerik.',
                'address.required' => 'Alamat pasien tidak boleh kosong'
            ]
        );

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address
        ];

        Patient::where('id', $id)->update($data);
        $request->session()->flash('edit_patient_success', 'Data pasien berhasil diubah.');
        return redirect('/patients/registration');
    }

    public function postDeletePatientForm($id)
    {
        Patient::where('id', $id)->delete();
    }
}
