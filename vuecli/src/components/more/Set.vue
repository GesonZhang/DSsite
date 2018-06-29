<template>
    <div id="set">
        <common-header></common-header>
        <div class="content">
            <ul>
                <router-link to='/more/accountmanage'>
                    <li>帐号管理</li>
                </router-link>
                <router-link to='/message'>
                    <li>消息</li>
                </router-link>
                <router-link to='/more/change/skin'>
                    <li>换肤</li>
                </router-link>
            </ul>
            <button id="logout" @click="logout()">退出登录</button>
        </div>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import CommonHeader from './CommonHeader'
    // import imageHtmlUpload from '@/components/education/imgUpload'
    import CommonFooter from '@/components/common/CommonFooter'
    import $ from 'jquery'

    export default {
        data() {
            return {}
        },
        components: {
            CommonFooter,
            // imageHtmlUpload,
            CommonHeader
        },
        methods: {
            back() {
                history.go(-1);
            },
            logout() {
                this.$store.dispatch('info', '');
                localStorage.clear();
                this.back();
            }
        }
    }
</script>

<style scoped>
    .content {
        position: fixed;
        left: 0;
        top: 0.91rem;
        bottom: 1rem;
        right: 0;
        background: url('/static/bgImg/b3.jpg') no-repeat;
        background-size: cover;
    }

    .content ul {
        width: 5rem;
        margin: 0 auto;
        text-align: center;
    }

    .content ul li {
        color: #000;
        font-size: 18px;
        height: 1rem;
        line-height: 1rem;
        border-bottom: 1px solid #ccc;
    }

    #logout {
        margin: 0 auto;
        width: 80%;
        height: 0.8rem;
        background: red;
        color: #fff;
        font-size: 0.3rem;
        border: 0;
        border-radius: 0.2rem;
        position: fixed;
        left: 10%;
        bottom: 3rem;
    }
</style>
