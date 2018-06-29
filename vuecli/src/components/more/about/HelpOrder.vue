<template>
  <div id="help-order" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>四、授课者-注册审核</h3>
        <p>授课者处于其身份的特殊性和平台为了保证整体的良好优质运作，对于授课者采取审核注册制度。</p>
        <p>授课者在注册成为授课者用户后，其信息会递交到后台管理员处，管理员会对授课者提交的信息进行人工审核，同时会通过电话等方式进行沟通，以保证信息的真实有效。</p>
        <p>为保证注册审核的快速通过，请在注册后尽快前往个人中心进行信息的完善，并保证备案电话的畅通。谢谢合作。</p><p>
       注意： 只有审核通过后才可以发布新的课程。
    </p>
    </div>
    <div id="footer">
      <router-link to="/more/about/helpeva">
        <p>上一条</p>
      </router-link>
      <router-link to="/more/about/helprefund">
        <p>下一条</p>
      </router-link>
    </div>
  </div>

</template>


<script>
  import $ from 'jquery'


  export default {
    data() {
      return {

      }
    },
    mounted:function(){

    },
    methods:{
      back:function(){
        history.go(-1);
      }
    },
    components:{

    }
  }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  @import "../../../assets/css/reset.css";
  #header{
    width: 100%;
    position: fixed;
    height: 1rem;
    background: #2c93e0;
  }
  #header img{
    height: 0.4rem;
    position:absolute;
    left: 0.2rem;
    top: 0.3rem;
  }
  #header h3{
    text-align: center;
    color: #fff;
    line-height: 1rem;
  }
  #footer{
    height: 1rem;
    display: flex;
    width: 100%;
    position: fixed;
    bottom: 0;
    background-color: #f0f0f0;
  }  #header p{
         text-indent:4px;
         margin: 4px 12px;
     }
  #footer p{
    color: #0066FF;
    font-size: 16px;
    text-align: center;
    line-height: 1rem;
    border: 1px solid #ccc;
  }
  #footer p:nth-child(1){
    flex: 1;
  }
  #footer p:nth-child(2){
    flex: 1;
  }
  a{
    color: #0066FF;
    display: block;
    width: 100%;
  }
</style>
