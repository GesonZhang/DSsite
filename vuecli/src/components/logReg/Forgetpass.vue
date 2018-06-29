<template>
    <div id="forgetpass">
        <div class="header">
            <div class="back">
                <router-link to="/login"><img src="../../assets/img/back.png" alt=""></router-link>
            </div>
            <h1>忘记密码</h1>
            <div class="reg">
                <router-link to="/reg">注册</router-link>
            </div>
        </div>
        <div class="confirm comfirm-phone">
            <img src="../../assets/img/phone.png" alt="">
            <input type="text" placeholder="请输入手机号" class="number">
        </div>
        <div class="confirm">
            <img src="../../assets/img/confirm.png" alt="">
            <input type="text" placeholder="请输入短信验证码">
            <input type="submit" value="发送验证码" class="send-btn">
        </div>
        <div class="next">
            <router-link to="/phone_message">下一步</router-link>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {}
        }
    }
</script>

<style scoped>
    #forgetpass .header {
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

    #forgetpass .header h1 {
        flex: 2;
        text-indent: 0.8rem;
        font-size: 0.4rem;
        line-height: 1rem;
    }

    #forgetpass .header .back {
        height: 0.4rem;
        width: 0.4rem;
        text-align: center;
        line-height: 1rem;
        float: right;
        margin-top: 0.3rem;
        margin-left: 0.1rem;
    }

    #forgetpass .header .reg {
        height: 1rem;
        width: 1.5rem;
        text-align: center;
        font-size: 0.3rem;
    }

    #forgetpass .header .reg a {
        color: #fff;
        outline: none;
    }

    #forgetpass .comfirm-phone {
        margin-top: 2rem;
    }

    #forgetpass .comfirm-phone .number {
        width: 4rem;
        text-align: left;
    }

    #forgetpass .confirm {
        width: 100%;
        height: 1rem;
        background: #fff;
        border: 1px solid #ccc;
        /*margin-bottom: .1rem;*/
        /*text-align: center;*/
    }

    #forgetpass .confirm img {
        height: 60%;
        float: left;
        margin-top: 0.2rem;
        margin-left: 0.2rem
    }

    #forgetpass .confirm input {
        height: .8rem;
        width: 2.5rem;
        font-size: 0.2rem;
        outline: none;
        border: 0;
        line-height: .8rem;
        font-size: 16px;
    }

    #forgetpass .confirm .send-btn {
        width: 2rem;
        height: 0.5rem;
        background: red;
        color: #fff;
        border-radius: 0.1rem;
        float: right;
        margin-right: 0.5rem;
        margin-top: 0.25rem;
    }

    #forgetpass .next {
        width: 3rem;
        height: 0.8rem;
        background: #ccc;
        border-radius: 0.1rem;
        margin: 0.5rem auto;
        font-size: 0.3rem;
        line-height: 0.8rem;
        text-align: center;
    }

    #forgetpass .next a {
        color: #fff;
    }
</style>