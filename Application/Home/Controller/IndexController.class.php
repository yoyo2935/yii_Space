<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$article= D('article'); // 实例化User对象
    	$count=$article->count();// 查询满足要求的总记录数
    	$Page= new \Think\Page($count,2);// 
    	$show       = $Page->show();// 
    	$list = $article->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('list',$list);// 赋值数据集
        $this->display();
    }

    
}