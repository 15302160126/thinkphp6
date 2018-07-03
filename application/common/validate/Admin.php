<?php
namespace app\common\validate;
use think\Validate;
class Admin extends Validate{
	protected $rule=[
		['realname','require|max:20','名字不超过20个字符'],
	];
	protected $scene=[
		'add'=>['realname'],
		'edit'=>['id','realname'],
		'delete'=>['id'],
	];
}
?>