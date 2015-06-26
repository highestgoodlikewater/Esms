<?php
namespace Home\Controller;
use Think\Controller;
class StatisticController extends Controller {

    /*统计查询
    **
    **入库查询
    */
    public function storageQuery(){
    	$col_3=I('get.col_3');
        $remark=I('get.remark');
    	$Db=M('storage');

        if($col_3!=null){
            $result=$Db->where(array('col_3'=>$col_3,'remark'=>$remark,))->select();
        }else{
            $result=$Db->where(array('remark'=>$remark,))->select();
        }

    	if(count($result)==0){
    		$data=array(
    			'code'=>'0',
    			'msg'=>'没有信息！',
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

    /*统计查询
    **
    **库存查询
    */
    public function stockQuery(){
        $name=I('get.name');
        $col=I('get.col');
        $Db=M('stock');

        if($name!=null || $col!=null){
            $result=$Db->where(array('name'=>$name,'col'=>$col,))->select();
        }else{
            $result=$Db->select();
        }

        if(count($result)==0){
            $data=array(
                'code'=>'0',
                'msg'=>'没有信息！',
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

    public function index(){
        echo 'Hello!';
    }
}
