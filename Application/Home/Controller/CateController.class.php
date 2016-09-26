<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function index(){
    	$cateid=I('id');
    	$article= D('article'); // 实例化User对象
    	$count=$article->where(array('cateid'=>$cateid))->count();// 查询满足要求的总记录数
    	$Page= new \Think\Page($count,2);// 
    	$show       = $Page->show();// 
    	$list = $article->where(array('cateid'=>$cateid))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('list',$list);// 赋值数据集
    	$this->current();
        $this->display();
    }

    public function current(){
    	$current=I('id');
    	$this->assign('current',$current);
    }



    
}