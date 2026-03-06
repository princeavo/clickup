<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        return view('pages.audit', [
            'calendlyUrl' => 'https://calendly.com/kevinmichozounnou_scale-ecommerce/methodecrea',
        ]);
    }
}
