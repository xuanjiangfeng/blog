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

    	// 获取用户 id=3 的 一对一关联的 phone 表信息
    	$phone = User::find(3)->phone->toArray();
    	/*
    		分解
			1. $result = User::find(3);
			2. $result = $result->phone;
			3. $result = $result->toArray();
    	*/
    	// 先返回  User 的模型，然后调用模型里面 phone 方法，获取关联的内容 变成 phone模型，然后再把结果转换为 数组
    	dump($phone);
		/*
			array:5 [▼
			  "phone_id" => 3
			  "phone_user_id" => 3
			  "phone_number" => "15857510309"
			  "created_at" => null
			  "updated_at" => null
			]
		*/

    	$phone1 = User::with('phone')->get()->toArray();
    	dump($phone1);
    	/*
			array:3 [▼
			  0 => array:3 [▼
			    "id" => 1
			    "name" => "张三"
			    "phone" => array:5 [▼
			      "phone_id" => 1
			      "phone_user_id" => 1
			      "phone_number" => "15857510307"
			      "created_at" => null
			      "updated_at" => null
			    ]
			  ]
			  1 => array:3 [▼
			    "id" => 2
			    "name" => "李四"
			    "phone" => array:5 [▼
			      "phone_id" => 2
			      "phone_user_id" => 2
			      "phone_number" => "15857510308"
			      "created_at" => null
			      "updated_at" => null
			    ]
			  ]
			  2 => array:3 [▼
			    "id" => 3
			    "name" => "王五"
			    "phone" => array:5 [▼
			      "phone_id" => 3
			      "phone_user_id" => 3
			      "phone_number" => "15857510309"
			      "created_at" => null
			      "updated_at" => null
			    ]
			  ]
			]
    	*/



    	$phone2 = User::where('id',3)->with('phone')->first()->toArray();
    	dd($phone2);
    	/*
			array:3 [▼
			  "id" => 3
			  "name" => "王五"
			  "phone" => array:5 [▼
			    "phone_id" => 3
			    "phone_user_id" => 3
			    "phone_number" => "15857510309"
			    "created_at" => null
			    "updated_at" => null
			  ]
			]
    	*/
    	dump($phone->phone->phone_number);
    	dd($phone);


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

    /**
     * 根据手机获取用户信息
     */
    public function getUserInfoByPhone(){
    	// 获取 phone_number = 15857510309 的用户的信息
    	$user = Phone::where('phone_number','15857510309')->with('user')->first();

    	//dump($user->user->toArray());// 获取 user 表信息
    	//dump($user->user->name);// 获取 姓名 
    	dump($user);
    	// 把信息组合在一起
    	$user2 = Phone::where('phone_number','15857510309')->with(['user'=>function($query){
    		return $query->select('*');
    	}])->first()->toArray();

    	dump($user2);

    }
}
