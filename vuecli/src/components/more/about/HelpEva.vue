<template>
  <div id="help-table" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>三、评价</h3>
        <p>评价功能是提供给普通用户对授课者进行评价以供其他用户进行参考的功能模块。</p>
        <p>评价功能是在最大程度上将自己的体验展示给其他用户，以方便其他用户更好更快的进行选择，所以希望用户在评价时，保证真实中肯，谢谢。</p>
        <p>为保证合理良性发展，原则上禁止授课者对授课者进行评价。</p>
    </div>
    <div id="footer">
      <router-link to="/more/about/helptable">
        <p>上一条</p>
      </router-link>
      <router-link to="/more/about/helporder">
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
