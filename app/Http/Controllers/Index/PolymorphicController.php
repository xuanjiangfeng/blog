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
}
