<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

}
