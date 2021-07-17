<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Image;

class PolymorphicController extends Controller
{
    // 多态关联
    
    /**
     * 一对一多态关联
     * 获取某篇文章的图像
     */
    public function getImageByPost(){
    	$post = Post::with('image')->find(1);
		dump($post);
		$image = $post->image->toArray();
		dump($image); // 文章对应的图像
		/*
		array:6 [▼
		  "image_id" => 1
		  "image_body" => "1111"
		  "imageable_id" => 1
		  "imageable_type" => "App\Model\Post"
		  "created_at" => null
		  "updated_at" => null
		]
		 */

		$image = Image::find(1);
		$imageable = $image->imageable;
		dump($imageable); // 获取多态关联拥有者，返回 Post 或者 User 实例，这取决于图像所属的模型类型
		/*
		App\Model\Post {#237 ▼
		  #table: "post"
		  #primaryKey: "post_id"
		  #connection: "mysql"
		  ....}
		 */
    }

    /**
     * 一对多 多态关联
     * 获得某篇文章下的所有评论
     */
    public function getAllCommentPvByPost(){
    	$post = \App\Model\Post::with('commentpv')->find(1);

		dump($post->toArray());
		/*array:7 [▼
			  "post_id" => 1
			  "post_title" => "aaa"
			  "post_content" => "aaaaaaaa"
			  "post_user_id" => 1
			  "created_at" => null
			  "updated_at" => null
			  "commentpv" => array:2 [▼
			    0 => array:6 [▼
			      "comment_pv_id" => 1
			      "comment_pv_body" => "very goods"
			      "comment_pv_commentable_id" => 1
			      "comment_pv_commentable_type" => "App\Model\Post"
			      "created_at" => null
			      "updated_at" => null
			    ]
			    1 => array:6 [▼
			      "comment_pv_id" => 2
			      "comment_pv_body" => "goods"
			      "comment_pv_commentable_id" => 1
			      "comment_pv_commentable_type" => "App\Model\Post"
			      "created_at" => null
			      "updated_at" => null
			    ]
			  ]
			]*/

		// 获取评论是评论谁的
		$commentpv = \App\Model\Commentpv::find(1);
		//dump($commentpv);
		$commentable = $commentpv->comment_pv_commentable;
		dump($commentable);  // 返回该评论所属的的Post模型
		/*
		App\Model\Post {#258 ▼
			  #table: "post"
			  #primaryKey: "post_id"
			  #connection: "mysql"
			  #keyType: "int"
			  +incrementing: true
			  #with: []
			  #withCount: []
			  #perPage: 15
			  +exists: true
			  +wasRecentlyCreated: false
			  #attributes: array:6 [▶]
			  #original: array:6 [▶]
			  #changes: []
			  #casts: []
			  #dates: []
			  #dateFormat: null
			  #appends: []
			  #dispatchesEvents: []
			  #observables: []
			  #relations: []
			  #touches: []
			  +timestamps: true
			  #hidden: []
			  #visible: []
			  #fillable: []
			  #guarded: array:1 [▶]
			}
		 */
    }

    /**
     * 多对多 多态关联
     * 
     */
    public function getAllTagByPost(){
    	$post = \App\Model\Post::with('tag')->find(1);
    	dump($post->toArray());
    	/*
    	array:7 [▼
			  "post_id" => 1
			  "post_title" => "aaa"
			  "post_content" => "aaaaaaaa"
			  "post_user_id" => 1
			  "created_at" => null
			  "updated_at" => null
			  "tags" => array:3 [▼
			    0 => array:5 [▼
			      "tag_id" => 1
			      "tag_name" => "人物"
			      "created_at" => null
			      "updated_at" => null
			      "pivot" => array:3 [▶]
			    ]
			    1 => array:5 [▶]
			    2 => array:5 [▶]
			  ]
			]
    	 */
    	
    	// 获取标签所属模型
    	$tag = \App\Model\Tag::find(1);
    	dump($tag);
    	dump($tag->post->toArray());
    	/*
    	array:1 [▼
		  0 => array:7 [▼
		    "post_id" => 1
		    "post_title" => "aaa"
		    "post_content" => "aaaaaaaa"
		    "post_user_id" => 1
		    "created_at" => null
		    "updated_at" => null
		    "pivot" => array:3 [▼
		      "tag_tag_id" => 1
		      "taggable_id" => 1
		      "taggable_type" => "App\Model\Post"
		    ]
		  ]
		]
    	 */
    }
}
