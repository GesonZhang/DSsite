<template>
  <div id="help-flow" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>一、用户-选课流程</h3>
        <p>用户登陆后，在对本APP有一个整体了解之后，开始选择课程：</p>
        <p>一：通过区域、性别、年级等初步筛选适合自己的授课者。</p>
        <p>二：查看适合自己的授课者详细信息及获奖情况。</p>
        <p>三：同授课者进行线上沟通后，，可通过电话等渠道进一步了解核实。</p>
        <p>四：申请该授课者的课程，等待授课者审核通过。</p>
    </div>
    <div id="footer">
      <router-link to="/more/about/helptable">
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
  #header p{
      text-indent:4px;
      margin: 4px 12px;
  }
  #footer{
    height: 1rem;
    display: flex;
    width: 100%;
    position: fixed;
    bottom: 0;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
  }
  a{
    color: #0066FF;
    display: block;
    width: 100%;
  }
  #footer p{
    width: 100%;
    font-size: 16px;
    text-align: center;
    line-height: 1rem;
  }
</style>
