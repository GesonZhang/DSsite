<template>
  <div id="message-nav">
    <ul>
      <li class="nav-two"><router-link to="/message/remind">系统提醒</router-link></li>
      <li class="nav-two"><router-link to="/message/recommend">留言与消息</router-link></li>
      <!-- <li class="nav-two"><router-link to="/message/discounts">优惠活动</router-link></li> -->
    </ul>
  </div>
</template>

<script>
  import $ from 'jquery'

  export default {
    data() {
      return {

      }
    },
//  mounted(){
//        $('.nav-two').on('click',function(){
//          $('.nav-two').attr('border-bottom','1px solid blue');
//        })
//    }
  }
</script>

<style scoped>
  @import "../../assets/css/reset.css";
  /*html{*/
    /*background:#f5f5f5;*/
  /*}*/
  #message-nav{
    height:0.8rem;
    background: #fff;
    color:#ccc;
    position: fixed;
    top:1rem;
    width: 100%;
  }
  #message-nav ul{
    display: flex;
  }
  #message-nav li{
    flex: 1;
    line-height: 0.8rem;
    text-align: center;
    font-size: 0.25rem;
  }
  #message-nav li a{
    display: block;
    width: 100%;
    height: 100%;
    color: #ccc;
    outline: none;
    text-decoration: none;
    /*text-align: none;*/
  }
  #message-nav li a.router-link-active{
    color:deepskyblue;
    border-bottom: 1px solid deepskyblue;
  }


</style>
