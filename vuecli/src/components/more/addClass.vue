<template>
    <div id="add-class">
        <div class="header">
            <i class="glyphicon glyphicon-menu-left" @click="back()"></i>
            <h4>发布课程</h4>
        </div>
        <div class='add-class'>

            <ul class="class-list">
                <li><span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:</span><input type="text" v-model='name'></li>
                <li><span>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级:</span><input type="text" v-model='grade'
                                                                                     placeholder="示例：五年级 高三"></li>
                <li><span>科&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目:</span><input type="text" v-model='subject'></li>
                <li><span>课程描述:</span><input type="text" v-model='describe'></li>
                <li><span>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><input type="text" v-model='price'
                                                                                     placeholder="示例：999（默认为元）"></li>
                <li><span>授课方式:</span><input type="text" v-model='method' placeholder="远程/面议等"></li>
                <li class='try'><span>可否试听:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name='try'
                                                                                             value="1" v-model=c_try>YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                        type="radio" name='try' value="0" v-model=c_try>NO
                </li>
                <li><span>上课时间:</span><input class="time" type="text" v-model='time' placeholder="示例：2018-01-01。"></li>
                <li><span>结课时间:</span><input class="end_time" type="text" v-model='end_time'
                                             placeholder="示例：2018-01-01。"></li>
                <li><span>上课地点:</span><input type="text" v-model='address'></li>
                <li><span>联系电话:</span><input type="text" v-model='tel'></li>
                <button class='submit' @click='submit'>发布课程</button>
            </ul>


        </div>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import CommonFooter from '@/components/common/CommonFooter'
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                name: localStorage.name,
                grade: '',
                subject: '',
                describe: '',
                price: '',
                method: '',
                time: '',
                end_time: '',
                c_try: '',
                address: '',
                tel: localStorage.phone
            }
        },
        components: {
            CommonFooter,
        },
        mounted() {//日期的正则表达式
            var reg = /^[1-9]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
            var regExp = new RegExp(reg);
            var _this =this;
            $('.time').blur(function () {
                if (!regExp.test(_this.time)) {
                    alert("日期格式不正确，开课时间正确格式为：2018-01-01");
                }
            })
            $('.end_time').blur(function () {
                if (!regExp.test(_this.end_time)) {
                    alert("日期格式不正确，结课时间正确格式为：2018-01-01");
                }
            })
        },
        methods: {
            back() {
                history.go(-1);
            },
            submit: function () {
                //日期的正则表达式
                var reg = /^[1-9]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
                var regExp = new RegExp(reg);
                if (!localStorage.id) {
                    alert('请你先登录。');
                } else if (this.name == '' || this.grade == '' || this.subject == '' || this.describe == '' || this.price == '' || this.method == '' || this.time == '' || this.end_time == '' || this.c_try == '' || this.address == '' || this.tel == '') {
                    alert('请将信息填写完整，谢谢。')
                } else if (!regExp.test(this.time)) {
                    alert("日期格式不正确，开课时间正确格式为：2018-01-01");
                    return;
                } else if (!regExp.test(this.end_time)) {
                    alert("日期格式不正确，结课时间正确格式为：2018-01-01");
                    return;
                } else {
                    Axios.get('http://localhost:3000/addClass', {
                        params: {
                            id: localStorage.id,
                            name: this.name,
                            grade: this.grade,
                            subject: this.subject,
                            describe: this.describe,
                            price: this.price,
                            method: this.method,
                            time: this.time,
                            end_time: this.end_time,
                            c_try: this.c_try,
                            address: this.address,
                            tel: this.tel
                        }
                    }).then((res) => {
                        if (res.data == 'success') {
                            this.$router.push('/more');
                        } else {
                            alert('发布课程失败')
                        }
                    });
                }
            }
        }
    }
</script>

<style scoped>
    /*@import "../../assets/bootstrap/css/bootstrap.min.css"*/
    #add-class {
        position: absolute;
        left: 0;
        top: 1rem;
        right: 0;
        bottom: 1rem;
        background: url('/static/bgImg/b3.jpg') no-repeat;
        background-size: cover;
        color: #000;
    }

    .header {
        width: 100%;
        position: fixed;
        top: 0;
        height: 1rem;
        background: skyblue;
        text-align: center;
    }

    .header i {
        font-size: 0.55rem;
        color: #fff;
        position: absolute;
        left: 0.2rem;
        top: 0.2rem;
    }

    .header h4 {
        line-height: 1rem;
        color: #fff;
        font-size: 0.35rem;
    }

    .class-list {
        text-align: center;
        margin-top: 0.5rem;

    }

    .class-list li {
        height: 0.7rem;
        line-height: 0.7rem;
        font-size: 0.25rem;
    }

    input {
        outline: none;
        border: 1px solid skyblue;
        height: 0.5rem;
        border-radius: 0.1rem;
    }

    .submit {
        margin-top: 0.3rem;
        width: 2rem;
        height: 0.7rem;
        border: 0;
        background: skyblue;
        color: #fff;
        border-radius: 0.15rem;
        outline: none;
    }

    .try input {
        line-height: 0.7rem;
        position: relative;
        top: .15rem;
    }
</style>
