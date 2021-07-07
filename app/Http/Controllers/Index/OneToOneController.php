<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Phone;
use App\Model\UserProfile;
use Illuminate\Support\Facades\DB;

class OneToOneController extends Controller
{
    /**
     * 获取用户所关联的手机号
     */
    public function getUserPhone(){
    	DB::connection()->enableQueryLog();#开启执行日志
    	$user = User::with(['phone' => function ($query){
    		return $query->select('*');
    	}])->get()->toArray();
    	//$result2 = Phone::all();
    	//return $result;
    	dd(DB::getQueryLog());   //获取查询语句、参数和执行时间
    	dd($user);
    	foreach ($user as $key => $value) {
    		dump($value->phone->phone_number);
    	}
    	//dump($user[0]->phone);
    }
}
