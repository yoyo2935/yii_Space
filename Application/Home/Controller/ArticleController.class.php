<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
        $arts=D('article')->find(I('id'));
        $this->assign('arts',$arts);
        $this->catename($arts['cateid']);
        $this->other(I('id'));
        $this->display();
    }

    public function catename($cateid){
        $cates=D('cate')->find($cateid);
        $this->assign('catename',$cates['catename']);
    }


    public function other($id){
        $article=D('article');
        $articles=$article->find($id);
        $cateid=$articles['cateid'];
        $prevs=$article->where('id<'.$id)->where(array('cateid'=> $cateid))->order('id desc')->find();
        $nexts=$article->where('id>'.$id)->where(array('cateid'=>$cateid))->order('id asc')->find();
        $this->assign('prevs',$prevs);
        $this->assign('nexts',$nexts);
    }

    
}