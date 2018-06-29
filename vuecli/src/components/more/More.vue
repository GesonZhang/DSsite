<template>
    <div id="more">
        <!-- header -->
        <div id="more-header">
            <!-- 更换皮肤 -->
            <router-link to="/more/change/skin"><img src="../../assets/img/change-skin.png" alt="" class="skin">
            </router-link>
            <!-- 编辑个人信息 -->
            <router-link v-if="login" to="/more/my_info"><img src="../../assets/img/edit-info.png" alt="" class="edit">
            </router-link>
            <!-- 已登录 -->
            <div class="logined" v-show="login">
                <img :src="info.img" class="pic" v-show="login"><br>
                <b class="name">{{info.name}}</b>&nbsp;&nbsp;<span class="man" v-if="info.sex=='男'">♂</span><span
                    class="woman" v-else>♀</span>
                <div v-show="identify" class="xueli">
                    <span>学历:{{info.xueli}}</span>
                    <span>擅长:{{info.dowell}}</span>
                </div>
                <p v-if="identify" class="jianjie">个人简介:<span>{{info.jianjie}}</span></p>
                <p v-else>{{info.says}}</p>

                <ul v-show="!identify">
                    <!--<li @click="beans=true;dialog=true">-->
                    <!--<span>学豆</span><br>-->
                    <!--<span>{{info.beans}}</span>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<span @click="dialog=true;tickets=true;">优惠券</span><br>-->
                    <!--<span>{{info.tickets}}张</span>-->
                    <!--</li>-->
                    <li>
                        <router-link to="/more/attention">
                            <span>关注</span><br>
                            <span>{{info.attention_num}}</span>
                        </router-link>
                    </li>
                </ul>
                <div class="dialog" v-show="!identify"></div>
            </div>
            <!-- 未登录 -->
            <div class="logined" v-show="!login">
                <router-link to="/login"><img src="../../assets/img/36默认头像.png" class="pic"><br>
                    <b class="name">未登录</b></router-link>
                <br>
                <p>&nbsp;</p>
                <ul>
                    <!--<li>-->
                    <!--<span>学豆</span><br>-->
                    <!--<span>0</span>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<span>优惠券</span><br>-->
                    <!--<span>0</span>-->
                    <!--</li>-->
                    <li>
                        <router-link to="/more/attention">
                            <span>关注</span><br>
                            <span>0</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 内容展示 -->
        <hr>
        <div id="more-content">
            <ul>
                <li v-if="is_admin=='1'">
                    <router-link to="/more/reg_check">
                        <i class="more-icon glyphicon glyphicon-inbox"></i>
                        <span>注册审核</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="is_admin=='1'">
                    <router-link to="/more/addclass_check">
                        <i class="more-icon glyphicon glyphicon-hourglass"></i>
                        <span>新课程注册审核</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="releaseClass==1">
                    <router-link to="/more/addclass">
                        <i class="more-icon glyphicon glyphicon-home"></i>
                        <span>发布课程</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="releaseClass==2">
                    <a href="javascript:;" style="text-decoration:none;outline:none;">
                        <i class="more-icon glyphicon glyphicon-home"></i>
                        <span style="color: #ccc;">发布课程</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </a>
                </li>
                <li v-if="releaseClass==1">
                    <router-link to="/more/delclassing">
                        <i class="more-icon glyphicon glyphicon-time"></i>
                        <span>待确认课</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="releaseClass==1">
                    <router-link to="/more/delclass">
                        <i class="more-icon glyphicon glyphicon-tree-conifer"></i>
                        <span>我的课程</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="releaseClass==2">
                    <router-link to="/more/addhonor">
                        <i class="more-icon glyphicon glyphicon-envelope"></i>
                        <span>个人荣誉</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li v-if="userId!=null">
                    <router-link to="/more/set">
                        <i class="more-icon glyphicon glyphicon-cog"></i>
                        <span>我的设置</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li>
                    <router-link to="/aboutus">
                        <i class="more-icon glyphicon glyphicon-qrcode"></i>
                        <span>关于我们</span>
                        <i class="more-in glyphicon glyphicon-chevron-right"></i>
                    </router-link>
                </li>
                <li style="margin-bottom: 1rem;background:transparent;"></li>
            </ul>
        </div>
        <!-- footer -->
        <common-footer></common-footer>
        <!-- 遮罩层 -->
        <!--  <div id="dialog" v-show="dialog" @click="close()">
           <div class="box" v-show="beans">
             <h4>每日签到</h4>
             <button @click="get_beans();dialog=false;beans=false">学豆+100</button>
           </div>
           <div class="box" v-show="tickets">
             <h4>兑换优惠券</h4>
             <button @click="get_tickets();dialog=false;tickets=false">消耗1000学豆</button>
           </div>
         </div> -->
    </div>
</template>

<script>
    import CommonHeader from '@/components/common/CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'
    import Axios from 'axios'

    export default {
        data() {
            return {
                id: '',
                login: false,
                info: {},
                dialog: false,
                beans: false,
                tickets: false,
                identify: Number(localStorage.identify),
                userId: localStorage.id,
                is_admin: localStorage.is_admin,
                stringLength: 30,//设置个人中心的个人简介显示字符长度。
                isCheck: localStorage.isCheck,
                releaseClass: 0
            }
        },
        components: {
            CommonHeader,
            CommonFooter
        },
        mounted() {
            console.log(localStorage)
            if (localStorage.id) {
                this.id = localStorage.id;
                this.get_info();
                if (this.identify == '1' && this.isCheck == 1) {//身份是教师，且已通过审核
                    if (this.is_admin) {
                        this.releaseClass = 1;
                    }
                } else if (this.identify == '1' && this.isCheck == 0) {//身份是教师，但是没有通过审核或者审核尚未开始
                    if (this.is_admin) {
                        this.releaseClass = 2;
                    }
                }
            }
        },
        methods: {
            get_info() {
                Axios.get('http://localhost:3000/users/login', {
                    params: {
                        account: localStorage.account,
                        password: localStorage.password
                    }
                }).then((res) => {
                    this.info = JSON.parse(res.data);
//                    localStorage.is_admin = JSON.parse(res.data).is_admin;
                    this.is_admin = JSON.parse(res.data).is_admin;
                    this.$store.dispatch('info', this.info);//储存用户信息
                    if (this.info.identify == 0) {
                        if (this.info.says) {
                            if (this.info.says.length >= this.stringLength) {
                                this.info.says = this.info.says.substring(0, 30) + "……";
                            }
                        }
                    } else {
                        if (this.info.jianjie) {
                            if (this.info.jianjie.length >= this.stringLength)
                                this.info.jianjie = this.info.jianjie.substring(0, 30) + "……";
                        }
                    }
                    this.login = true;
                    document.querySelector('#more-header').style = "background-image:url('" + this.info.skin + "')";
                })
            },
            get_beans() {
                var today = new Date();
                if (today.getDate() != this.$store.state.date) {
                    this.$store.dispatch('get_beans', [true, today.getDate()]);
                }
                if (this.$store.state.get_beans) {
                    Axios.get('http://localhost/ttyk/phpci/users/get_beans?id=' + this.id).then((res) => {
                        var today = new Date();
                        this.$store.dispatch('get_beans', [false, today.getDate()]);
                        this.get_info();
                        this.$message({message: '领取成功'});
                    });
                } else {
                    this.$message({message: '今日已领取'});
                }
            },
            get_tickets() {
                Axios.get('http://localhost/ttyk/phpci/users/get_tickets?id=' + this.id).then((res) => {
                    if (res.data) {
                        this.get_info();
                    } else {
                    }
                });
            },
            close(e) {
            },
        },
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    #more {
        width: 100%;
        background: #f0f0f0;
        position: absolute;
        top: 0;
        bottom: 1rem;
    }

    #more-header {
        width: 100%;
        height: 4.2rem;
        background-image: url('/static/img/skin/6.jpg');
        background-size: cover;
        position: relative;
        overflow: hidden;
        color: #fff;
    }

    #more-header .edit, .skin {
        position: absolute;
        top: 0.2rem;
    }

    #more-header .edit {
        width: 0.48rem;
        right: 0.25rem;
        margin: 0 0 0.12rem 0.12rem;
    }

    #more-header .skin {
        width: 0.6rem;
        left: 0.25rem;
    }

    .logined {
        text-align: center;
        font-size: .28rem;
    }

    .logined img {
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        margin-top: 0.35rem;
    }

    .logined .name {
    }

    .logined .man {
        color: #00f;
    }

    .logined .woman {
        color: #f00;
    }

    .logined p {
    }

    .logined ul {
        display: flex;
        margin-top: 0.2rem;
    }

    .logined ul li {
        flex: 1;
        height: 1rem;
        z-index: 10;
    }

    .logined ul li:nth-child(2) {
        border-left: 2px solid #fff;
        border-right: 2px solid #fff;
    }

    .logined ul li a {
        display: block;
        height: 100%;
        color: #fff;
    }

    .logined ul li span {
    }

    .logined .dialog {
        width: 100%;
        height: 1.3rem;
        position: absolute;
        bottom: 0;
        background: rgba(0, 0, 0, .4);
    }

    #more-content {
        font-size: 0.33rem;
    }

    #more-content > ul > li {
        height: 1rem;
        background: #fff;
        border-bottom: 1px solid #ccc;
    }

    #more-content > ul > li:last-child {
        border: 0;
    }

    #more-content > ul > li > a {
        display: block;
        width: 100%;
        height: 100%;
        color: #444;
        padding: 0 0.5rem;
    }

    #more-content .more-icon {
        margin-right: 0.83rem;
        color: #6ab3e9;
        line-height: 1rem;
    }

    #more-content span {
    }

    #more-content .more-in {
        float: right;
        font-weight: bold;
        line-height: 1rem;
        color: #777;
    }

    #dialog {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 100;
        text-align: center;
    }

    #dialog .box {
        width: 3rem;
        margin: 50% auto;
    }

    #dialog button {
        width: 2rem;
        height: .8rem;
        background: #6ab3e9;
        border-radius: 8px;
        margin-top: 0.4rem;
    }

    .xueli span {
        padding: .2rem;
    }

    .jianjie {
        height: .5rem;
    }

    .jianjie span {
        font-size: .26rem;
    }
</style>
<style>
</style>