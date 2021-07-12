<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    return [
        'comment_post_id' => rand(1,3),
        'comment_content' => $faker->unique()->regexify('[A-Za-z0-9]{' . mt_rand(2, 8) . '}'),   // 随时字符串 2 - 8个长度
        'comment_author' => rand(1,3),
    ];
});
