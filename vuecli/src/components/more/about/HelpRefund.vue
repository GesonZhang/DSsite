<template>
  <div id="help-pay" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>五、授课者发布课程</h3>
        <p>授课者可以在本平台进行课程发布，展示自己优秀的一面，以便顺利的同用户进行沟通。本平台不允许同一课程同期多次发布，同时为了保证课程质量，课程发布将会通过管理员审核。</p>
        <p>在课程发布申请提交后，管理员将根据授课者的个人信息和课程申请的状态进行人工判定，审核结果将会通过系统信息的方式发送给授课者，请授课者在发布课程后的一段时期内关注系统信息提示。</p>
        <p>提示：完善个人信息和详细描述发布的课程的内容等参数，将会大大提高课程申请成功的通过率。</p>
    </div>
    <!--<div id="container">-->
      <!--<div class="content">-->
        <!--<p><img src="../../../assets/img/24_01课程前标记_blue.png" alt="">班课退款</p>-->
      <!--</div>-->
      <!--<div class="content">-->
        <!--<p><img src="../../../assets/img/24_01课程前标记_blue.png" alt="">一对一、家教付款</p>-->
      <!--</div>-->
    <!--</div>-->
    <div id="footer">
      <router-link to="/more/about/helporder">
        <p>上一条</p>
      </router-link>
      <router-link to="/more/about/helpabout">
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
  }  #header p{
         text-indent:4px;
         margin: 4px 12px;
     }
  #container{
    padding-top: 1rem;
  }
  .content p{
    background: #f0f0f0;
    line-height: 0.6rem;
    padding-left: 0.4rem;
  }
  .content img{
    width: 0.2rem;
    margin-top: 0.2rem;
    margin-right: 0.1rem;
  }
  #footer{
    height: 1rem;
    display: flex;
    width: 100%;
    position: fixed;
    bottom: 0;
    background-color: #f0f0f0;
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
