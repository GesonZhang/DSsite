<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
        header('Access-Control-Allow-Headers:X-Requested-With,Content-Type');
        $this->load->model('index_model');
    }

//    teacher_list get
    public function teacher_list(){
        $catalog=$this->input->post('catalog');
        $result=$this->index_model->teacher_list($catalog);
        echo json_encode($result);
    }

//    teacher_list order by asc years
    public function list_asc_order_years(){
        $dowell=$this->input->post('dowell');
        $result=$this->index_model->list_asc_order_years($dowell);
        echo json_encode($result);
    }

//    teacher_list order by desc years
    public function list_desc_order_years(){
        $dowell=$this->input->post('dowell');
        $result=$this->index_model->list_desc_order_years($dowell);
        echo json_encode($result);
    }

    //    teacher_list order by asc price
    public function list_asc_order_price(){
        $dowell=$this->input->post('dowell');
        $result=$this->index_model->list_asc_order_price($dowell);
        echo json_encode($result);
    }

    //    teacher_list order by desc price
    public function list_desc_order_price(){
        $dowell=$this->input->post('dowell');
        $result=$this->index_model->list_desc_order_price($dowell);
        echo json_encode($result);
    }

    //system info//来自index.js，现已停用
    public function system_message(){
        $result=$this->index_model->system_message();
        echo json_encode($result);
    }

    //获取课程审核结果到信息列表 当前用户为学生
    public function select_class_message_s(){
        $s_id = $this->input->get('s_id');
        $result=$this->index_model->select_class_message_s($s_id);
        echo json_encode($result);
    }

    //获取课程审核结果到信息列表 当前用户为教师
    public function select_class_message_t(){
        $t_id = $this->input->get('t_id');
        $result=$this->index_model->select_class_message_t($t_id);
        echo json_encode($result);
    }

    //获取注册审核结果到信息列表 当前用户为教师
    public function reg_message_t(){
        $t_id = $this->input->get('t_id');
        $result=$this->index_model->reg_message_t($t_id);
        echo json_encode($result);
    }

    //get the data of chat//来自index.js，现已停用
    public function recommend(){
        $student_id=$this->input->get('student_id');
        $result=$this->index_model->recommend($student_id);
        echo json_encode($result);
    }

    public function recommend_list(){
        $user_id=$this->input->get('user_id');
        $user_identify=$this->input->get('user_identify');
        $result=$this->index_model->recommend_list($user_id,$user_identify);
        echo json_encode($result);
    }

    //   focus or not when open
    public function index_focus(){
        $s_id=$this->input->get('s_id');
        $result=$this->index_model->index_focus($s_id);
        echo json_encode($result);
    }

    //focus or not when click
    public function change_focus(){
        $s_id=$this->input->post('s_id');
        $t_id=$this->input->post('t_id');
        $result=$this->index_model->change_focus($s_id,$t_id);
        if ($result) {
            $this->index_model->del_focus($s_id,$t_id);
            echo 'del';
        } else {
            $this->index_model->add_focus($s_id,$t_id);
            echo 'add';
        }
    }

    //用户登陆后获取相关课程信息
    public  function get_tea_class_msg(){
        $result = $this->index_model->get_tea_class_msg();
        if($result){
            echo json_encode($result);
        }
    }

    //用户登陆后更新相关课程信息
    public  function update_tea_class_msg(){
        $state=$this->input->get('state');
        $c_id=$this->input->get('c_id');
        $result = $this->index_model->update_tea_class_msg($state,$c_id);
            echo json_encode($result);
    }

    //用户登陆后获取相关已选课程信息
    public  function get_join_class_msg(){
        $result = $this->index_model->get_join_class_msg();
        if($result){
            echo json_encode($result);
        }
    }
    
    //用户登陆后更新相关已选课程信息
    public  function update_join_class_msg(){
        $state=$this->input->get('state');
        $c_id=$this->input->get('c_id');
        $result = $this->index_model->update_join_class_msg($state,$c_id);
        echo json_encode($result);
    }
}?>