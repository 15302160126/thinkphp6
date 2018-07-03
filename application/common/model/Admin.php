<?php
	namespace app\common\model;
	use think\Model;
	class Admin extends BaseModel{
		public function getAllAdmin()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->save($data);
			return $this->id;
		}
		public function getAllAdminSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function getAdminByuserName($username){
			$data=['username'=>$username];
			return $this->where($data)->find();
		}
	} 
?>