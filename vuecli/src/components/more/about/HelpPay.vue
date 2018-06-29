<template>
  <div id="help-pay" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>三、付款</h3>
    </div>
    <div id="container">
      <div class="content">
        <p><img src="../../../assets/img/24_01课程前标记_blue.png" alt="">班课付款</p>
      </div>
      <div class="content">
        <p><img src="../../../assets/img/24_01课程前标记_blue.png" alt="">一对一、家教付款</p>
      </div>
    </div>
    <div id="footer">
      <router-link to="/more/about/helpclass">
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
