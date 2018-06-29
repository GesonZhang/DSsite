<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('teacher_model');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
        header('Access-Control-Allow-Headers:X-Requested-With,Content-Type');
    }

    //加载老师列表
    public function teacher_list()
    {
        $result = $this->teacher_model->get_all_teacher();
        echo json_encode($result);
    }

    public function teacherMsg()
    {
        $id = $this->input->get('id');
        $result = $this->teacher_model->get_teacher_msg($id);
        echo json_encode($result);
    }

    //获取该老师获得的荣誉表
    public function teacherHonor()
    {
        $id = $this->input->get('id');
        $result = $this->teacher_model->get_teacher_honor($id);
        echo json_encode($result);
    }

    //获取该老师发布的课程表
    public function teacherClass()
    {
        $id = $this->input->get('id');
        $result = $this->teacher_model->get_teacher_class($id);
        echo json_encode($result);
    }

    //获取一个课程的详细信息
    public function classMsg()
    {
        $id = $this->input->get('id');
        $result = $this->teacher_model->classMsg($id);
        echo json_encode($result);
    }

    //老师删除他发布的一个课程前判断是否有学生报名
    public function checkJoinClass()
    {
        $c_id = $this->input->get('c_id');
        $result = $this->teacher_model->checkJoinClass($c_id);//检验是否有学生报名
        echo json_encode($result);
    }

    //老师删除他发布的一个课程
    public function delClass()
    {
        $c_id = $this->input->get('c_id');
        $result = $this->teacher_model->delClass($c_id);
        echo json_encode($result);
    }

    //检测是否选取该课程
    public function yes_no_join()
    {
        $c_id = $this->input->post('c_id');
        $s_id = $this->input->post('s_id');
        $result = $this->teacher_model->get_join_class($c_id, $s_id);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    //选取该老师的课程
    public function joinClass()
    {
        $c_id = $this->input->post('c_id');
        $s_id = $this->input->post('s_id');
        $t_id = $this->input->post('t_id');
        $t_name = $this->input->post('t_name');
        $c_subject = $this->input->post('c_subject');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $c_address = $this->input->post('c_address');
        $t_tel = $this->input->post('t_tel');
        $result = $this->teacher_model->get_join_class($c_id, $s_id);
        if ($result) {
            // 取消选课
            $this->teacher_model->sign_out_class($c_id, $s_id);
            echo "out";
        } else {
            // 选课
            $this->teacher_model->join_class($c_id, $s_id, $t_id, $t_name, $c_subject, $start_time, $end_time, $c_address, $t_tel);
            echo 'join';
        }
    }

    //老师发布课程
    public function addClass()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $grade = $this->input->post('grade');
        $subject = $this->input->post('subject');
        $describe = $this->input->post('describe');
        $price = $this->input->post('price');
        $method = $this->input->post('method');
        $time = $this->input->post('time');
        $end_time = $this->input->post('end_time');
        $c_try = $this->input->post('c_try');
        $address = $this->input->post('address');
        $tel = $this->input->post('tel');
        $result = $this->teacher_model->add_class($id, $name, $grade, $subject, $describe, $price, $method, $time, $end_time, $c_try, $address, $tel);
        if ($result) {
            echo "success";
        } else {
            // 选课
            echo 'fail';
        }
    }

    //上传证件，照片
    public function do_upload()
    {
        $config['upload_path'] = './uploads/honor/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
        } else {
            $data = array('data' => $this->upload->data());
            $t_id = $this->input->post('t_id');
            $h_content = $this->input->post('content');
            $h_time = $this->input->post('h_time');
            $path = $data['data']['file_name'];
            $img_path = 'http://127.0.0.1/ttyk/phpci/uploads/honor/' . $path;
            $result = $this->teacher_model->honor_updata($t_id, $h_content, $h_time, $img_path);
            if ($result) {
                $result = $this->teacher_model->get_teacher_honor($t_id);
                echo json_encode($result);
            } else {
                echo 'fail111';
            }
        }
    }

    //获取关于该老师所有的评论
    public function teacherComment()
    {
        $id = $this->input->get('id');
        $result = $this->teacher_model->get_teacher_comment($id);
        echo json_encode($result);
    }

    //检测add_good_info 是否存在当前用户当前项的点赞信息。
    public function get_add_good_info()
    {
        $c_id = $this->input->get('id');
        $result = $this->teacher_model->get_add_good_info($c_id);
        echo json_encode($result);
    }

    //关于该老师的评论点赞功能
    public function addGood()
    {
        $c_id = $this->input->get('c_id');
        $good_times = $this->input->get('good_times');
        $state = $this->input->get('state');
        $account_id = $this->input->get('accountId');
        $identify = $this->input->get('identify');
        //get info of comment
        $info = $this->teacher_model->get_comment_info($c_id);
        $comm_user = $info->comm_user;
        $comm_tea = $info->comm_tea;
        //检测add_good_info 是否存在当前用户当前项的点赞信息。
        $infos = $this->teacher_model->get_add_good_info($c_id);
        if ($infos) {
            //更新当前项的点赞状态
            $this->teacher_model->update_add_good_info($c_id, $state);
        } else {
            //新增当前评论项的点赞到数据库中
            $this->teacher_model->insert_add_good_info($c_id, $comm_user, $comm_tea, $account_id, $identify, $state);
        }
        $result = $this->teacher_model->add_good($c_id, $good_times);
        echo json_encode($result);
    }

    //学生对老师发表评论
    public function add_comment()
    {
        $s_id = $this->input->post('s_id');
        $t_id = $this->input->post('t_id');
        $c_content = $this->input->post('c_content');
        $result = $this->teacher_model->add_comment($s_id, $t_id, $c_content);
        if ($result) {
            $result = $this->teacher_model->get_teacher_comment($t_id);
            echo json_encode($result);
        } else {
            echo '评论失败';
        }
    }

    //获取该学生的关注表
    public function get_Focus()
    {
        $s_id = $this->input->get('s_id');
        $result = $this->teacher_model->get_Focus($s_id);
        echo json_encode($result);
    }

    //检测是否关注该老师
    public function teacher_focus()
    {
        $s_id = $this->input->post('s_id');
        $t_id = $this->input->post('t_id');
        $result = $this->teacher_model->get_teacher_focus($s_id, $t_id);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    //关注老师和取消关注老师
    public function teacher_toggle_focus()
    {
        $s_id = $this->input->post('s_id');
        $t_id = $this->input->post('t_id');
        $result = $this->teacher_model->get_teacher_focus($s_id, $t_id);
        if ($result) {
            //如果已经关注则取消关注该老师
            $this->teacher_model->del_teacher_focus($s_id, $t_id);
            echo "del_focus";
        } else {
            //如果没有关注该老师则关注该老师
            $this->teacher_model->add_teacher_focus($s_id, $t_id);
            echo "add_focus";
        }
    }

    //通过性别 活动区域筛选老师
    public function teacher_sex_area()
    {
        $sex = $this->input->post('sex_id');
        $area = $this->input->post('area_id');
        $result = $this->teacher_model->teacher_sex_area($sex, $area);
        echo json_encode($result);
    }

    public function teacher_filter()
    {
        $grade = $this->input->post('grade_id');
        $sex = $this->input->post('sex_id');
        $education = $this->input->post('education_id');
        $dowell = $this->input->post('dowell_id');
        $result = $this->teacher_model->teacher_filter($grade, $sex, $education, $dowell);
        echo json_encode($result);
    }

}
