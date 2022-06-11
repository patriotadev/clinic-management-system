<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Record;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $currentDate = date('Y-m-d');
        $data = [
            'payments' => Payment::where('created_at', '>=', $currentDate)->get()
        ];

        return view('payments.index', $data);
    }

    public function getViewAllPaymentPage()
    {
        $data = [
            'payments' => Payment::orderBy('created_at', 'DESC')->get(),
        ];

        return view('payments.view_all', $data);
    }

    public function getUpdatePaymentStatus($id)
    {
        $paymentStatus = Payment::where('id', $id)->first()->status;

        if ($paymentStatus == 0) {
            Payment::where('id', $id)->update([
                'status' => 1,
                'created_by' => session('user_name')
            ]);
        } else {
            Payment::where('id', $id)->update([
                'status' => 0,
                'created_by' => session('user_name')
            ]);
        }
    }
}
