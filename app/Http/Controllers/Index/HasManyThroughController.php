<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Country;

class HasManyThroughController extends Controller
{
    // 获取某个国家下的所有博客文章
    // 场景 专业=>班级=>学生， 查询专业下有哪些学生
    public function getPostsFromCountry(){
    	$posts = Country::where('country_id',1)->with('posts')->get()->toArray();
    	dump($posts);
    	/*
    	array:1 [▼
			  0 => array:5 [▼
			    "country_id" => 1
			    "country_name" => "中国"
			    "created_at" => null
			    "updated_at" => null
			    "posts" => array:3 [▼
			      0 => array:4 [▼
			        "post_id" => 1
			        "post_user_id" => 1
			        "post_title" => "中国人"
			        "country_id" => 1
			      ]
			      1 => array:4 [▼
			        "post_id" => 2
			        "post_user_id" => 2
			        "post_title" => "台湾人"
			        "country_id" => 1
			      ]
			      2 => array:4 [▼
			        "post_id" => 3
			        "post_user_id" => 2
			        "post_title" => "香港人"
			        "country_id" => 1
			      ]
			    ]
			  ]
			]
    	 */
    }
}
