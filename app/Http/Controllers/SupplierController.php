<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function print(Request $request)
    {
        $suppliers = Supplier::orderBy('name')->get();

        return view('suppliers.print', [
            'suppliers' => $suppliers,
            'user' => $request->user(),
        ]);
    }
}
