<?php
	namespace app\common\model;
	use think\Model;
	class Category extends BaseModel{
		public function getAllCategory()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllCategorySelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
	} 
?>