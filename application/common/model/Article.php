<?php
	namespace app\common\model;
	use think\Model;
	class Article extends BaseModel{
		public function getAllArticle()
		{
			$order=['id'=>'asc'];
			return $this->order($order)
						->paginate(5);
		}
		public function add($data){
			$this->allowField(true)->save($data);
			return $this->id;
		}
		public function getAllArticleSelect(){
			$order=['id'=>'desc'];
			return $this->order($order)
						->select();
		}
		public function Author(){
			return $this->belongsTo('Author');
		}
		public function Category(){
			return $this->belongsTo('Category');
		}

	public function getAllArticle_id($id)
		{
			$order=['id'=>'asc'];


			$data=['category_id'=>$id];
			return $this->where($data)->order($order)
						->paginate(5);
		}
		
	} 
?>