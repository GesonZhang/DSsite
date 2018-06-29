<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model
{
//获取所有的老师
    public function get_all_teacher()
    {
        $sql = "select * from teacher where is_check=1 and is_admin=0  order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //获取该老师的详细信息
    public function get_teacher_msg($id)
    {
        $sql = "select * from teacher where id='$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //获取该老师的证书荣誉
    public function get_teacher_honor($id)
    {
        $sql = "select * from honor where person='$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //获取该老师发布的所有课程
    public function get_teacher_class($id)
    {
        $sql = "select * from tea_class where t_id='$id' and  c_check=1 order by c_id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //获取一个课程的详细信息
    public function classMsg($id)
    {
        $sql = "select * from tea_class where c_id='$id'and   c_check=1 order by c_id desc";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //获取该老师的所有评价
    public function get_teacher_comment($id)
    {
        $sql = "select * from comment,student where comm_tea='$id' and student.id=comment.comm_user order by comm_id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

//获取被点赞的聊天信息
    public function get_comment_info($c_id)
    {
        $sql = "select * from comment where comm_id='$c_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

//查询在add_good_info 中是否有当前项的信息
    public function get_add_good_info($c_id)
    {
        $sql = "select * from add_good_info where comm_id='$c_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

//更新add_good_info数据库中的指定评论项点赞状态
    public function update_add_good_info($c_id, $state)
    {
        $sql = "update add_good_info set add_good_state='$state' where comm_id='$c_id'";
        $this->db->query($sql);
    }

//新增add_good_info数据库中的指定评论项点赞状态
    public function insert_add_good_info($c_id,$comm_user,$comm_tea,$account_id,$identify,$state)
    {
        $sql = "insert into add_good_info(comm_id,comm_user,comm_tea,add_good_user,add_good_identify,add_good_state) values('$c_id','$comm_user','$comm_tea','$account_id','$identify','$state')";
        $query = $this->db->query($sql);
    }

    //点赞功能
    public function add_good($c_id, $good_times)
    {
        $sql = "update comment set comm_good='$good_times' where comm_id='$c_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    //发表评论功能
    public function add_comment($s_id, $t_id, $c_content)
    {
        $sql = "insert into comment(comm_user,comm_tea,comm_content,comm_time) values('$s_id','$t_id','$c_content',now())";
        $query = $this->db->query($sql);
        return $query;
    }

    //学生检测是否已经选取该课程
    public function get_join_class($c_id, $s_id)
    {
        $sql = "select * from join_class where c_id='$c_id' and s_id='$s_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //选取该老师的课程
    public function join_class($c_id, $s_id, $t_id, $t_name, $c_subject, $start_time, $end_time, $c_address, $t_tel)
    {
        // 选课人数加一
        $sql = "update tea_class set c_num=c_num+1 where c_id='$c_id' and  c_check=1";
        $this->db->query($sql);
//选取课程
        $sql = "insert into join_class(c_id,s_id,t_id,t_name,c_subject,join_time,start_time,end_time,c_address,t_tel,j_state) values('$c_id','$s_id','$t_id','$t_name','$c_subject',now(),'$start_time','$end_time','$c_address','$t_tel','3')";
        $query = $this->db->query($sql);
        return $query;
    }

    //老师发布课程
    public function add_class($id, $name, $grade, $subject, $describe, $price, $method, $time, $end_time, $c_try, $address, $tel)
    {
        $sql = "insert into tea_class(t_id,c_name,c_grade,c_subject,c_describe,c_price,c_method,c_try,c_time,start_time,end_time,c_address,t_tel) values('$id','$name','$grade','$subject','$describe','$price','$method','$c_try',now(),'$time','$end_time','$address','$tel')";
        $query = $this->db->query($sql);
        return $query;
    }

    //检验要删除的课程是否有学生报名
    public function checkJoinClass($c_id)
    {
        $sql = "select j_id from join_class where c_id = '$c_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //老师删除他发布的一个课程
    public function delClass($c_id)
    {
        $sql = "delete from tea_class where c_id='$c_id' ";
        $query = $this->db->query($sql);
        return $query;
    }

    //老师上传证件，照片
    public function honor_updata($t_id, $h_content, $h_time, $img_path)
    {
        $sql = "insert into honor(person,honor_time,honor_medal,honor_img) values('$t_id','$h_time','$h_content','$img_path')";
        $query = $this->db->query($sql);
        return $query;
    }

    //退课功能
    public function sign_out_class($c_id, $s_id)
    {
        // 选课人数减一
        $sql = "update tea_class set c_num=c_num-1 where c_id='$c_id'and  c_check=1";
        $this->db->query($sql);
        $sql = "delete from join_class where c_id='$c_id' and s_id='$s_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    // 获取该学生关注的所有老师
    public function get_Focus($s_id)
    {
        $sql = "select * from attention where s_id='$s_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //检测是否已经关注该老师
    public function get_teacher_focus($s_id, $t_id)
    {
        $sql = "select * from attention where s_id='$s_id' and t_id='$t_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //取消关注该老师
    public function del_teacher_focus($s_id, $t_id)
    {
        $sql = "update student set attention_num=attention_num-1 where id='$s_id'";
        $this->db->query($sql);
        $sql = "delete from attention where s_id='$s_id' and t_id='$t_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    //关注该老师
    public function add_teacher_focus($s_id, $t_id)
    {
        $sql = "update student set attention_num=attention_num+1 where id='$s_id'";
        $this->db->query($sql);
        $sql = "insert into attention(s_id,t_id) values('$s_id','$t_id')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function teacher_sex_area($sex, $area)
    {
        $sql = "select * from teacher where sex like '%$sex%' and teacher.area like '%$area%' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function teacher_filter($grade, $sex, $education, $dowell)
    {
        $sql = "select * from teacher where grade like '%$grade%' and sex like '%$sex%' and xueli like '%$education%' and dowell like '%$dowell%' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
}