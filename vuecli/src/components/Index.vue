<template>
    <div class="teacher">
        <div>
            <common-header class="glassy">
                <div class="left">
                    <!--&lt;!&ndash; <img src="../assets/logo.png" alt=""> &ndash;&gt;-->
                    <!--<select class="form-control" @blur="change()">-->
                        <!--<option value="哈尔滨" selected>哈尔滨</option>-->
                        <!--<option value="吉林">吉林</option>-->
                        <!--<option value="辽宁">辽宁</option>-->
                        <!--<option value="铁岭">铁岭</option>-->
                    <!--</select>-->
                </div>
                <div class="right">
                    <!-- <router-link to="/message"> -->
                    <img @click="check_login()" src="../assets/img/03icn_mes.png" alt="">
                    <!-- </router-link> -->

                </div>
            </common-header>
            <div class="content">
                <swipe class='my-swipe slide-show'>
                    <swipe-item class='item1'></swipe-item>
                    <swipe-item class='item2'></swipe-item>
                    <swipe-item class='item3'></swipe-item>
                    <swipe-item class='item4'></swipe-item>
                </swipe>
                <!--<div class="slide-show">-->
                <!--<img src="../assets/img/banner/banner_01.png" alt="">-->
                <!--</div>-->
                <div class="two">
                    <div class="two-left">
                        <router-link to="/teacherlist/语文">
                            <div class="two-left-up">
                                <img value="cn" src="../assets/img/chinese.png" alt="" @click="chinese('语文')">
                            </div>
                        </router-link>
                        <router-link to="/teacherlist/英语">
                            <div class="two-left-down">
                                <img src="../assets/img/english.png" alt="" @click="chinese('英语')">
                            </div>
                        </router-link>

                    </div>
                    <!-- <div class="split"></div> -->

                    <div class="two-right">
                        <router-link to="/teacherlist/数学">
                            <img src="../assets/img/math.png" alt="" @click="chinese('数学')">
                        </router-link>

                    </div>
                </div>
                <div class="three">
                    <div class="three-left">
                        <router-link to="/teacherlist/物理">
                            <img src="../assets/img/physics.png" alt="" @click="chinese('物理')">
                        </router-link>

                    </div>
                    <div class="split"></div>
                    <div class="three-right">
                        <div class="three-right-up">
                            <router-link to="/teacherlist/化学">
                                <img src="../assets/img/chemistry.png" alt="" @click="chinese('化学')">
                            </router-link>
                        </div>
                        <div class="three-right-down">
                            <router-link to="/teacherlist/艺术特长">
                                <img src="../assets/img/artSpecial.png" alt="" @click="chinese('艺术特长')">
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <common-footer></common-footer>
        </div>
    </div>
</template>
<script>

    import CommonHeader from '@/components/common/CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'
    import $ from "jquery"
    import '../assets/bootstrap/css/bootstrap.css'
    import {Swipe, SwipeItem} from 'vue-swipe';

    Swipe.auto = false;
    export default {
        name: 'teacher',
        data() {
            return {
                //msg: 'Welcome to Your Vue.js App'
            }
        },

        components: {
            CommonHeader,
            CommonFooter,
            Swipe,
            SwipeItem
        },
        mounted() {

        },
        methods: {
            change: function () {
                $(' .teacher .glassy .left select').css('background', 'rgba(0,0,0,.2)');
            },
            chinese: function (data) {
                console.log(data);
                // this.$store.dispatch('catalogs',data);
            },
            check_login: function () {
                if (localStorage.id) {
                    location.assign('http://localhost:8080/message/remind');
                } else {
                    location.assign('http://localhost:8080/login');
                }
            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    @import '../assets/css/vue-swipe.css';

    .teacher {
        color: #eee;
        width: 100%;
    }

    .teacher .glassy {
        z-index: 10;
        height: 1rem;
        width: 100%;
        background: rgba(0, 0, 0, 0);
        position: fixed;
        color: #fff;
        text-align: center;
        line-height: 1rem;
        font-size: 20px;
    }

    .glassy .left {
        float: left;
        width: 2rem;
        padding-top: .12rem;
    }

    .teacher .glassy .left select, .teacher .glassy .left option {
        margin-left: 0.1rem;
        outline: none;
        background: rgba(0, 0, 0, 0);
        border: 0;
        width: 1.5rem;
    }

    .teacher .glassy .left select {
        background: rgba(0, 0, 0, .2);
        width: 100%;
    }

    .teacher .glassy .left select:hover {
        background: #fff;
        width: 100%;
    }

    .teacher .glassy .left select option {
        background: rgba(0, 0, 0, .5);
        width: 80%;
        outline: none;
        text-align: center;

    }

    .glassy .right {
        float: right;
        width: 1rem;
    }

    .glassy .right img {
        width: 70%;
        padding: .12rem;
    }

    .slide-show {
        width: 100%;
        margin-bottom: .06rem;
    }

    .slide-show img {
        width: 100%;
    }

    .my-swipe {
        height: 3.8rem;
        font-size: 30px;
        text-align: center;
    }

    .my-swipe .mint-swipe-item {
        height: 100%;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    .item1 {
        background: url('../../static/teaImg/11.jpg');
        -webkit-background-size: cover;
        background-size: cover;
    }

    .item2 {
        background: url('../../static/teaImg/12.jpg');
        -webkit-background-size: cover;
        background-size: cover;
    }

    .item3 {
        background: url('../../static/teaImg/13.jpg');
        -webkit-background-size: cover;
        background-size: cover;
    }

    .item4 {
        background: url('../../static/teaImg/14.jpg');
        -webkit-background-size: cover;
        background-size: cover;
    }

    .teacher .split {
        width: .06rem;
    }

    .teacher .two {
        display: flex;
        margin-bottom: .08rem;
    }

    .teacher .two-left, .teacher .two-right, .teacher .three-left, .teacher .three-right {
        flex: 1;
    }

    .teacher .two-left {
        margin-right: .06rem;
        /*box-sizing: */
    }

    .teacher .two-right {
        height: 100%;
    }

    .teacher .two-right img {
        width: 100%;
        height: 100%;
    }

    .teacher .two-left-up {
        margin-bottom: .04rem;
    }

    .teacher .three {
        display: flex;
    }

    .teacher .three-right-up {
        margin-bottom: .02rem;
    }

    .teacher .content img {
        width: 100%;
    }

    .front img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>
