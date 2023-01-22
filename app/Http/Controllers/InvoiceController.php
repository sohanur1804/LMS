<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        return view('invoice.index');
    }

    public function show($id) {
        return view('user.invoice.show', [
            'invoice' => Invoice::findOrFail($id),
        ]);
    }
}
