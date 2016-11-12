<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function manage_category() {
    	return view('interface.manage_category');
    }
}
