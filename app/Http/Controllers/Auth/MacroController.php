<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MacroController extends Controller
{
    public function index(){
    	return response()->caps('foo');
    }
}
