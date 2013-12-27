<?php
//extends 继承父级的功能   
class NewsControl extends control{  
	function show(){
		// echo "显示文章列表"; //http://localhost/lin/db.php?c=news&m=show
		$db = M('news');
		//分页
		//查询总条数
		// echo $db->count();
		$count =  $db->count();
		//分页对象
		$page = new Page($count,2);
		// echo $page->show();
		$this ->assign("page",$page->show());		
		$data = $db->where($page->limit()) -> all();
		$this-> assign ('news', $data) ;
		// p($data);
		$this->display();

	}
	function hello(){
		echo 'hello';  //http://localhost/lin/db.php?c=news&m=hello
	}
	//向文章表new表添加数据
	function add(){
		// print_r($_POST);
		if(IS_POST){
			// echo "往数据库插入";
			$db = M("news");
			// P($_POST);
			if($db->add()){
				// echo "添加成功";
				$this->success("发表成功",'show');
			}else{
				// echo "添加失败";
				$this->error("发表失败",'show');
			}
		}else{
			$this->display();  //http://localhost/lin/db.php?c=news&m=add

		}
			}
}

?>