<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display the pengajuan page (user only)
     */
    public function index()
    {
        return view('pengajuan');
    }
}
