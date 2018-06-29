<template>
    <div id="sex-change">
        <common-header>
            <span>性别</span>
        </common-header>
        <div id="information">
            <div class="personal" @click="sex=true;change_sex('男')">
                <span>男</span>
                <div class="img">
                    <img src="../../../assets/img/42_01选中-圆-实心蓝.png" alt="" v-show="sex">
                </div>
            </div>
            <div class="personal" @click="sex=false;change_sex('女')">
                <span>女</span>
                <div class="img">
                    <img src="../../../assets/img/42_01选中-圆-实心蓝.png" alt="" v-show="!sex">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios'
    import CommonHeader from '../CommonHeader'

    export default {
        data() {
            return {
                sex: this.$store.state.info.sex == '男' ? true : false,
            }
        },
        components: {
            CommonHeader
        },
        mounted() {
        },
        methods: {
            change_sex(sex) {
                Axios.get('http://localhost/ttyk/phpci/users/change_info', {
                    params: {
                        id: this.$store.state.info.id,
                        form: Number(this.$store.state.info.identify) ? 'teacher' : 'student',
                        prop: 'sex',
                        val: sex,
                    }
                }).then((res) => {
                    this.$router.push('/more');
                });
            }
        },

    }
</script>

<style scoped>
    #header {
        width: 100%;
        position: fixed;
        height: 1rem;
        background: #2c93e0;
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

    #sex-change {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }

    .personal {
        height: 0.6rem;
        border-bottom: 1px solid #ccc;
        background: #fff;
        line-height: 0.6rem;
        padding: 0 0.2rem;
    }

    #information {
        padding-top: 1.2rem;
        /*background: #fff;*/
    }

    .img {
        float: right;
    }

    .img img {
        width: 0.3rem;
        height: 0.3rem;
        margin-top: 0.1rem;
    }
</style>
