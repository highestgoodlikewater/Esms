<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    /*用户管理
    **
    **获取用户信息
    */
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
    }

    /*用户管理
    **
    **获取单个用户信息
    */
    public function getOne(){
        $userId=I('get.userid');
        $Db=M('user');
        $result=$Db->where('u_id='.$userId)->select();

        $depart=M('department');
        $department=$depart->select();

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
                'depart'=>$department,
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    /*用户管理
    **
    **删除用户信息
    */
    public function deleteUser(){
        $userId=I('get.userid');
        $Db=M('user');
        $result=$Db->where('u_id='.$userId)->delete();
        if(count($result)==0){
            $data=array(
                'code'=>'0',
                'msg'=>'删除失败！',
            );
        }else{
            $data=array(
                'code'=>'1',
                'msg'=>'删除成功！',
                'result'=>$result,
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    /*用户管理
    **
    **添加用户信息
    */
    public function addUser(){
        $username=I('post.username');
        $password=I('post.password');
        $usertype=I('post.usertype');
        $d_id=I('post.d_id');
        $email=I('post.email');
        $saveData=array(
            'username'=>$username,
            'password'=>$password,
            'usertype'=>$usertype,
            'd_id'=>$d_id,
            'email'=>$email,
            'createtime'=>date('y-m-d H:i:s',time()),
            'lasttime'=>date('y-m-d H:i:s',time()),
        );
        $Db=M('user');
        $result=$Db->add($saveData);
        if($result){
            $data=array(
                'code'=>'1',
                'msg'=>'添加成功！',
            );
        }else{
            $data=array(
                'code'=>'0',
                'msg'=>'添加失败！',
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    /*用户管理
    **
    **修改用户信息
    */
    public function updateUser(){
        $u_id=I('post.u_id');
        $username=I('post.username');
        $password=I('post.password');
        $usertype=I('post.usertype');
        $d_id=I('post.d_id');
        $email=I('post.email');
        $saveData=array(
            'u_id'=>$u_id,
            'username'=>$username,
            'password'=>$password,
            'usertype'=>$usertype,
            'd_id'=>$d_id,
            'email'=>$email,
        );
        $Db=M('user');
        $result=$Db->save($saveData);
        if($result){
            $data=array(
                'code'=>'1',
                'msg'=>'修改成功！',
            );
        }else{
            $data=array(
                'code'=>'0',
                'msg'=>'修改失败！',
            );
        }
        $this->ajaxReturn($data);
        return;
    }


    /*部门管理
    **
    **获取部门信息
    */
    public function getDepartment(){
        $Db=M('department');
        $result=$Db->select();
        if(count($result)==0){
            $data=array(
                'code'=>'0',
                'msg'=>'查询失败！',
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
    }

    /*部门管理
    **
    **获取单个部门信息
    */
    public function getADepartment(){
        $d_id=I('get.d_id');
        $Db=M('department');
        $result=$Db->where('d_id='.$d_id)->select();
        if(count($result)==0){
            $data=array(
                'code'=>'0',
                'msg'=>'查询失败！',
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
    }

    /*部门管理
    **
    **添加部门
    */
    public function addDepartment(){
        $name=I('post.name');
        $manager=I('post.manager');
        $info=I('post.info');
        $status=I('post.status');
        $saveData=array(
            'type'=>$name,
            'manager'=>$manager,
            'info'=>$info,
            'status'=>$status,
        );
        $Db=M('department');
        $result=$Db->add($saveData);
        if($result){
            $data=array(
                'code'=>'1',
                'msg'=>'添加成功！',
            );
        }else{
            $data=array(
                'code'=>'0',
                'msg'=>'添加失败！',
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    /*部门管理
    **
    **删除部门
    */
    public function deleteDepartment(){
        $d_id=I('get.d_id');
        $Db=M('department');
        $result=$Db->where('d_id='.$d_id)->delete();
        if(count($result)==0){
            $data=array(
                'code'=>'0',
                'msg'=>'删除失败！',
            );
        }else{
            $data=array(
                'code'=>'1',
                'msg'=>'删除成功！',
                'result'=>$result,
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    /*部门管理
    **
    **修改部门
    */
    public function updateDepartment(){
        $d_id=I('post.d_id');
        $name=I('post.name');
        $manager=I('post.manager');
        $info=I('post.info');
        $status=I('post.status');
        $saveData=array(
            'd_id'=>$d_id,
            'type'=>$name,
            'manager'=>$manager,
            'info'=>$info,
            'status'=>$status,
        );
        $Db=M('department');
        $result=$Db->save($saveData);
        if($result){
            $data=array(
                'code'=>'1',
                'msg'=>'修改成功！',
            );
        }else{
            $data=array(
                'code'=>'0',
                'msg'=>'修改失败！',
            );
        }
        $this->ajaxReturn($data);
        return;
    }

    public function index(){
        echo 'Hello!';
    }
}
