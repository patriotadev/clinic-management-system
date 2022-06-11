<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    //
    public function index()
    {
        $data  = [
            'medicines' => Medicine::all()
        ];

        return view('medicines.index', $data);
    }

    public function getAddMedicinePage()
    {
        return view('medicines.add');
    }

    public function postAddMedicineForm(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required'
            ],
            [
                'name.required' => 'Nama obat tidak boleh kosong.',
                'price.required' => 'Harga obat tidak boleh kosong.',
            ]
        );

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'created_by' => session('user_name')
        ];

        Medicine::create($data);
        $request->session()->flash('add_medicine_success', 'Obat baru berhasil ditambahkan.');
        return redirect('/medicines');
    }

    public function getEditMedicinePage($id)
    {
        $data = [
            'medicine' => Medicine::where('id', $id)->first()
        ];

        return view('medicines.edit', $data);
    }

    public function postEditMedicineForm($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required'
            ],
            [
                'name.required' => 'Nama obat tidak boleh kosong.',
                'price.required' => 'Harga obat tidak boleh kosong.',
            ]
        );

        $data = [
            'name' => $request->name,
            'price' => $request->price
        ];

        Medicine::where('id', $id)->update($data);
        $request->session()->flash('edit_medicine_success', 'Data obat berhasil diubah.');
        return redirect('/medicines');
    }

    public function postDeleteMedicineForm($id)
    {
        Medicine::where('id', $id)->delete();
    }
}
