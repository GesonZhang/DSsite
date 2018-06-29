<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course extends CI_Controller{
  public function __construct(){
    parent::__construct();
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
    header('Access-Control-Allow-Headers:X-Requested-With,Content-Type');
    $this->load->model('course_model');
  }

//courseList_teacher
  public function courseList_teacher(){
    $result =  $this->course_model->course_info();
    echo json_encode($result);
  }

  //学生课程列表
  public function courseList_teacher_s(){
    $id=$this->input->get('s_id');
    $j_state=$this->input->get('j_state');
    $identify=$this->input->get('identify');
    $result =  $this->course_model->course_info_s($id,$j_state,$identify);
    echo json_encode($result);
  }

  //教师审核管理
  public function courseList_teacher_ing(){
    $id=$this->input->get('t_id');
    $j_state=$this->input->get('j_state');
    $result =  $this->course_model->course_info_ing($id,$j_state);
    echo json_encode($result);
  }

   //教师审核 拒绝申请
  public function delClassN(){
    $id=$this->input->get('j_id');
    $result =  $this->course_model->delClassN($id);
    echo json_encode($result);
  }

   //教师审核 接受申请
  public function delClassY(){
    $id=$this->input->get('j_id');
    $result =  $this->course_model->delClassY($id);
    echo json_encode($result);
  }

    //管理员审核教师新课程管理
    public function addClass_check(){
        $c_check=$this->input->get('c_check');
        $result =  $this->course_model->addClass_check($c_check);
        echo json_encode($result);
    }

    //管理员审核教师课程申请 拒绝申请
    public function addClass_checkN(){
        $id=$this->input->get('j_id');
        $result =  $this->course_model->addClass_checkN($id);
        echo json_encode($result);
    }

    //管理员审核教师课程申请 接受申请
    public function addClass_checkY(){
        $id=$this->input->get('j_id');
        $result =  $this->course_model->addClass_checkY($id);
        echo json_encode($result);
    }

    //管理员审核用户注册管理
    public function reg_check(){
        $c_check=$this->input->get('c_check');
        $result =  $this->course_model->reg_check($c_check);
        echo json_encode($result);
    }

    //管理员审核教师注册申请 拒绝申请
    public function reg_checkN(){
        $id=$this->input->get('j_id');
        $result =  $this->course_model->reg_checkN($id);
        echo json_encode($result);
    }
    
    //管理员审核教师注册申请 接受申请
    public function reg_checkY(){
        $id=$this->input->get('j_id');
        $result =  $this->course_model->reg_checkY($id);
        echo json_encode($result);
    }
}
?>