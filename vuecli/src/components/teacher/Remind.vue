<!-- 系统消息  系统消息修改为课程选课审核信息。因当前没有后台管理，故暂时不会有系统管理员发布的相关信息提示。如需系统定时节假日相关信息，后期删改。 -->
  <template>
  <div id="message">
  <ul>
    <li v-for='info in infos'>
      <!--学生端登陆显示信息-->
      <!--等待审核-->
      <div class="content" v-if="info.j_state==3&&info.j_check==0&&ID==0">课程申请:您在{{info.join_time}}申请的{{info.t_name}}老师的{{info.c_subject}}课程，现正等待审核。</div>
        <!--审核通过-->
      <div class="content" v-if="info.j_check==1&&ID==0">课程申请:祝贺您，您在{{info.join_time}}申请的{{info.t_name}}老师的{{info.c_subject}}课程，现已通过审核。
        <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
      </div>
        <!--审核未通过-->
      <div class="content" v-if="info.j_check==2&&ID==0">课程申请:抱歉，您在{{info.join_time}}申请的{{info.t_name}}老师的{{info.c_subject}}课程，未通过审核。
        <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
      </div>
      <!--教师端登陆显示信息-->
      <!--审核请求-->
      <div class="content" v-if="info.j_state==3&&info.j_check==0&&ID==1">课程申请:祝贺您，{{info.name}}同学在{{info.join_time}}申请的您的{{info.c_subject}}课程，请前往 <router-link to="/more/delclassing">审核</router-link>。
        <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
      </div>
      <!--审核结果 通过-->
      <div class="content" v-if="info.j_check==1&&ID==1">课程申请:祝贺您，{{info.name}}同学在{{info.join_time}}申请的您的{{info.c_subject}}课程，您已通过其审核申请。
        <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
      </div>
      <!--审核结果 拒绝-->
      <div class="content" v-if="info.j_check==2&&ID==1">课程申请:{{info.name}}同学在{{info.join_time}}申请的您的{{info.c_subject}}课程，您未通过其审核申请。
        <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->

      </div>
      <div class="time">{{info.j_checktime}}</div>
    </li>
  </ul>
      <div style="padding:.1rem .2rem 0;">
          <!--注册审核结果 通过审核-->
          <div class="content" v-if="is_check==1&&ID==1" style="border-bottom:1px solid #ccc;">注册申请:您于{{join_time}}提交的注册申请已通过审核，现您可以<router-link to="/more/addclass">发布课程</router-link>了。
              <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
              <p style="text-align:right;">{{is_checktime}}</p>
          </div>
          <!--注册审核结果 待审核-->
          <div class="content" v-if="is_check==2&&ID==1" style="border-bottom:1px solid #ccc;">注册申请:您于{{join_time}}提交的注册申请未通过，为顺利通过审核，请您尽快前往个人中心右上角编辑标志处完善个人信息。
              <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
              <p style="text-align:right;">{{is_checktime}}</p>
          </div>
          <!--注册审核结果 待审核-->
          <div class="content" v-if="is_check==0||is_check==1&&ID==1" style="border-bottom:1px solid #ccc;">注册申请:您于{{join_time}}提交的注册申请正待审核，为顺利通过审核，请您尽快前往个人中心右上角编辑标志处完善个人信息。
              <!--<span v-if="flag" class="glyphicon glyphicon-fire" style="color: red;"></span>-->
          </div>
      </div>
  </div>
</template>
<script>
  import MessageNav from './MessageNav'
  import Axios from 'axios'
  export default {
    data() {
      return {
          ID:localStorage.identify,
          flag:true,
        infos:[],
          is_check:0,
          join_time:'',
          is_checktime:''
      }
    },
    components: {
      MessageNav
    },
    mounted(){
//      Axios.get('http://localhost:3000/index_system_message').then((res)=>{
//        // console.log(res.data);
//        this.infos=JSON.parse(res.data);
//      })
//        获取选课结果
//        当前用户为学生
        if(localStorage.identify==0){
            //选课
            Axios.get('http://localhost:3000/select_class_message_s',{
                params:{
                    s_id:localStorage.id,
                }
            }).then((res)=>{
                this.infos=JSON.parse(res.data);
            })
        }else{
//            当前用户为教师
            //选课
            Axios.get('http://localhost:3000/select_class_message_t',{
                params:{
                    t_id:localStorage.id,
                }
            }).then((res)=>{
                this.infos=JSON.parse(res.data);
            })
            //注册
            Axios.get('http://localhost:3000/reg_message_t',{
                params:{
                    t_id:localStorage.id,
                }
            }).then((res)=>{
                var data = JSON.parse(res.data)[0];
                this.is_check = data.is_check;
                this.is_checktime = data.is_checktime;
                this.join_time = data.join_time;
//                this.infos=JSON.parse(res.data);
            })
        }
    }
  }
</script>

<style scoped>
  @import "../../assets/css/reset.css";
  #message{
    padding-top: 1.8rem;
  }
  #message li {
    padding: .1rem .2rem 0;
  }
  .content{
    text-indent: 10px;
  }
  .time{
    padding-right: .2rem;
    text-align: right;
    border-bottom: 1px solid #ccc;
  }
</style>
