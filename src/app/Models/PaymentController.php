<?php


namespace App\Models;


use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function show()
    {
        $intent = auth()->user()->createSetupIntent();
    }
}
