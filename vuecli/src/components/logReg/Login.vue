<template>
    <div id="login">
        <div class="header">
            <div class="back">
                <router-link to="/more"><img src="../../assets/img/back.png" alt=""></router-link>
            </div>
            <h1>登录</h1>
            <div class="reg">
                <router-link to="/reg">注册</router-link>
            </div>
        </div>
        <div class="logo">
            <img src="../../assets/img/shishuologo.png" alt="">
        </div>
        <div class="login-content">
            <img src="../../assets/img/accountuser.png" alt="">
            <input type="text" placeholder="请输入用户名" id="account">
            <img src="../../assets/img/password.png" alt="">
            <input type="password" placeholder="请输入密码" id="password">
            <div class="forget">
                <!--<router-link to="/forgetpass">忘记密码？</router-link>-->
            </div>
            <input type="button" value="登录" class="log-btn" @click="login()">
        </div>
    </div>
</template>

<script>
    import Axios from 'axios'
    import $ from 'jquery'

    export default {
        data() {
            return {
                nowTime: new Date().getTime()
            }
        },
        methods: {
            changeTime(starttime) {
                //starttime ='2012-12-25 20:17:24';
                var starttime = String(starttime).replace(new RegExp("-", "gm"), "/");
                return new Date(starttime).getTime(); //得到毫秒数
            },
            login() {
                var $account = $('#account').val();
                var $password = $('#password').val();
                Axios.get('http://localhost:3000/users/login', {
                    params: {
                        account: $account,
                        password: $password
                    }
                }).then((res) => {
                    if (res.data != "null") {
                        console.log(JSON.parse(res.data))
                        localStorage.id = JSON.parse(res.data).id;
                        localStorage.account = $account;
                        localStorage.password = $password;
                        localStorage.identify = JSON.parse(res.data).identify;
                        localStorage.name = JSON.parse(res.data).name;
                        localStorage.phone = JSON.parse(res.data).phone;
                        localStorage.isCheck = JSON.parse(res.data).is_check;
                        localStorage.is_admin = JSON.parse(res.data).is_admin;
                        //登录后，自动检测课程相关信息，更新相关数据库信息
                        Axios.get('http://localhost:3000/get_tea_class_msg').then((res) => {
                            var _this = this;
                            JSON.parse(res.data).forEach(function (o, i) {
                                var start_time = _this.changeTime(o.start_time);
                                var end_time = _this.changeTime(o.end_time);
                                if (o.c_check == 1) {
                                    if (_this.nowTime < start_time) { //当前时间小于开始时间，课程未开始
                                        Axios.get('http://localhost:3000/update_tea_class_msg', {
                                            params: {
                                                state: 0,
                                                c_id: o.c_id
                                            }
                                        }).then((res) => {
                                            console.log('0')
                                        })
                                    } else if (_this.nowTime >= end_time) { //当前时间大于结束时间，课程已结束
                                        Axios.get('http://localhost:3000/update_tea_class_msg', {
                                            params: {
                                                state: 2,
                                                c_id: o.c_id
                                            }
                                        }).then((res) => {
                                            console.log('-----1')
                                        })
                                    } else if (_this.nowTime >= start_time && _this.nowTime < end_time) { //课程正在进行中
                                        Axios.get('http://localhost:3000/update_tea_class_msg', {
                                            params: {
                                                state: 1,
                                                c_id: o.c_id
                                            }
                                        }).then((res) => {
                                            console.log('----------2')
                                        })
                                    }
                                }
                            })
                        })
                        //登录后，自动检测并修改学生课程列表，更新相关数据库信息
                        Axios.get('http://localhost:3000/get_join_class_msg').then((res) => {
                            var _this = this;
                            JSON.parse(res.data).forEach(function (o, i) {
                                var start_time = _this.changeTime(o.start_time);
                                var end_time = _this.changeTime(o.end_time);
                                if (o.j_check == 1) {
                                    if (_this.nowTime < start_time) { //当前时间小于开始时间，课程未开始
                                        Axios.get('http://localhost:3000/update_join_class_msg', {
                                            params: {
                                                state: 0,
                                                c_id: o.j_id
                                            }
                                        }).then((res) => {
                                            console.log('0')
                                        })
                                    } else if (_this.nowTime >= end_time) { //当前时间大于结束时间，课程已结束
                                        Axios.get('http://localhost:3000/update_join_class_msg', {
                                            params: {
                                                state: 2,
                                                c_id: o.j_id
                                            }
                                        }).then((res) => {
                                            console.log('-----1')
                                        })
                                    } else if (_this.nowTime >= start_time && _this.nowTime < end_time) { //课程正在进行中
                                        Axios.get('http://localhost:3000/update_join_class_msg', {
                                            params: {
                                                state: 1,
                                                c_id: o.j_id
                                            }
                                        }).then((res) => {
                                            console.log('----------2')
                                        })
                                    }
                                }
                            })
                        })
                        this.$router.push({
                            path: '/more'
                        })
                    } else {
                        alert('账号或密码错误');
                    }
                })
            }
        }
    }
</script>

<style scoped>
    @import "../../assets/css/reset.css";

    #login {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        height: 100%;
        /*background: url('/static/teaImg/1.jpg') no-repeat;*/
        background-size: cover;
    }

    #login .header {
        height: 1rem;
        background: deepskyblue;
        color: #fff;
        position: fixed;
        top: 0;
        width: 100%;
        line-height: 1rem;
        text-align: center;
        display: flex;
    }

    #login .header h1 {
        flex: 2;
        text-indent: 0.6rem;
        font-size: 0.4rem;
        line-height: 1rem;
    }

    #login .header .back {
        height: 0.4rem;
        width: 0.4rem;
        text-align: center;
        line-height: 1rem;
        float: right;
        margin-top: 0.3rem;
        margin-left: 0.1rem;
    }

    #login .header .reg {
        height: 1rem;
        width: 1rem;
        text-align: center;
        font-size: 0.3rem;
    }

    #login .header .reg a {
        color: #fff;
        outline: none;
    }

    #login .logo {
        text-align: center;
        margin-top: 2rem;
        height: 2rem;
    }

    #login .logo img {
        height: 100%;
    }

    #login .login-content {
        text-align: center;
        margin: 0.5rem auto;
        width: 4rem;
        height: 0.5rem;
        font-size: 0.3rem;
    }

    #login .login-content img {
        height: 0.5rem;
        float: left;
    }

    #login .login-content input {
        outline: none;
        background: #fff;
        border-radius: 0.15rem;
        width: 3.2rem;
        height: 0.6rem;
        border: 1px solid #ccc;
        text-align: center;
        font-size: 0.2rem;
    }

    #login .login-content a {
        font-size: 0.2rem;
        color: green;
    }

    #login .login-content .forget {
        text-align: right;
    }

    #login .login-content .log-btn {
        margin-top: 0.5rem;
        width: 3rem;
        height: 0.8rem;
        background: deepskyblue;
        color: #fff;
        border: 0;
        border-radius: 0.1rem;
    }

    #account {
        margin-bottom: .4rem;
    }
</style>
