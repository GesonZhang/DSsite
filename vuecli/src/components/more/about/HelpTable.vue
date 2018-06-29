<template>
  <div id="help-table" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>二、用户-我的课程表</h3>
        <p>用户点击课程表标签卡即可进入课程表展示区域。在标签卡处分为三大板块，分别为正在上课，等待上课，已结束。具体如下：</p>
        <p>正在上课：在此标签卡内展示当前用户正在进行的课程，如有多个课程则会在当前页面内以标签卡形式进行排列。</p>
        <p>等待上课：在此标签卡内展示当前用户通过报名审核，但尚未进行的课程，如有多个课程则会在当前页面内以标签卡形式进行排列。</p>
        <p>已结束：在此标签卡内展示当前用户已经学习结束的课程，如有多个课程则会在当前页面内以标签卡形式进行排列。</p>
    </div>
    <div id="footer">
      <router-link to="/more/about/helpflow">
        <p>上一条</p>
      </router-link>
      <router-link to="/more/about/helpeva">
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
