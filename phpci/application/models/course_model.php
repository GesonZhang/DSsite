<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Course_model extends CI_Model{
//courseList_teacher course_info
	public function course_info(){
		$sql="select * from teacher";
		$query=$this->db->query($sql);
		return $query->result();
	}

//courseList_teacher course_info 登陆用户为学生时
	public function course_info_s($id,$j_state,$identify){
	    $sql_new = $identify==0?"SELECT * FROM join_class ,teacher WHERE join_class.s_id ='$id' AND join_class.j_state='$j_state' AND join_class.t_id=teacher.id":"SELECT * FROM join_class ,student WHERE join_class.t_id ='$id' AND join_class.j_state='$j_state' AND join_class.s_id=student.id";
		$sql=$sql_new;
		$query=$this->db->query($sql);
		return $query->result();
	}

	//courseList_teacher course_info 登陆用户为教师时，用于审核申请
	public function course_info_ing($id,$j_state){
		$sql="SELECT * FROM join_class ,student WHERE join_class.t_id ='$id' AND join_class.j_state='$j_state' AND join_class.t_id=student.id";
		$query=$this->db->query($sql);
		return $query->result();
	}

//教师审核 拒绝申请 j_check = 2 为拒绝
	public function delClassN($id){
		$sql="update join_class set j_state='4' , j_check='2' , j_checktime=now() where j_id='$id'";
		$query=$this->db->query($sql);
		return $query->result();
	}

//教师审核 接受申请 j_state=0 表示接受申请后立即变更为等待上课序列。
	public function delClassY($id){
		$sql="update join_class set j_state='0' , j_check='1' , j_checktime=now() where j_id='$id'";
		$query=$this->db->query($sql);
		return $query->result();
	}

    //addClass_check 登陆用户为管理员时，用于审核申请教师的新课程申请获取
    public function addClass_check($c_check){
        $sql="SELECT * FROM tea_class WHERE c_check ='$c_check'";
        $query=$this->db->query($sql);
        return $query->result();
    }

    //管理员审核教师课程申请 拒绝申请 j_check = 2 为拒绝
    public function addClass_checkN($id){
        $sql="update tea_class set c_check='2' , c_checktime=now() where c_id='$id'";
        $query=$this->db->query($sql);
        return $query->result();
    }

//管理员审核教师课程申请 接受申请 1表示接受申请后立即变更为等待选择序列。
    public function addClass_checkY($id){
        $sql="update tea_class set  c_check='1' , c_checktime=now() where c_id='$id'";
        $query=$this->db->query($sql);
        return $query->result();
    }

    // 登陆用户为管理员时，用于审核用户注册
    public function reg_check($c_check){
        $sql="SELECT * FROM teacher WHERE is_check ='$c_check'";
        $query=$this->db->query($sql);
        return $query->result();
    }

    //管理员审核教师注册申请 拒绝申请 j_check = 2 为拒绝
    public function reg_checkN($id){
        $sql="update teacher set is_check='2' , is_checktime=now() where id='$id'";
        $query=$this->db->query($sql);
        return $query->result();
    }
    
//管理员审核教师注册申请 接受申请 j_state=0 表示接受申请后立即变更为等待选择序列。
    public function reg_checkY($id){
        $sql="update teacher set  is_check='1' , is_checktime=now() where id='$id'";
        $query=$this->db->query($sql);
        return $query->result();
    }
}
?>