<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PluckController extends Controller
{
    /**
     * 测试 ->pluck()
     */
    public function index(){
    	/*$titles = DB::table('tb_a')->pluck('a_title');
    	dd($titles);*/

    	$roles = DB::table('tb_a')->pluck('a_title', 'a_name');
    	dd($roles);
    }

}
