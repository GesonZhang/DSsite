<template>
    <div id="reg">
        <div class="header">
            <div class="back">
                <router-link to="/reg"><img src="../../assets/img/back.png" alt=""></router-link>
            </div>
            <h1 v-if="identify">教师注册</h1>
            <h1 v-else>学生注册</h1>
            <div class="reg">
                <router-link to="/login">返回登录</router-link>
            </div>
        </div>
        <div class="logo">
            <img src="../../assets/img/shishuologo.png" alt="">
        </div>
        <ul>
            <li>
                <img src="../../assets/img/user.png">
                <input type="text" placeholder="请输入用户名" id="name">
                <i class="iconfont icon-dui"></i>
            </li>
            <li>
                <img src="../../assets/img/accountuser.png">
                <input type="text" placeholder="请输入账号" id="account" @blur="t_account()">
                <i class="iconfont icon-dui"></i>
                <span id="repeat" style="display: none;color: #FF0000;    position: absolute;
    right: -0.6rem;">重复</span>
            </li>
            <li>
                <img src="../../assets/img/phone.png">
                <input type="text" placeholder="请输入手机号码" id="phone" @blur="t_phone()">
                <i class="iconfont icon-dui"></i>
            </li>
            <li>
                <img src="../../assets/img/password.png">
                <input type="password" placeholder="请输入密码" id="password" @blur="t_password()">
                <i class="iconfont icon-dui"></i>
            </li>
            <li>
                <img src="../../assets/img/password.png">
                <input type="password" placeholder="请再次输入密码" id="password_" @blur="t_password_()">
                <i class="iconfont icon-dui"></i>
            </li>
            <li class="sex">
                <img src="../../assets/img/sex.png">
                <input type="radio"name="sex" value="男"><span>男</span>
                <input type="radio"name="sex" value="女"><span>女</span>
            </li>
            <li v-show="identify">
                <img src="../../assets/img/collage.png">
                <input type="text" placeholder="毕业学校" id="school">
            </li>
            <li v-show="identify">
                <img src="../../assets/img/master.png">
                <input type="text" placeholder="学历（本科、研究生、博士）" id="education">
            </li>
        </ul>
        <div class="agreement">
            <input type="checkbox" name="agreement"/>我已阅读并同意
            <router-link to="">《师说 用户协议》</router-link>
            <p v-show="identify">注意：登录后请尽快完善个人信息，便于通过审核。未通过审核则无法发布课程。</p>
        </div>
        <a class="next" href="javascript:;" @click="check()">确定</a>
    </div>
</template>
<script>
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                account: false,
                phone: false,
                password: false,
                password_: false,
                identify: this.$store.state.identify
            }
        },
        components: {},
    mounted: function(){
console.log(this.identify)
    },
        methods: {
            wrong($i) {
                $i.attr('class', 'iconfont icon-cuo').css('color', '#f00');
            },
            right($i) {
                $i.attr('class', 'iconfont icon-dui').css('color', '#0f0');
            },
            test(reg, input) {
                if (reg.test(input.val())) {
                    this.right(input.next());
                    return true;
                } else {
                    this.wrong(input.next());
                }
            },
            t_account() {
                var $i = $('#account').next();
                var reg = /^([a-zA-Z0-9]{2,10})$/;
                if (reg.test($('#account').val())) {
                    Axios.get('http://localhost/ttyk/phpci/users/test', { // 账号重复
                        params: {
                            account: $('#account').val()
                        }
                    }).then((res) => {
                        if (!res.data) {
                            this.wrong($i);$('#repeat').css('display','inline-block');
                        } else {
                            this.right($i);
                            this.account = true;$('#repeat').css('display','none');
                        }
                    })
                } else {
                    this.wrong($i);
                }
            },
            t_phone() {
                var reg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]){1})+\d{8})$/;
                if (this.test(reg, $('#phone'))) this.phone = true;
            },
            t_password() {
                var reg = /^(([a-zA-Z0-9]{2,10}))$/;
                if (this.test(reg, $('#password'))) this.password = true;
            },
            t_password_() {
                if ($('#password_').val() == $('#password').val() && $('#password_').val()) {
                    this.password_ = true;
                    this.right($('#password_').next());
                    return true;
                } else {
                    this.wrong($('#password_').next());
                    return false;
                }
            },
            check() {
                this.password_ = this.t_password_();
                var obj = {
                    identify: this.identify,
                    name: $('#name').val(),
                    account: $('#account').val(),
                    password: $('#password').val(),
                    phone: $('#phone').val(),
                    sex: $('.sex input:checked').val(),
                    school: $('#school').val(),
                    education: $('#education').val(),
                };
                if (this.account && this.phone && this.password && this.password_ && $('input:checked').length == 2) {
                    Axios.get('http://localhost:3000/users/reg', {
                        params: obj
                    })
                        .then((res) => {
                            if (res.data) {
//                                console.log(res.data)
                                alert('注册成功');
                                this.$router.push('/login')
                            }
                        }).catch((err) => {
                        console.log(err)
                    });
                } else {
                    console.log('错误');
                }
            }
        }
    }
</script>

<style scoped>
    @import '../../assets/fonts/iconfont/iconfont.css';

    #reg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: -4rem;
        background: #f5f5f5;
    }

    #reg .header {
        height: 1rem;
        background: #1296db;
        color: #fff;
        position: fixed;
        top: 0;
        width: 100%;
        line-height: 1rem;
        text-align: center;
        display: flex;
        z-index: 100;
    }

    #reg .header h1 {
        flex: 2;
        text-indent: 0.8rem;
        font-size: 0.4rem;
        line-height: 1rem;
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

    #reg .header .reg {
        height: 1rem;
        width: 1.5rem;
        text-align: center;
        font-size: 0.3rem;
    }

    #reg .header .reg a {
        color: #fff;
        outline: none;
    }

    #reg .logo {
        margin-top: 1.5rem;
        height: 2rem;
        text-align: center;
    }

    #reg .logo img {
        height: 100%;
    }

    #reg ul {
        padding: .5rem 1rem 0;
    }

    #reg li {
        height: 1rem;
        padding: .25rem 0;
        text-align: center;
        position: relative;
        display: flex;
    }

    #reg li img {
        height: 100%;
        flex: 1;
    }

    #reg li input {
        flex: 10;
        height: 100%;
        outline-style: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        text-align: center;
        font-size: .22rem;
        margin: 0 .2rem;
    }

    #reg li i {
        flex: 1;
        font-size: .45rem;
        position: relative;
        top: -0.15rem;
        color: #f5f5f5;
    }

    #reg li.sex input {
        flex: 2;
        height: 50%;
        position: relative;
        top: .13rem;
    }

    #reg li.sex span {
        flex: 5;
        font-size: .3rem;
    }

    #reg .agreement {
        font-size: 0.2rem;
        text-align: center;
    }

    #reg .agreement input {
        margin-right: .1rem;
    }

    #reg .agreement a {
        color: green;
    }

    #reg .next {
        display: block;
        width: 3rem;
        height: 0.8rem;
        background: deepskyblue;
        border-radius: 0.1rem;
        margin: 0.5rem auto;
        font-size: 0.3rem;
        line-height: 0.8rem;
        text-align: center;
        color: #fff;
    }
</style>