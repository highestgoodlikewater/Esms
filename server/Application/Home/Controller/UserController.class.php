<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function getUser(){
    	$userId=I('get.userid');
    	$Db=M();
    	$result=$Db->table(array('user'=>'u','department'=>'d'))->field('u_id,username,usertype,type,createtime,lasttime')->where('u.d_id=d.d_id')->select();
    	if(count($result)==0){
    		$data=array(
    			'code'=>'0',
    			'msg'=>'没有用户！',
    		);
    	}else{
    		$data=array(
    			'code'=>'1',
    			'msg'=>'查询成功！',
    			'result'=>$result,
    		);
    	}
    	$this->ajaxReturn($data);
        return;
    	//dump($result);
    }

    public function index(){
        echo 'Hello!';
    }
}
