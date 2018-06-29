<template>
  <div id="teacher-class" >

    <div id="header">
      <img src="../../../assets/img/back.png" alt="" @click="back">
      <h3>关于我们</h3>
    </div>
    <div id="about-us">
      <div class="about-container">
        <div id="about-logo">
          <img src="../../../assets/img/shishuologo.png" alt="">
          <h5>1.0.0版本</h5>
        </div>
        <div id="about-code">
          <img src="../../../assets/img/关于我们.png" alt="">
          <h5>扫一扫了解更多</h5>
        </div>
      </div>
      <div class="about-content">
        <div class="content">
          <router-link to="/more/about/aboutserver">
            <p>用户服务协议 <i class="more-in glyphicon glyphicon-chevron-right"></i></p>
          </router-link>
        </div>
        <div class="content">
          <router-link to="/more/about/abouthelp">
            <p>使用帮助 <i class="more-in glyphicon glyphicon-chevron-right"></i></p>
          </router-link>
        </div>
        <div class="content">
          <router-link to="/more/about/aboutcontact">
            <p>联系我们 <i class="more-in glyphicon glyphicon-chevron-right"></i></p>
          </router-link>
        </div>
        <div class="content">
          <p>检查更新 <i class="more-in glyphicon glyphicon-chevron-right"></i></p>
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
    padding-top: 0.4rem;
    background: #f0f0f0;
    position: absolute;
    top: 1rem;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
  }
  .about-container{
    margin-bottom: 0.3rem;
  }
  #about-logo{
    width: 4rem;
    margin: 0 auto;
    border-bottom: 1px solid #ccc;
  }
  #about-logo img{
    width: 1.5rem;
    height: 1.5rem;
    /*margin: 0 auto;*/
    /*display: block;*/
  }
  #about-logo h5{
    padding-top: 0.2rem;
    padding-bottom: 0.2rem;
  }
  #about-code{
    margin-top: 0.3rem;
  }
  #about-code img{
    width: 1.5rem;
    height: 1.5rem;
  }
  #about-code h5{
    margin-top: 0.1rem;
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
    color: #000;
    border-bottom: 1px solid #ccc;
    padding-left: 0.2rem;
    height: 0.8rem;
    line-height: 0.8rem;
  }
  .more-in{
    float: right;
    line-height: 0.8rem;
    padding-right: 0.1rem;
    color: #777;
  }
</style>
