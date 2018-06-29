<template>
    <div id="filter">
        <div id="header">
            <img class="back" src="../../assets/img/23icn_back_gray .png" alt="" @click="back">
            <h4>筛选条件</h4>
            <span @click='filter'>确定</span>
        </div>
        <div id="content">
            <div id="grade">
                <ul class="grade">
                    <li class="all">全部</li>
                    <li class="grade-change" @click='show'>一年级</li>
                </ul>
            </div>
            <div id="sex">
                <p>性别</p>
                <ul class="sex">
                    <li>全部</li>
                    <li>男</li>
                    <li>女</li>
                </ul>
            </div>
            <div id="education">
                <p>学历</p>
                <ul class="education">
                    <li>全部</li>
                    <li>大专</li>
                    <li>本科</li>
                    <li>硕士</li>
                    <li>博士</li>
                </ul>
            </div>
            <div id="do-well">
                <p>擅长科目</p>
                <ul class="do-well">
                    <li>全部</li>
                    <li>数学</li>
                    <li>语文</li>
                    <li>英语</li>
                    <li>物理</li>
                    <li>化学</li>
                    <li>艺术特长</li>

                </ul>
            </div>
        </div>
        <div id="tancen-grade">
            <div class="header">
                <span @click='hide'>&lt;返回</span>
            </div>
            <ul class="tancen-content">
                <h5>小学</h5>
                <li class="little">一年级</li>
                <li class="little">二年级</li>
                <li class="little">三年级</li>
                <li class="little">四年级</li>
                <li class="little">五年级</li>
                <li class="little">六年级</li>
            </ul>
            <ul class="tancen-content">
                <h5>中学</h5>
                <li class="mid">七年级</li>
                <li class="mid">八年级</li>
                <li class="mid">九年级</li>
            </ul>
            <ul class="tancen-content">
                <h5>高中</h5>
                <li class="height">高一</li>
                <li class="height">高二</li>
                <li class="height">高三</li>
            </ul>
        </div>

    </div>
</template>


<script>
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                //过滤需要向后台传输的过滤对象
                filterMsg: {
                    grade: '',
                    sex: '',
                    education: '',
                    dowell: ''
                },
                teacherList: []
            }
        },
        mounted: function () {
            var _this = this;
            $('.grade .all').on('click', function () {
                $(this).addClass('select').siblings().removeClass('select');
                $('.tancen-content li').removeClass('select');
                _this.filterMsg.grade = $(this).text();
            });
            $('.sex li').on('click', function () {
                $(this).addClass('select').siblings().removeClass('select');
                _this.filterMsg.sex = $(this).text();
            });
            $('.education li').on('click', function () {
                $(this).addClass('select').siblings().removeClass('select');
                _this.filterMsg.education = $(this).text();
            });
            $('.do-well li').on('click', function () {
                $(this).addClass('select').siblings().removeClass('select');
                _this.filterMsg.dowell = $(this).text();
            });
            $('#tancen-grade li').on('click', function () {
                $(this).addClass('select').siblings().removeClass('select').parent().siblings().children('li').removeClass('select');
                $('.grade-change').text($(this).text()).addClass('select').siblings().removeClass('select');
                _this.filterMsg.grade = $(this).text();
                $('#tancen-grade').fadeOut();
            })
        },
        methods: {
            back: function () {
                $('#filter').fadeOut(200);
            },
            //筛选功能完善
            filter: function () {
                $('#filter').fadeOut(200);
                if (this.filterMsg.grade == '全部') {
                    this.filterMsg.grade = '';
                }
                if (this.filterMsg.sex == '全部') {
                    this.filterMsg.sex = '';
                }
                if (this.filterMsg.education == '全部') {
                    this.filterMsg.education = '';
                }
                if (this.filterMsg.dowell == '全部') {
                    this.filterMsg.dowell = '';
                }

                console.log(this.filterMsg);
                Axios.get('http://localhost:3000/teacher_filter', {
                    params: {
                        grade: this.filterMsg.grade,
                        sex: this.filterMsg.sex,
                        education: this.filterMsg.education,
                        dowell: this.filterMsg.dowell
                    }
                }).then((res) => {
                    this.teacherList = JSON.parse(res.data);
                    this.$store.dispatch('teacherList', this.teacherList);

                })

            },
            show: function () {
                $('#tancen-grade').fadeIn(200);
            },
            hide: function () {
                $('#tancen-grade').fadeOut(200);
            }
        },
        components: {}
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    #filter {
        display: none;
        z-index: 1000;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;

    }

    #header {
        width: 100%;
        position: fixed;
        height: 1rem;
        background: #31C37C;
        color: #fff;
        z-index: 2;
    }

    #header img {
        height: 0.4rem;
        position: absolute;
        left: 0.2rem;
        top: 0.3rem;
    }

    #header h4 {
        width: 4rem;
        margin: 0 auto;
        font-size: 0.4rem;
        height: 1rem;
        line-height: 1rem;
        text-align: center;
    }

    #header span {
        background-color: #31C37C;
        border: 0;
        font-size: 0.3rem;
        position: absolute;
        right: 0.3rem;
        top: 0.3rem;
    }

    #content {
        background: #eee;
        padding: 1.5rem 0.1rem;
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }

    #content p {
        text-align: center;
        margin: 0.2rem 0;

    }

    #content li {
        color: #000;
        height: 0.7rem;
        line-height: 0.7rem;
        background: #fff;
        border-radius: 7px;
        text-align: center;
    }

    .grade {
        display: flex;
    }

    .grade li:nth-child(1) {
        width: 1.2rem;
    }

    .grade li:nth-child(2) {
        flex: 3;
    }

    .sex {
        display: flex;
    }

    .sex li:nth-child(1) {
        width: 1.2rem;
    }

    .sex li:nth-child(n+2) {
        flex: 1;
    }

    .education {
        display: flex;
    }

    .education li:nth-child(1) {
        width: 1.2rem;
    }

    .education li:nth-child(n+2) {
        flex: 1;
    }

    .do-well li {
        margin-bottom: 0.05rem;
    }

    .do-well li:nth-child(1) {
        width: 1.2rem;
        float: left;
    }

    .do-well li:nth-child(n+2) {
        width: 1.66rem;
        float: right;
    }

    #content .select {
        background: #31C37C;
    }

    #tancen-grade .select {
        background: #31C37C;
    }

    #tancen-grade {
        display: none;
        border-radius: 0.5rem 0 0 0.5rem;
        background: #ccc;
        z-index: 3;
        position: absolute;
        right: 0;
        left: 1.3rem;
        top: 0;
        bottom: 0;
        padding:
    }

    #tancen-grade .header span {
        color: green;
        line-height: 1rem;
        padding-left: 0.2rem
    }

    .tancen-content {
        padding: 0.2rem 0.2rem;
        color: green;
        overflow: hidden;
    }

    .tancen-content h5 {
        height: 0.7rem;
        line-height: 0.7rem;
        text-align: center;
    }

    #tancen-grade li {
        width: 1.4rem;
        height: 0.7rem;
        text-align: center;
        line-height: 0.7rem;
        background: #fff;
        border-radius: 0.08rem;
        float: left;
        margin-left: 0.1rem;
        margin-top: 0.1rem;
    }


</style>
