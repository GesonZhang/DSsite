<template>
    <div id="join-class">
        <div class="header">
            <img src="/static/img1/23icn_back_gray .png" alt="" @click="back">
            <h4>课程报名</h4>
        </div>
        <div class="content">
            <div class="top"><span class="identify">家教</span><span class="name">{{classMsg.c_name}}</span></div>
            <hr>
            <div class="bottom">
                <ul>
                    <li><span
                            class="cls-list">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级:</span>&nbsp;&nbsp;<span>{{classMsg.c_grade}}</span>
                    </li>
                    <li><span
                            class="cls-list">科&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目:</span>&nbsp;&nbsp;<span>{{classMsg.c_subject}}</span>
                    </li>
                    <li><span
                            class="cls-list">说&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;明:</span>&nbsp;&nbsp;<span>{{classMsg.c_describe}}</span>
                    </li>
                    <li><span class="cls-list">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格:</span>&nbsp;&nbsp;<span
                            class="price">￥{{classMsg.c_price}}</span><span>/课时</span></li>
                    <li><span class="cls-list">授课方式:&nbsp;&nbsp;</span><span>{{classMsg.c_method}}</span></li>
                    <li><span class="cls-list">上课时间:&nbsp;&nbsp;</span><span>{{classMsg.start_time}}</span></li>
                    <li><span class="cls-list">联系电话:&nbsp;&nbsp;</span><span>{{classMsg.t_tel}}</span></li>
                </ul>
                <span class="c-try n-try" v-if='!(Number(classMsg.c_try))'>不试听</span>
                <span class="c-try y-try" v-if='Number(classMsg.c_try)'>可试听</span>
            </div>
        </div>
        <div class="footer">
            <div class="left" @click="back">取消</div>
            <div class="right" @click="toggle_join" v-if='flag'>选择课程</div>
            <div class="del-join" v-if='!flag' @click="toggle_join">取消选课</div>
        </div>
    </div>
</template>
<script>
    import $ from 'jquery'
    import Axios from 'axios'
    export default {
        data() {
            return {
                index: this.$route.params.id,
                classMsg: {},
                flag: true
            }
        },
        mounted: function () {
            Axios.get('http://localhost:3000/classMsg', {
                params: {
                    c_id: this.index
                }
            }).then((res) => {
                this.classMsg = JSON.parse(res.data);
            });
            //如果登录就检测是否选取过该课程
            if (localStorage.id) {
                Axios.get('http://localhost:3000/yes_no_join', {
                    params: {
                        c_id: this.index,
                        s_id: localStorage.id,
                    }
                }).then((res) => {

                    if (res.data == 'success') {
                        this.flag = false;
                    } else {
                        this.flag = true;
                    }
                });
            }
        },
        methods: {
            back: function () {
                history.go(-1);
            },
            //选课和取消选课
            toggle_join: function () {
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
                } else {
                    Axios.get('http://localhost:3000/joinClass', {//学生选择课程，等待老师确认。
                        params: {
                            c_id: this.index,
                            s_id: localStorage.id,
                            t_id: this.classMsg.t_id,
                            t_name: this.classMsg.c_name,
                            c_subject: this.classMsg.c_subject,
                            start_time: this.classMsg.start_time,
                            end_time: this.classMsg.end_time,
                            c_address: this.classMsg.c_address,
                            t_tel: this.classMsg.t_tel
                        }
                    }).then((res) => {
                        if (res.data == 'join') {
                            this.flag = false;
                        } else {
                            this.flag = true;
                        }
                    });
                }
                history.go(-1);
            }
        },
        components: {}
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    button {
        outline: none;
    }

    .header {
        width: 100%;
        height: 1rem;
        background: skyblue;
        position: fixed;
        top: 0;
        left: 0;
    }

    .header img {
        width: 0 . rem;
        position: absolute;
        left: 0.2rem;
        top: 0.2rem;
    }

    .header h4 {
        text-align: center;
        line-height: 1rem;
        color: #fff;
        font-size: 0.35rem;
    }

    .content {
        margin: 1.2rem 0;
        font-size: 0.25rem;

    }

    .content .top {
        padding: 0.2rem;
    }

    .content .bottom {
        padding: 0.3rem;
        position: relative;

    }

    .content .bottom .price {
        color: red;
    }

    .content .bottom .c-try {
        position: absolute;
        right: 0.3rem;
        top: 0.3rem;
        padding: 0.02rem;

    }

    .content .bottom .y-try {
        color: red;
        border: 1px solid red;
        border-radius: 0.05rem;
        font-size: 0.2rem;
    }

    .content .bottom .n-try {
        color: skyblue;
        border: 1px solid skyblue;
        border-radius: 0.05rem;
        font-size: 0.2rem;
    }

    .cls-list {
        color: green;
    }

    .top .identify {
        padding: 0.05rem;
        color: green;
        border: 1px solid green;
        border-radius: 5px;
    }

    .top .name {
        padding: 0.05rem;
        padding-left: 0.3rem;
        color: skyblue;
    }

    .footer {
        width: 100%;
        height: 1rem;
        display: flex;
        border: 1px solid #ccc;
        position: fixed;
        bottom: 0;
        left: 0;
        line-height: 1rem;
    }

    .footer div {
        flex: 1;
        text-align: center;
        font-size: 0.3rem;
    }

    .footer .left {

    }

    .footer .right {

        background: skyblue;
        color: #fff;
    }

    .footer .del-join {
        background: #ccc;
        color: #fff;
    }


</style>
