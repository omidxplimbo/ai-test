<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HealthCheckController extends BaseController
{
    /**
     * Show the health check page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('health');
    }
}
