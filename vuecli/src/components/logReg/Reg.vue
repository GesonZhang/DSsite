<template>
    <div id="reg">
        <div class="header">
            <div class="back">
                <router-link to="/login"><img src="../../assets/img/back.png" alt=""></router-link>
            </div>
        </div>
        <div class="reg-btn" @click="reg(false)">学生注册</div>
        <div class="reg-btn" @click="reg(true)">教师注册</div>
    </div>
</template>
<script>
    export default {
        data() {
            return {}
        },
        methods: {
            reg(boo) {
                this.$store.dispatch('identify', boo);
                this.$router.push('/do_reg');
            }
        }
    }
</script>

<style scoped>
    @import "../../assets/css/reset.css";

    #reg {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        height: 100%;
        /*background: url('/static/teaImg/1.jpg') no-repeat;*/
        background-size: cover;
    }

    #reg .header {
        height: 1rem;
        background: skyblue;
        color: #fff;
        position: fixed;
        top: 0;
        width: 100%;
        line-height: 1rem;
        text-align: center;
        display: flex;
    }

    #reg .header .back {
        height: 0.4rem;
        width: 0.4rem;
        text-align: center;
        line-height: 1rem;
        float: right;
        margin-top: 0.3rem;
        margin-left: 0.1rem;
    }

    #reg .reg-btn {
        text-align: center;
        margin-top: 3rem;
        width: 4rem;
        height: 1rem;
        margin-left: 1.2rem;
        background: skyblue;
        border-radius: 0.1rem;
        line-height: 1rem;
        font-size: .3rem;
        color: #fff;
    }
</style>