<template>
    <div id="teacher-msg">
        <div id="header">
            <img src="/static/img1/23icn_back_gray .png" alt="" @click="back">
            <ul id="nav">
                <li>
                    <router-link :to="'/teacher-msg/real/'+index">简介</router-link>
                </li>
                <li>
                    <router-link :to="'/teacher-msg/class/'+index">课程</router-link>
                </li>
                <li>
                    <router-link :to="'/teacher-msg/eva/'+index">评价</router-link>
                </li>
            </ul>
            <h4 @click='indexPage()'>首页</h4>
        </div>
        <router-view></router-view>

        <div id="footer">
            <div @click="flag2=!flag2">
                <img src="/static/img1/25客服.png" alt="">
                <p>客服</p>
            </div>
            <div class="focus" @click='focus' v-if='flag'>
                <img src="/static/img1/27_01关注-.png" alt="">
                <p>关注</p>
            </div>
            <div class="focus" @click='focus' v-if='flag1'>
                <img src="/static/img1/27_02已关注.png" alt="">
                <p>已关注</p>
            </div>
            <button @click='flag3=!flag3'>立即报名</button>
        </div>
        <!-- 弹层图片开始 -->
        <div id="tancen-img" v-if='flag2'>
            <div class="tancen-img">
                <div class="top">
                    <p>13234663825</p>
                </div>
                <div class="bottom">
                    <div class="left" @click='flag2=false'>取消</div>
                    <div class="right" @click='flag2=false'><a href="tel:13764567708">呼叫</a></div>
                </div>
            </div>
        </div>
        <!-- 弹层图片开始结束 -->
        <!-- 弹层图片开始 新课程报名 -->
        <div id="tancen-img1" v-if='flag3'>
            <div class="tancen-img1">
                <div class="course">
                    <p><img src="../../assets/img/24_02课程前标记_green.png" alt="">课程</p>
                </div>
                <div class="teacher-apply" v-for='(msg,index) in $store.state.classList'>
                    <div class="left-apply">
                        <p>{{msg.c_subject}}</p>
                        <div class="teacher-audititn">
                            <span class="no-audition" v-if='!(Number(msg.c_try))' style='padding:0.05rem'>不试听</span>
                            <span class="audition" v-if='Number(msg.c_try)' style='padding:0.05rem'>可试听</span>
                            &nbsp;&nbsp;<span>{{msg.c_describe}}</span>
                        </div>
                    </div>
                    <div class="right-apply">
                        <span class="right-price">￥<span>{{msg.c_price}}</span>/小时</span>
                        <router-link :to="'/join-class/'+msg.c_id">
                            <button>报名</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!-- 弹层图片开始结束 -->
    </div>
</template>


<script>
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                index: this.$route.params.id,
                flag: true,
                flag1: false,
                flag2: false,
                flag3: false
            }
        },
        mounted: function () {
            if (localStorage.id) {
                Axios.get('http://localhost:3000/teacherFocus', {
                    params: {
                        s_id: localStorage.id,
                        t_id: this.index
                    }
                }).then((res) => {
                    if (res.data == 'success') {
                        this.flag = false;
                        this.flag1 = true;
                    } else {
                        this.flag = true;
                        this.flag1 = false;
                    }
                });
            }
            Axios.get('http://localhost:3000/teacherClass', {
                params: {
                    id: this.index
                }
            }).then((res) => {
                this.teacherClass = JSON.parse(res.data);
                this.$store.dispatch('classList', this.teacherClass);
            });
        },
        methods: {
            back: function () {
                history.go(-1);
            },
            service: function () {
            },
            indexPage: function () {
                location.assign('http://localhost:8080/education');
            },
            focus: function () {
                if (!localStorage.id) {
                    this.$message({
                        message: '请你先登录',
                        type: 'error',
                        duration: 1000
                    });
                } else if (localStorage.identify == '1') {
                    this.$message({
                        message: '抱歉，你不是学生',
                        duration: 1000
                    });
                }
                else {
                    Axios.get('http://localhost:3000/teacher_toggle_Focus', {
                        params: {
                            s_id: localStorage.id,
                            t_id: this.index
                        }
                    }).then((res) => {
                        if (res.data == 'add_focus') {
                            this.flag = false;
                            this.flag1 = true;
                        } else {
                            this.flag = true;
                            this.flag1 = false;
                        }
                    });
                }
            }
        },
        components: {
            // localStorage.id = JSON.parse(res.data).id;
            // localStorage.account = $account;
            // localStorage.password = $password;
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    #header a.router-link-exact-active {
        color: red;
        outline: none;
        text-decoration: none;
    }

    #teacher-msg {
        font-size: 0.2rem;
        color: #000;
    }

    #header {
        z-index: 10;
        width: 100%;
        position: fixed;
        height: 1rem;
        background: #31C37C;

    }

    #header img {

        height: 0.4rem;
        position: absolute;
        left: 0.2rem;
        top: 0.3rem;
    }

    #header ul {
        /*float: left;  */
        width: 4rem;
        margin: 0 auto;
        display: flex;
        height: 1rem;
    }

    #header ul li {
        color: #fff;
        font-size: 0.25rem;
        text-align: center;
        float: left;
        flex: 1;
        line-height: 1rem;
    }

    #header ul li a {
        color: #fff;
    }

    /*  #header ul li .router-ling-active{
      color: skyblue;
    }*/
    #header h4 {
        position: relative;
        top: -.65rem;
        right: -5.6rem;
        font-size: 0.25rem;
        color: #fff;
    }

    .banner img {
        width: 100%;
    }

    #footer {
        width: 100%;
        position: fixed;
        height: 1rem;
        text-align: center;
        display: flex;
        bottom: 0;
        background-color: #fff;
    }

    #footer img {
        width: 0.4rem;
        margin-top: 0.1rem;
    }

    #footer div {
        width: 1.8rem;
        float: left;
        border: 1px solid #ccc;
    }

    #footer button {
        flex: 1;
        outline: none;
        border: 0;
        background: #3e8f3e;
        color: #fff;
        font-size: 18px;
    }

    /*修改颜色 条条样式*/
    #tancen-img {
        color: #000;
        z-index: 15;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: rgba(100, 100, 100, 0.3);
    }

    .tancen-img {
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -2.2rem;
        margin-top: -1.2rem;
        width: 4.4rem;
        height: 2.4rem;
        border-radius: 0.3rem;
        overflow: hidden;
        background: #fff;
    }

    .tancen-img .top {
        border-bottom: 1px solid #000;
    }

    .tancen-img .top p {
        height: 1.5rem;
        line-height: 1.5rem;
        text-align: center;
        font-size: 0.4rem;
    }

    .tancen-img .bottom {
        display: flex;
        height: 0.9rem;
        line-height: 0.9rem;
        font-size: 0.3rem;
    }

    .tancen-img .bottom .left {
        border-right: 1px solid #000;
        text-align: center;
        color: skyblue;
        flex: 1;
    }

    .tancen-img .bottom .right {
        text-align: center;
        color: red;
        flex: 1;
    }

    #tancen-img1 {
        /*display: none;*/
        z-index: 15;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 1rem;
        background-color: rgba(100, 100, 100, 0.3);
    }

    .tancen-img1 {

        position: fixed;
        bottom: 1rem;
        width: 100%;

        border-radius: 0.3rem 0.3rem 0 0;
        overflow: hidden;
        background: #fff;
    }

    .course p {
        background: #f0f0f0;
        line-height: 1rem;
        padding-left: 0.4rem;
        height: 1rem;
    }

    .course img {
        width: 0.2rem;
        margin-top: 0.4rem;
        margin-right: 0.1rem;
    }

    .teacher-apply {
        padding-right: 0.1rem;
        border-bottom: 1px solid #ccc;
        clear: both;
        /*height: 1rem;*/
        background: #fff;
        display: flex;
    }

    .left-apply {
        padding: 0.2rem;
        width: 3.5rem;
    }

    .left-apply p {
        font-size: 16px;
    }

    .teacher-audition {
        font-size: 13px;
    }

    .audition {
        color: #f00;
        border: 1px solid #f00;
    }

    .no-audition {
        color: #00f;
        border: 1px solid #00f;
    }

    .right-apply {
        flex: 1;
        padding: 0.4rem 0;
        text-align: center;
    }

    .right-price span {
        color: #f00;
        font-size: 16px;
    }

    .right-apply .right-price {
        padding-right: 0.1rem;
    }

    .right-apply button {
        height: 0.4rem;
        width: 1.2rem;
        border: 0;
        border-radius: 10px;
        font-size: 18px;
        line-height: 0.4rem;
        color: #fff;
        background: #40AA63;
        outline: none;
    }

</style>
