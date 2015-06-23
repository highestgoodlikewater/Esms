<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function loginCheck(){

        //$user=$_GET['username'];
        $user=I('get.username');
        //$pass=$_GET['password'];
        $pass=I('get.password');
        $where=array(
            'username'=>$user,
            'password'=>$pass,
        );

        $admin=M('user');
        $result=$admin->where($where)->select();
        if(count($result)==0){
            //echo 'False';
            $data=array(
                'code'=>'0',
                'msg'=>'账号或密码错误！',
            );
        }else{
            //echo 'True';
            $admin->where($where)->save(array('lasttime'=>date('y-m-d H:i:s',time())));
            $data=array(
                'code'=>'1',
                'msg'=>'登陆成功！',
                'id'=>$result[0]['u_id'],
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    public function index(){
        echo 'Hello!';
    }
}
