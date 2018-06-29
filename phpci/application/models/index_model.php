<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index_model extends CI_Model{
//   get all teacher_list in tea_id
public function teacher_list($id){
    $sql="select * from teacher where dowell='$id' order by id desc";
    $query=$this->db->query($sql);
    return $query->result();
}

//get teacher_list by years asc order
public function list_asc_order_years($dowell){
    $sql="select * from teacher where dowell='$dowell' order by years asc";
    $query=$this->db->query($sql);
    return $query->result();
}

//get teacher_list by years desc order
public function list_desc_order_years($dowell){
    $sql="select * from teacher where dowell='$dowell' order by years desc";
    $query=$this->db->query($sql);
    return $query->result();
}

//get teacher_list by price asc order
public function list_asc_order_price($dowell){
    $sql="select * from teacher where dowell='$dowell' order by price2 asc";
    $query=$this->db->query($sql);
    return $query->result();
}

//get teacher_list by years desc order
public function list_desc_order_price($dowell){
    $sql="select * from teacher where dowell='$dowell' order by price2 desc";
    $query=$this->db->query($sql);
    return $query->result();
} 

//system info//来自index.php 控制器，现已停用
public function system_message(){
    $sql='select * from message  order by system_time desc';
    $query=$this->db->query($sql);
    return $query->result();
}

//获取审核结果到信息列表 当前用户为学生
public function select_class_message_s($s_id){
    $sql="select * from join_class j,student s where j.s_id='$s_id'and j.s_id=s.id order by j.j_checktime desc";
    $query=$this->db->query($sql);
    return $query->result();
}

//获取审核结果到信息列表 当前用户为教师
    public function select_class_message_t($t_id){
        $sql="select * from join_class j,student s  where j.t_id='$t_id' and j.s_id=s.id order by j.j_checktime desc";
        $query=$this->db->query($sql);
        return $query->result();
    }

    //获取注册结果到信息列表 当前用户为教师
    public function reg_message_t($t_id){
        $sql="select * from teacher where id='$t_id'";
        $query=$this->db->query($sql);
        return $query->result();
    }

//get the list of chat//来自index.php ，此功能现已停用
public function recommend($student_id){
    $sql="select * from message where student_id='$student_id' order by student_time desc";
    $query=$this->db->query($sql);
    return $query->result();
}

public function recommend_list($user_id,$user_identify){
    $sql=$user_identify==0?"select c.comm_content AS ccomm_content , c.comm_time as ccomm_time , s.name as sname , s.img as simg , t.name as tname , t.img as timg from comment c,student s ,teacher t where c.comm_user='$user_id' AND c.comm_user = s.id AND c.comm_tea = t.id order by c.comm_time desc":"select c.comm_content AS ccomm_content , c.comm_time as ccomm_time , s.name as sname , s.img as simg , t.name as tname , t.img as timg from comment c,student s ,teacher t where c.comm_tea='$user_id' AND c.comm_user = s.id AND c.comm_tea = t.id order by c.comm_time desc";
    $query=$this->db->query($sql);
    return $query->result();
}

//focus or not 
public function index_focus($s_id){
    $sql="select * from attention where s_id='$s_id'";
    $query=$this->db->query($sql);
    return $query->result();
}

//focus or not when click
public function change_focus($s_id,$t_id){
    $sql="select * from attention where $s_id='$s_id' and $t_id='$t_id'";
    $query=$this->db->query($sql);
    return $query->row();
}

public function del_focus($s_id,$t_id){
    $sql="update student set attention_num=attention_num-1 where id='$s_id'";
    $this->db->query($sql);
    $sql="delete from attention where $s_id='$s_id' and $t_id='$t_id'";
    $query=$this->db->query($sql);
    return $query;
}

public function add_focus($s_id,$t_id){
    $sql="update student set attention_num=attention_num+1 where id='$s_id'";
    $this->db->query($sql);    
    $sql="insert into attention(s_id,t_id) values('$s_id','$t_id')";
    $query=$this->db->query($sql);
    return $query;
}

//用户登陆后，获取教师相关课程的状态信息。
public  function get_tea_class_msg(){
    $sql = "select * from tea_class where c_check=1";
    $query = $this->db->query($sql);
    return $query->result();
}

//用户登陆后，更新教师相关课程的状态信息。
public  function update_tea_class_msg($state,$c_id){
        $sql = "update tea_class set c_state='$state' where c_id='$c_id' and  c_check=1";
        $query = $this->db->query($sql);
        return $query->result();
    }

//用户登陆后，获取相关已选课程的状态信息。
    public  function get_join_class_msg(){
        $sql = "select * from join_class";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
//用户登陆后，更新相关已选课程的状态信息。
    public  function update_join_class_msg($state,$c_id){
        $sql = "update join_class set j_state='$state' where j_id='$c_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>