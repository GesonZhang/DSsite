<template>
    <div id="teacher">
        <div id="header">
            <div id="top">
                <h4>家教</h4>
                <span @click='filtershow'>筛选</span>
            </div>
            <div id="top-nav">
                <ul id="nav-list">
                    <li>最新发布</li>
                    <li @click="show"><span class='navall'>全部</span><span class="all"></span></li>
                    <li @click="show1"><span class='navcity'>全城</span><span class="city"></span></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="content-list" v-for='(msg,index) in  $store.state.teacherList'>
                <div class="img" @click=show2(index)>
                    <img :src="msg.img">
                </div>
                <router-link :to="'/teacher-msg/'+msg.id">
                    <div class="msg">
                        <p><span class="teacher-name">{{msg.name}}</span>&nbsp;&nbsp;<span>{{msg.sex}}</span></p>
                        <p>{{msg.school}}&nbsp;<span>{{msg.xueli}}</span></p>
                        <p>擅长科目：<span>{{msg.dowell}}</span></p>
                        <p class="adress">活动范围：<span>{{msg.area}}</span></p>
                    </div>
                </router-link>
                <div class="focus" @click=focus(msg.id)>
                    <img src="../../assets/img/14_01icn_ccn.png" v-if='!(arr.indexOf(msg.id)!=-1)'>
                    <img src="../../assets/img/14_02icn_acc.png" v-if='arr.indexOf(msg.id)!=-1'>
                    <br>
                    <span>￥</span><span class="price">{{msg.price2}}</span><span>/课时</span>
                </div>
            </div>
        </div>
        <div id="tancen-all">
            <ul class="tancen-list">
                <li @click="change('全部')">全部</li>
                <li @click="change('男')">男</li>
                <li @click="change('女')">女</li>
            </ul>
        </div>
        <div id="tancen-city">
            <ul class="tancen-list">
                <li @click="change1('全城')">全城</li>
                <li @click="change1('道里区')">道里区</li>
                <li @click="change1('南岗区')">南岗区</li>
                <li @click="change1('道外区')">道外区</li>
                <li @click="change1('平房区')">平房区</li>
                <li @click="change1('松北区')">松北区</li>
                <li @click="change1('香坊区')">香坊区</li>
                <li @click="change1('呼兰区')">呼兰区</li>
            </ul>
        </div>
        <!-- <tancen-img :teacherList='teacherList'></tancen-img> -->
        <div id="tancen-img" v-if='flag' @click="show3">
            <div class="tancen-img">
                <img :src="$store.state.teacherList[index].img" alt="">
                <p>
                    <b>{{$store.state.teacherList[index].name}}&nbsp;&nbsp;</b><span>{{$store.state.teacherList[index].sex}}&nbsp;</span><span>{{$store.state.teacherList[index].xueli}}</span>
                </p>
                <p>{{$store.state.teacherList[index].school}}</p>
                <p>{{$store.state.teacherList[index].area}}</p>
            </div>
        </div>
        <msg-filter></msg-filter>
        <common-footer></common-footer>

    </div>
</template>


<script>

    import CommonFooter from '../common/CommonFooter'
    import MsgFilter from './filter'
    import Axios from 'axios'
    import $ from 'jquery'


    export default {
        data() {
            return {
                flag1: false,
                flag2: false,
                teacherList: [],
                flag: false,
                focus_flag: false,
                focusList: [],
                arr: []
            }
        },
        mounted: function () {
            Axios.get('http://localhost:3000/teacherList').then((res) => {
                this.teacherList = JSON.parse(res.data);
                this.$store.dispatch('teacherList', this.teacherList);
            });
            //如果该学生已经登录 获取该学生关注的老师列表
            if (localStorage.id) {
                Axios.get('http://localhost:3000/get_Focus', {
                    params: {
                        s_id: localStorage.id,
                    }
                }).then((res) => {
                    this.focusList = JSON.parse(res.data)
                    for (var i = 0; i < this.focusList.length; i++) {
                        this.arr.push(this.focusList[i].t_id);
                    }
                });
            }


        },
        methods: {
            // 弹层动画
            show: function () {
                this.flag1 = !this.flag1;
                $('#tancen-city').hide();
                $('.city').css('background-position', '0 -10px');
                this.flag2 = false;
                if (this.flag1 == true) {
                    $('#tancen-all').slideDown(100);
                    $('.all').css('background-position', '0 0');
                } else {
                    $('#tancen-all').slideUp(100);
                    $('.all').css('background-position', '0 -10px');
                }
            },
            // 弹层动画
            show1: function () {
                this.flag2 = !this.flag2;
                $('#tancen-all').hide();
                $('.all').css('background-position', '0 -10px');
                this.flag1 = false;
                if (this.flag2 == true) {
                    $('#tancen-city').slideDown(100);
                    $('.city').css('background-position', '0 0');
                } else {
                    $('#tancen-city').slideUp(100);
                    $('.city').css('background-position', '0 -10px');
                }
            },
            show2: function (num) {
                this.index = num;
                this.flag = true;
                // $('#tancen-img').slideDown(1000);
            },
            show3: function () {
                this.flag = false;
            },
            change: function (data) {
                $('.navall').text(data);
                var area = $('.navcity').text();
                if (data == '全部') {
                    data = '';
                }
                if (area == '全城') {
                    area = '';
                }
                this.show();
                Axios.get('http://localhost:3000/teacher_sex_area', {
                    params: {
                        sex: data,
                        area: area
                    }
                }).then((res) => {
                    this.teacherList = JSON.parse(res.data);
                    this.$store.dispatch('teacherList', this.teacherList);
                })
            },
            // 改变地区值
            change1: function (data) {
                $('.navcity').text(data);
                this.show1();
                var sex = $('.navall').text();
                if (data == '全城') {
                    data = '';
                }
                if (sex == '全部') {
                    sex = '';
                }
                Axios.get('http://localhost:3000/teacher_sex_area', {
                    params: {
                        sex: sex,
                        area: data
                    }
                }).then((res) => {
                    this.teacherList = JSON.parse(res.data);
                    this.$store.dispatch('teacherList', this.teacherList);
                })
            },
            filtershow: function () {
                $('#filter').fadeIn(200);
            },
            focus: function (id) {

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
                    Axios.get('http://localhost:3000/teacher_toggle_Focus', {
                        params: {
                            s_id: localStorage.id,
                            t_id: id
                        }
                    }).then((res) => {
                        if (res.data == 'add_focus') {
                            this.arr.push(id);
                        } else {
                            var index = this.arr.indexOf(id);
                            this.arr.splice(index, 1)
                        }
                    });
                }
            }
        },
        components: {
            CommonFooter,
            MsgFilter
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    #teacher {
        overflow: hidden;
    }

    #header {
        width: 100%;
        height: 2rem;
        position: fixed;
        z-index: 10;
        border-bottom: 0.1rem solid #eee;
        font-size: 0.2rem;

    }

    #top {
        width: 100%;
        height: 1rem;
        background-color: #31C37C;

    }

    #top h4 {
        text-align: center;
        line-height: 1rem;
        color: #fff;
        font-size: 0.25rem;
    }

    #top span {
        text-decoration: none;
        color: #fff;
        position: absolute;
        right: 0.2rem;
        top: 0.25rem;
        font-size: 0.25rem;
    }

    #top-nav {
        height: 1rem;
        overflow: hidden;
        background-color: #fff;
    }

    #nav-list {
        text-align: center;
        display: flex;
        width: 100%;
        height: 100%;
    }

    #nav-list li {
        position: relative;
    }

    #nav-list .all {
        position: absolute;
        top: 0.4rem;
        width: 14px;
        height: 10px;
        display: inline-block;
        background: url(../../assets/img/12_01icn_ord_def.png) 0 -10px no-repeat;
    }

    #nav-list .city {
        position: absolute;
        top: 0.4rem;
        width: 14px;
        height: 10px;
        display: inline-block;
        background: url(../../assets/img/12_01icn_ord_def.png) 0 -10px no-repeat;
    }

    #nav-list li {
        flex: 1;
        float: left;
        line-height: 1rem;
        height: 100%;
    }

    #content {
        background-color: #eee;
        margin-top: 2.1rem;
        margin-bottom: 1rem;
    }

    #content a {
        color: #000;
    }

    #content .teacher-name {
        color: skyblue;
        font-weight: bold;
        font-size: 0.25rem;
    }

    .content-list {
        font-size: 0.1rem;
        margin-top: 0.1rem;
        display: flex;
        width: 100%;
        background: #fff;
    }

    .content-list .img {
        flex: 1;
        padding: 0.2rem;

    }

    .content-list .img img {
        border-radius: 50%;
        width: 1.5rem;
        height: 1.5rem;
    }

    .content-list .msg {
        padding: 0.2rem;
        width: 2.5rem;
        font-size: 0.2rem;
    }

    .content-list .focus {
        flex: 1;
        padding: 0.2rem;
        text-align: center;
        font-size: 0.2rem;
    }

    .content-list .focus img {
        width: 0.5rem;
        height: 0.7rem;
        margin: 0.18rem 0;
        /*margin-bottom: 0.2rem;*/
    }

    .content-list .focus .price {
        color: red;
    }

    .msg .adress {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;

    }

    #tancen-all {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 2rem;
        bottom: 1rem;
        background-color: rgba(100, 100, 100, 0.3);
    }

    #tancen-all li {
        height: 0.7rem;
        line-height: 0.7rem;
        border: 1px solid #eee;
        font-size: 0.2rem;
    }

    .tancen-list li:hover {
        background-color: skyblue;
    }

    #tancen-city li {
        height: 0.7rem;
        line-height: 0.7rem;
        border: 1px solid #eee;
    }

    #tancen-city {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 2rem;
        bottom: 1rem;
        background-color: rgba(100, 100, 100, 0.3);
        font-size: 0.2rem;
    }

    .tancen-list {
        text-align: center;
        background: #fff;

    }

    .tancen-list li {

    }

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
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -2.4rem;
        margin-top: -3.2rem;
        width: 4.8rem;
        height: 6.4rem;
        background: #fff;
        border-radius: 0.3rem;
        overflow: hidden;
    }

    .tancen-img img {
        width: 100%;
        height: 4.5rem;
    }

    .tancen-img b {
        font-size: 18px;
        color: skyblue;
    }

    .tancen-img p {
        padding: 5px 15px;
        color: #999;
    }


</style>
