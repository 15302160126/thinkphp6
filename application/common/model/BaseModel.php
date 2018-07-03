<?php
	namespace app\common\model;
	use think\Model;
	class BaseModel extends Model{
	
		public function add($data){
			$data['status']=1;
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function updataById($data,$id){
			return $this->allowField(true)->save($data,['id'=>$id]);
		}
	} 
?>