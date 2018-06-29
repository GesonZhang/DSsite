<template>
    <div id="my-info">
        <div id="header">
            <img src="../../assets/img/back.png" alt="" @click="back()">
            <h3>个人信息</h3>
        </div>
        <div id="information">
            <div class="personal pic">
                <span>头像</span>
                <div class="img">
                    <img :src="info.img" alt="">
                </div>
                <input type="file" id="imageFile" @change="sub($event)">
            </div>
            <router-link to="/more/change/namechange">
                <div class="personal">
                    <span>姓名</span>
                    <div class="img">
                        <span>{{info.name}}</span>
                    </div>
                </div>
            </router-link>
            <!--性别不可被修改-->
            <!--<router-link to="/more/change/sexchange">-->
                <!--<div class="personal">-->
                    <!--<span>性别</span>-->
                    <!--<div class="img">-->
                        <!--<span v-if="info.sex=='男'">男</span><span v-else>女</span>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</router-link>-->
            <router-link to="/more/change/dowell" v-show="identify">
                <div class="personal">
                    <span>擅长科目</span>
                    <div class="img">
                        <span>{{info.dowell}}</span>
                    </div>
                </div>
            </router-link>
            <router-link to="/more/change/major" v-show="identify">
                <div class="personal">
                    <span>专业</span>
                    <div class="img">
                        <span>{{info.major}}</span>
                    </div>
                </div>
            </router-link>
            <router-link to="/more/change/years" v-show="identify">
                <div class="personal">
                    <span>教龄</span>
                    <div class="img">
                        <span>{{info.years}}年</span>
                    </div>
                </div>
            </router-link>
            <router-link to="/more/change/phonechange">
                <div class="personal">
                    <span>手机号</span>
                    <div class="img">
                        <span>{{info.phone}}</span>
                    </div>
                </div>
            </router-link>
            <router-link to="/more/change/addresschange">
                <div class="personal">
                    <span>地区</span>
                    <div class="img">
                        <span v-if="identify">{{info.area}}</span><span v-else>{{info.address}}</span>
                    </div>
                </div>
            </router-link>
            <router-link to="/more/change/signature">
                <div class="personal">
                    <span v-if='identify'>简介</span><span v-else>个性签名</span>
                    <div class="img">
                        <span v-if="identify">{{info.jianjie}}</span>  <span v-else>{{info.says}}</span>
                    </div>
                </div>
            </router-link>
        </div>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import CommonFooter from '@/components/common/CommonFooter'
    import Axios from 'axios'
    import $ from 'jquery'

    export default {
        data() {
            return {
                info: this.$store.state.info,
                identify: Number(this.$store.state.info.identify),
            }
        },
        components: {
            CommonFooter
        },
        mounted() {
        },
        methods: {
            back: function () {
                history.go(-1);
            },
            sub(e) {
                let formData = new FormData();
                formData.append('id', this.info.id);
                formData.append('identify', this.identify);
                formData.append('file', e.target.files[0]);
                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                Axios.post('http://127.0.0.1/ttyk/phpci/users/change_img', formData, config)
                    .then((res) => {
                        this.$router.push('/more');
                    })
            }
        }
    }
</script>

<style scoped>
    #header {
        width: 100%;
        position: fixed;
        height: 1rem;
        background: #2c93e0;
        z-index: 100;
    }

    #header img {
        height: 0.4rem;
        position: absolute;
        left: 0.2rem;
        top: 0.3rem;
    }

    #header h3 {
        text-align: center;
        color: #fff;
        line-height: 1rem;
    }

    #my-info {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }

    #information {
        margin-top: 1.2rem;
        background: #fff;
    }

    .personal {
        height: 1rem;
        border-bottom: 1px solid #ccc;
        padding: 0 0.3rem;
        font-size: 0.3rem;
    }

    .personal.pic {
        height: 1.4rem;
        line-height: 1.4rem;
        position: relative;
    }

    .personal span {
        line-height: 1rem;
        color: #000;
    }

    .img {
        float: right;
    }

    .img img {
        width: 1.1rem;
        height: 1.1rem;
        vertical-align: middle;
    }

    .img span {
        color: #888;
        font-size: 0.25rem;
    }

    #imageFile {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
</style>
