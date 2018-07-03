<?php
namespace app\common\validate;
use think\Validate;
class Article extends Validate{
	protected $rule=[
		['title','require|max:50','不超过50个字符'],
	];
	protected $scene=[
		'add'=>['title','content','content'],
		'edit'=>['title','content','content'],
		'delete'=>['title','content','content'],
	];
}