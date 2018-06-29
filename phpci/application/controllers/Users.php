<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		header('Access-Control-Allow-Origin:*');  //支持全域名访问，不安全，部署后需要固定限制为客户端网址
		header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); //支持的http 动作
		header('Access-Control-Allow-Headers:x-requested-with,content-type');  //响应头 请按照自己需求添加。
	}

// 执行注册
	public function reg(){
		$identify = $this->input->post('identify');
        $name = $this->input->post('name');
		$account = $this->input->post('account');
        $password =$this->input->post('password') ;
		$phone = $this->input->post('phone');
		$sex = $this->input->post('sex');
        $school = $this->input->post('school');
        $education = $this->input->post('education');
		if ($identify=="true") {
			$result = $this->users_model->insert_teacher($name,$account,$password,$phone,$sex,$school,$education);
		}else{
			$result = $this->users_model->insert_student($name,$account,$password,$phone,$sex);
		}
		echo $result;
	}

// 验证注册账号
	public function test(){
		$account = $this->input->get('account');
		$result = $this->users_model->test($account);
		echo $result;
	}

// 验证登录
	public function login(){
		$account = $this->input->post('account');
//        $password =  md5($this->input->post('password'));
		$password =  $this->input->post('password');
		$result = $this->users_model->login($account,$password);
		echo json_encode($result);
	}

// 输出关注人
 	public function attention(){
 		$id = $this->input->get('id');
 		$result = $this->users_model->attention($id);
 		echo json_encode($result);
 	}

//关注和取消关注
 	public function toggle_attention(){
 		$t_id = $this->input->get('t_id');
 		$s_id = $this->input->get('s_id');
 		$result = $this->users_model->toggle_attention($t_id,$s_id);
 		echo $result;
 	}

//获取学豆 此功能已取消
 	public function get_beans(){
 		$id = $this->input->get('id');
 		$result = $this->users_model->get_beans($id);
 		if ($result) echo "success";
 	}

// 购买优惠券 此功能已取消
 	public function get_tickets(){
 		$id = $this->input->get('id');
 		$result = $this->users_model->get_tickets($id);
 		if ($result) echo "success";
 	}

//更改个人信息
 	public function change_info(){
 		$id = $this->input->get('id');
 		$form = $this->input->get('form');
 		$prop = $this->input->get('prop');
 		$val = $this->input->get('val');
 		$this->users_model->change_info($id,$form,$prop,$val);
 	}

//更改头像
 	public function change_img(){
 		$file = $_FILES['file'];
    $id = $this->input->post('id');
    $identify = (int)$this->input->post('identify');
    $form = $identify ? 'teacher' : 'student';
    $img_path = $identify ? '/static/teaImg/'.$file['name'] : '/static/stuImg/'.$file['name'];
    $upload_path = 'C:/xampp/htdocs/ttyk/vuecli'.$img_path;
    if(move_uploaded_file($file['tmp_name'],$upload_path)){
    	$this->users_model->change_info($id,$form,'img',$img_path);
    }
 	}

//check old password right or not when chang password
 	public function check_old(){
 		$oldPassword=$this->input->post('oldPassword');
 		$identify=$this->input->post('identify');
        $id=$this->input->post('id');
 		if (!$identify) {//判断当前用户身份0为学生，1为教师
// 		    $Id =$this->user_model->check_s_id($id);
// 		    if($Id){//存在该id
                $result=$this->users_model->check_old_student($id,$oldPassword);
                echo $result ? 1 : 0;
//            }else{//不存在此账户
// 		        echo 0;
//            };
 		} else {
//            $Id =$this->user_model->check_t_id($id);
//            if($Id){//存在该id
 			$result=$this->users_model->check_old_teacher($id,$oldPassword);
 			echo $result ? 1 : 0;
//            }else{//不存在此账户
//                echo 0;
//            };
 		};
 	}
 	
 	//update the password
 	public function update_password(){
 		$newPassword=$this->input->post('newPassword');
 		$identify=$this->input->post('identify');
 		$id=$this->input->post('id');
 		if (!$identify) {
 			$result=$this->users_model->update_student_password($newPassword,$id);
 			echo $result ? 1 : 0;
 		} else {
 			$result=$this->users_model->update_teacher_password($newPassword,$id);
 			echo $result ? 1 : 0;
 		}
 	}
}
