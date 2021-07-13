<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManyToManyController extends Controller
{
    // 多对多 关联 控制器
    
    /**
     * 获取用户的所有角色
     */
    public function getUserRole(){
    	$role = \App\Model\User::where('id',1)->with('role')->get();
    	dump($role->toArray());
    	/*
    	array:1 [▼
		  0 => array:4 [▼
		    "id" => 1
		    "name" => "aaa"
		    "country_id" => 1
		    "role" => array:2 [▼
		      0 => array:5 [▼
		        "role_id" => 1
		        "role_type" => "管理员"
		        "created_at" => null
		        "updated_at" => null
		        "pivot" => array:2 [▼
		          "role_user_user_id" => 1
		          "role_user_role_id" => 1
		        ]
		      ]
		      1 => array:5 [▼
		        "role_id" => 3
		        "role_type" => "普通员工"
		        "created_at" => null
		        "updated_at" => null
		        "pivot" => array:2 [▼
		          "role_user_user_id" => 1
		          "role_user_role_id" => 3
		        ]
		      ]
		    ]
		  ]
		]
    	 */
    }

    /**
     * 多对多反向关联
     * 获取某角色有哪些用户
     */
    public function getUserByRole(){
    	$user = \App\Model\Role::where('role_id',1)->with('user')->get();
    	dump($user->toArray());
    	/*
    	array:1 [▼
			  0 => array:5 [▼
			    "role_id" => 1
			    "role_type" => "管理员"
			    "created_at" => null
			    "updated_at" => null
			    "user" => array:1 [▼
			      0 => array:4 [▼
			        "id" => 1
			        "name" => "aaa"
			        "country_id" => 1
			        "pivot" => array:2 [▼
			          "role_user_role_id" => 1
			          "role_user_user_id" => 1
			        ]
			      ]
			    ]
			  ]
			]
    	 */
    }
}
