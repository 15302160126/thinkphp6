<?php
	namespace app\common\model;
	use think\Model;
	class Author extends BaseModel{
		public function getAllAuthor()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllAuthorSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getAuthorByuserName($username){
			$data=['username'=>$username];
			return $this->where($data)->find();
		}
	} 
?>