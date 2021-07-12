<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Comment;

class OneToManyController extends Controller
{
    // 一对多 控制器

	/**
	 * 获取文章的评论
	 */
    public function getPostManyComment(){
    	$postComments = Post::with(['comment' => function($query){}])->get()->toArray();
    	dump($postComments);
    	/*
			array:3 [▼
			  0 => array:7 [▼
			    "post_id" => 1
			    "post_title" => "one"
			    "post_content" => "oneoneoneoneoneoneoneoneone"
			    "post_author_id" => 2
			    "created_at" => null
			    "updated_at" => null
			    "comment" => array:17 [▼
			      0 => array:6 [▼
			        "comment_id" => 2
			        "comment_post_id" => 1
			        "comment_content" => "LpAQV"
			        "comment_author" => 3
			        "created_at" => "2021-07-08 02:26:10"
			        "updated_at" => "2021-07-08 02:26:10"
			      ]
			      1 => array:6 [▶]
			      2 => array:6 [▶]
			      3 => array:6 [▶]
			      4 => array:6 [▶]
			      5 => array:6 [▶]
			      6 => array:6 [▶]
			      7 => array:6 [▶]
			      8 => array:6 [▶]
			      9 => array:6 [▶]
			      10 => array:6 [▶]
			      11 => array:6 [▶]
			      12 => array:6 [▶]
			      13 => array:6 [▶]
			      14 => array:6 [▶]
			      15 => array:6 [▶]
			      16 => array:6 [▶]
			    ]
			  ]
			  1 => array:7 [▶]
			  2 => array:7 [▶]
			]
    	*/
    }

    // 此处存疑，如果我想查询所有的文章的作者评论自己文章的内容。就是查询那些，自己评论自己文章的
    // 用 left join 可以解决
    // 用 模型，没想出来



    /**
     * 获取评论多对应的文章
     */
    public function getPostInfoByComment(){
    	$postInfo = Comment::with('post')->get()->toArray();
    	dump($postInfo);
    	/*
			array:50 [▼
			  0 => array:7 [▼
			    "comment_id" => 1
			    "comment_post_id" => 3
			    "comment_content" => "RdGG0b8"
			    "comment_author" => 1
			    "created_at" => "2021-07-08 02:26:10"
			    "updated_at" => "2021-07-08 02:26:10"
			    "post" => array:6 [▼
			      "post_id" => 3
			      "post_title" => "three"
			      "post_content" => "threethreethreethreethreethree"
			      "post_author_id" => 1
			      "created_at" => null
			      "updated_at" => null
			    ]
			  ]
			  1 => array:7 [▶]
			  2 => array:7 [▶]
			  3 => array:7 [▶]
			  4 => array:7 [▶]
			  5 => array:7 [▶]
			  6 => array:7 [▶]
			  7 => array:7 [▶]
			  8 => array:7 [▶]
			  9 => array:7 [▶]
			  10 => array:7 [▶]
			  11 => array:7 [▶]
			  12 => array:7 [▶]
    	*/
    }
}
