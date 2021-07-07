<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChunkController extends Controller
{
    /**
     * 分块处理
     */
    public function index(){
    	$result = DB::table('tb_a')->orderBy('a_id')->chunk(1, function ($as) {
		    foreach ($as as $a) {
		        $a->a_num = $a->a_num + 1;
		    }
		});
		dd($result);
    }

    /**
     * 查询条件是否存在
     */

    public function exist(){
		//$result = DB::table('tb_a')->where('a_id', 1)->exists();


		$result = DB::table('tb_a')->where('a_id', 5)->doesntExist();
		dd($result);
    }
}
