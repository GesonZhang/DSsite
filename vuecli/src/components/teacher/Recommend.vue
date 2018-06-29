<!-- 留言与消息 -->
<template>
    <div id="message">
        <ul>
            <li v-if="ID==0" class="content-box" v-for='chat in chatlist' style="border-bottom:1px solid #2e6da4;">
                <div class="left">
                    <div>
                        <img :src="'../../..'+chat.timg" alt="" v-show='flag'>
                    </div>
                </div>
                <div class="mid">{{chat.tname}}：{{chat.ccomm_content}}
                    <button class="repeat-chat" style="outline: none;border: 0;">回复</button>
                </div>
                <div class="right">
                    {{chat.ccomm_time}}
                    <img src="../../../static/teaImg/2.jpg" alt="" v-show='!flag'>
                </div>
            </li>
            <li v-if="ID==1" class="content-box" v-for='chat in chatlist' style="border-bottom:1px solid #2e6da4;">
                <div class="left">
                    <div>
                        <img :src="'../../..'+chat.simg" alt="" v-show='flag'>
                    </div>
                </div>
                <div class="mid">{{chat.sname}}：{{chat.ccomm_content}}</div>
                <div class="right">
                    {{chat.ccomm_time}}
                    <img src="../../../static/teaImg/2.jpg" alt="" v-show='!flag'>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    import MessageNav from './MessageNav'
    import Axios from "axios"
    import $ from 'jquery'

    export default {
        data() {
            return {
                ID: localStorage.identify,
                flag: true,
                chatlist: '',
                pre: "../../.."
            }
        },
        components: {
            MessageNav
        },
        mounted() {
//      Axios.get('http://localhost:3000/index_recommend',{params:{
//        student_id:localStorage.id
//      }}).then((res)=>{
//        console.log(JSON.parse(res.data));
//        this.chatlist=JSON.parse(res.data);
//      })
            console.log(localStorage.id+'*******'+localStorage.identify)
            Axios.get('http://localhost:3000/index_recommend_list', {
                params: {
                    user_id: localStorage.id,
                    user_identify: localStorage.identify
                }
            }).then((res) => {console.log(JSON.parse(res.data));
                this.chatlist = JSON.parse(res.data);
            })
        }
    }
</script>

<style scoped>
    @import "../../assets/css/reset.css";

    #message {
        padding-top: 1.8rem;
    }

    .content-box {
        overflow: hidden;
        margin-top: .2rem;
    }

    .content-box > div {
        float: left;
        padding: .2rem 0;

    }

    .content-box .left, .content-box .right {
        width: 1.2rem;
        height: 1.2rem;
        text-align: center;
        /*background: #ccc;*/

    }

    .left > div {
        width: .8rem;
        height: .8rem;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
    }

    .left img {
        /*height: 100%;*/
        width: 100%;
    }

    .content-box .mid {
        width: 4rem;
        /*background: #ccc;*/
        text-indent: 10px;
    }
</style>
