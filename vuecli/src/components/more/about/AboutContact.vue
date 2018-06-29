<template>
  <div id="about-contact" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>关于我们</h3>
    </div>
    <div id="about-us">
      <div class="about-container">
        <div id="about-logo">
          <img src="../../../assets/img/shishuologo.png" alt="">
          <h4>师说客户端</h4>
        </div>
      </div>
      <div class="about-content">
        <div class="content">
          <p>客服热线 <span>400-888-8888&nbsp;&nbsp;&nbsp;&nbsp;<i class="more-in glyphicon glyphicon-chevron-right"></i></span></p>
        </div>
        <div class="content">
          <p>官方网址 <span>www.shishuo.cn&nbsp;&nbsp;&nbsp;&nbsp;<i class="more-in glyphicon glyphicon-chevron-right"></i></span></p>
        </div>
        <div class="content">
          <p>微信公众号 <span>师说&nbsp;&nbsp;&nbsp;&nbsp;<i class="more-in glyphicon glyphicon-chevron-right"></i></span></p>
        </div>
      </div>
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
  #about-us{
    padding-top: 0.5rem;
    background: #f0f0f0;
    position: absolute;
    top: 1rem;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
  }
  .about-container{
    margin-bottom: 0.2rem;
  }
  #about-logo{
    width: 4rem;
    margin: 0 auto;
  }
  #about-logo img{
    width: 2rem;
    height: 2rem;
    /*margin: 0 auto;*/
    /*display: block;*/
  }
  #about-logo h4{
    padding-top: 0.3rem;
    padding-bottom: 0.4rem;
  }
  a{
    color: #000;
  }
  .about-content{
    text-align: left;
    font-size: 15px;
    background: #fff;
  }
  .content{
    border-bottom: 1px solid #ccc;
    padding-left: 0.2rem;
    height: 0.8rem;
    line-height: 0.8rem;
  }
  .content span{
    float: right;
  }
  .more-in{
    float: right;
    line-height: 0.8rem;
    padding-right: 0.1rem;
    color: #777;
  }
</style>
