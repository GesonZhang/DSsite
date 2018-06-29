<template>
    <div id="details" style="padding-top:1.2rem">
        <div class="details-teacher">
            <!--<div class="banner">-->
                <!--<img src="../../assets/img/user.png" alt="">-->
            <!--</div>-->
            <div class="details-img">
                <img :src='teacherMsg.img' alt="">
            </div>
            <div class="details-msg">
                <p class="details-name"><span
                        class="teacher-name">{{teacherMsg.name}}</span>&nbsp;&nbsp;<span>{{teacherMsg.sex}}</span></p>
                <span class="blank">|</span><img src="/static/img1/13icn_ida.png" alt=""><span
                    class="approve">实名认证</span>
                <p class="teacher-shcool">{{teacherMsg.school}}&nbsp;<span>{{teacherMsg.xueli}}</span></p>
                <p>教师是个良心和责任心并存的职业</p>
            </div>
            <!--下方注销的为二维码-->
            <!--<div class="img" @click='flag=true'>-->
                <!--<img src="/static/img1/21icn_qrc56.png" alt="" style='padding-right:0.1rem'>-->
            <!--</div>-->
            <!-- 弹层图片开始 -->
            <div id="tancen-img" v-if='flag' @click='flag=!flag'>
                <div class="tancen-img">
                    <div class="tancen-top">
                        <div class="tancen-left">
                            <img :src=teacherMsg.img alt="" class='tx-img'>
                        </div>
                        <div class="tancen-right">
                            <span class='tea-name'>{{teacherMsg.name}}</span><br>
                            <img src="/static/img1/13icn_ida.png" alt=""><br><span>实名认证</span>
                        </div>
                    </div>
                    <div class="bottom">
                        <img :src=teacherMsg.wx_img alt="">
                        <p>使用微信扫一扫上面的二维码</p>
                    </div>
                </div>
            </div>
            <!-- 弹层图片开始结束 -->
        </div>
        <div class="details-information">
            <p class="selected"><img src="/static/img1/24_02课程前标记_green.png" alt=""><span>基本信息</span></p>
            <ul>

                <li class="main" style=' overflow: hidden;'>
                    <div><span class="introduce" style='float:left;width:1.1rem'>授课年级:</span></div>
                    <div style='float:left ;width:5.2rem;padding-right:0.1rem'>{{teacherMsg.grade}}</div>
                </li>

                <li class="main"><span class="introduce">擅长科目：</span>{{teacherMsg.dowell}}</li>
                <li class="main"><span class="introduce">活动范围：</span>{{teacherMsg.area}}</li>
            </ul>
        </div>
        <div class="details-introduce">
            <p class="selected"><img src="/static/img1/24_02课程前标记_green.png" alt="">自我介绍</p>
            <div class="description">

                <ul id="intro">
                    <li class="main"><span
                            class="introduce">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：</span>{{teacherMsg.xueli}}
                    </li>
                    <li class="main"><span class="introduce">毕业学校：</span>{{teacherMsg.school}}</li>
                    <li class="main" style=' overflow: hidden;'>
                        <div><span class="introduce" style='float:left;width:1.1rem'>个人简介:</span></div>
                        <div style='float:left ;width:5.2rem;padding-right:0.1rem'>{{teacherMsg.jianjie}}</div>
                    </li>
                    <li class="main"><span class="introduce">教育经历：</span>{{teacherMsg.exp}}</li>
                </ul>

            </div>
        </div>
        <div class="details-honor">
            <p class="selected"><img src="/static/img1/24_02课程前标记_green.png" alt="">个人荣誉</p>
            <div class="honor-description" v-for='(msg,index) in teacherHonor'>
                <div class="left">
                    <p>{{msg.honor_medal}}</p>
                    <p>{{msg.honor_time}}</p>
                </div>
                <div class="right">
                    <img :src="msg.honor_img" alt="" class="right-img" @click='show(index)'>
                </div>
            </div>
            <!-- 弹层图片开始 -->
            <div id="tancen-img" v-if='flag1' @click='flag1=!flag1'>
                <div class="tancen-img">
                    <img :src="teacherHonor[index1].honor_img" class="honor-img">
                    <p class="honor-content">
                        <span>{{teacherHonor[index1].honor_medal}}</span><br><span>{{teacherHonor[index1].honor_time}}</span>
                    </p>
                </div>
            </div>
            <!-- 弹层图片开始结束 -->
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
                teacherMsg: {},
                teacherHonor: [],
                flag: false,
                flag1: false
            }
        },
        mounted: function () {
            Axios.get('http://localhost:3000/teacherMsg', {
                params: {
                    id: this.index
                }
            }).then((res) => {
                this.teacherMsg = JSON.parse(res.data);
            });
            Axios.get('http://localhost:3000/teacherHonor', {
                params: {
                    id: this.index
                }
            }).then((res) => {
                this.teacherHonor = JSON.parse(res.data);
            });
        },
        methods: {
            back: function () {
                history.go(-1);
            },
            show: function (num) {
                this.index1 = num;
                this.flag1 = true;
                // $('#tancen-img').slideDown(1000);
            },
        },
        components: {}
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    #teacher-msg {
        font-size: 0.2rem;
        color: #5C3317;
    }

    #header {
        z-index: 10;
        width: 100%;
        position: fixed;
        height: 1rem;
        background: skyblue;

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
        color: red;
        font-size: 0.25rem;
        text-align: center;
        float: left;
        flex: 1;
        line-height: 1rem;
    }

    #header ul li a {
        color: red;
    }

    .banner img {
        width: 100%;
    }

    .details-img {
        position: relative;
    }

    li {
        margin: 0.15rem 0;
    }

    .details-img img {
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        float: left;
        position: absolute;
        top: -0.4rem;
        left: 0.2rem;
    }

    .teacher-name {
        color: skyblue;
        font-size: 0.25rem;
        font-weight: bold;
    }

    .teacher-shcool {
        margin: 0.1rem 0;
    }

    .details-msg {
        margin-top: 0.3rem;
        height: 1.4rem;
        margin-left: 2rem;
    }

    .details-msg img {
        width: 0.35rem;
    }

    .blank {
        margin: 0 0.4rem;
    }

    .details-msg .details-name {
        float: left;
    }

    .approve {
        color: #ac2925;
        margin-left: 0.2rem;
        font-size: 0.2rem;
    }

    .introduce {
        color: #31C37C;
        padding-left: 0.1rem;
    }

    .img {
        height: 0.5rem;
        width: 0.5rem;
        float: right;
        margin-top: -1.4rem;
        margin-right: 0.1rem;
    }

    .selected {
        color: #40AA63;
        background: #ccc;
        line-height: 0.6rem;
        padding-left: 0.4rem;
    }

    .selected img {
        width: 0.2rem;
        margin-top: 0.2rem;
        margin-right: 0.1rem;
    }

    .details-honor {
        margin-bottom: 1rem;
        clear: both;
    }

    .honor-description {
        padding: 0.2rem;
        height: 1rem;
        border-bottom: 1px solid #ccc;
    }

    .left {
        width: 4rem;
        float: left;

    }

    .right {
        width: 1rem;
        float: right;
    }

    .right-img {
        width: 1rem;
        height: 0.6rem;
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
        z-index: 15;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: rgba(100, 100, 100, 0.3);
    }

    .tancen-img {
        text-align: center;
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -2.4rem;
        margin-top: -3.2rem;
        width: 4.8rem;
        height: 6.4rem;
        border-radius: 0.3rem;
        overflow: hidden;
        background: #fff;
    }

    .tancen-img .honor-img {
        width: 100%;
        height: 4.8rem;
    }

    .honor-content {
        padding: 0.2rem 0;
    }

    .honor-content span {

        color: #00bcd4;
        font-size: 0.3rem;
    }

    .tancen-top {
        display: flex;
        padding-top: 0.3rem;
    }

    .tancen-left {
        text-align: right;
        padding: 0.2rem;
        flex: 1;
    }

    .tancen-right {
        flex: 1;
        padding: 0.2rem;
    }

    .tancen-right .tea-name {
        color: skyblue;
        font-size: 0.3rem;

    }

    .tancen-right img {
        width: 0.4rem;
    }

    .tx-img {
        width: 1.4rem;
        height: 1.4rem;
        border-radius: 50%;
    }

    .bottom {
        text-align: center;
    }

    .bottom img {
        width: 3.5rem;
        height: 3.5rem;
    }

    .bottom p {
        font-size: 0.25rem;
        color: #999;
    }

</style>