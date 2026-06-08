<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmidController extends Controller
{
    /**
     * Display the Omid page.
     */
    public function index()
    {
        return view('omid');
    }
}
