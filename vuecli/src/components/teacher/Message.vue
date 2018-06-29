<template>
  <div id="message">
    <div class="header">
      <div class="back">
        <img @click='goback()' src="../../assets/img/back.png" alt="">
      </div>
      <h1>消息</h1>
  </div>
    <message-nav></message-nav>
    <router-view></router-view>
  </div>
</template>
<script>
  import MessageNav from './MessageNav'
  export default {
    data() {
      return {

      }
    },
    components: {
      MessageNav
    },
    methods:{
      goback:function(){
        history.go(-1);
      }
    }
  }
</script>

<style scoped>
  @import "../../assets/css/reset.css";
  html{
    background:#f5f5f5;
  }
  #message .header{
    height:1rem;
    background: deepskyblue;
    color:#fff;
    position: fixed;
    top:0;
    width: 100%;
    line-height: 1rem;
    text-align: center;
    display: flex;
  }
  #message .header h1{
    flex:2;
    text-indent: -0.5rem;
    font-size: 0.4rem;
    line-height: 1rem;
  }
  #message .header .back{
    height: 0.4rem;
    width: 0.4rem;
    text-align: center;
    line-height: 1rem;
    float: right;
    margin-top: 0.3rem;
    margin-left: 0.1rem;
  }

</style>
