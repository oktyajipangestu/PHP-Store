<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Utama extends Controller
{
    public function index() {
        return view('Utama');
    }
}
