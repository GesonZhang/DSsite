<template>
    <div id="del-class">
        <div class="header">
            <i class="glyphicon glyphicon-menu-left" @click="back()"></i>
            <h4>注册用户审核</h4>
        </div>
        <div class='del-class'>
            <div class="class-list" v-for='(msg,index) in classList'>
                <div class="left" v-show="!(isShow==index)">
                    <p>姓名：{{msg.name}}</p>
                    <p>性别：{{msg.sex}}</p>
                    <p>学校：{{msg.school}}</p>
                    <p>学历：{{msg.xueli}}</p>
                    <p>我的简介：{{msg.jianjie}}</p>
                    <p>我的电话：{{msg.phone}}</p>
                    <p>申请时间：{{msg.join_time}}</p>
                </div>
                <template>
                    <div class="right">
                        <el-button type="text" @click="open2(msg.id,index)">拒绝</el-button>
                        <el-button type="text" @click="open3(msg.id,index)">接受</el-button>
                    </div>
                </template>
            </div>
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
                classList: [],
                isShow: -1
            }
        },
        components: {
            CommonFooter,
        },
        methods: {
            back() {
                history.go(-1);
            },
            del: function (id, index) {

            },
            //拒绝申请
            open2(id, index) {
                this.$confirm('是否拒绝该教师注册申请?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    Axios.get('http://localhost:3000/reg_checkN', {
                        params: {
                            j_id: id,
                        }
                    }).then((res) => {
                        if (res.data == 'true') {
                            this.classList.splice(index, 1)
                            this.isShow = index;
                        }
                    });
                    this.$message({
                        type: 'success',
                        message: '已拒绝申请!'
                    });
                    this.$router.push('/more/reg_check');
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '已取消拒绝处理。'
                    });
                });
            },
            //同意并接受申请
            open3(id, index) {
                this.$confirm('是否接受该教师注册申请?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    Axios.get('http://localhost:3000/reg_checkY', {
                        params: {
                            j_id: id,
                        }
                    }).then((res) => {
                        if (res.data == 'true') {
                            this.classList.splice(index, 1)
                        }
                    });
                    this.$message({
                        type: 'success',
                        message: '成功接受请求!'
                    });
                    this.$router.push('/more/reg_check');
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '已取消接受处理。'
                    });
                });
            }
        },
        mounted: function () {
            Axios.get('http://localhost:3000/reg_check', {
                params: {
                    c_check: 0
                }
            }).then((res) => {
                this.classList = JSON.parse(res.data);
            });
        }
    }
</script>
<style>

</style>
<style scoped>
    /*@import "../../assets/bootstrap/css/bootstrap.min.css"*/
    .el-message-box {
        width: 5.0rem;
    }

    .el-button, .el-button--text {
        background-color: #FF4364;
        color: #fff;
        padding: 0.2rem;
        font-size: 0.22rem;
    }

    #del-class {
        position: absolute;
        left: 0;
        top: 1rem;
        right: 0;
        /*bottom:0rem;*/
        background: url('/static/bgImg/b3.jpg') repeat;
        background-size: cover;
        color: #000;
        background-attachment: fixed;
        min-height: 100vh
    }

    .header {
        width: 100%;
        z-index: 888;
        position: fixed;
        top: 0;
        height: 1rem;
        background: #31C37C;
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
        padding: 0.2rem;
        /*display: flex;*/
        border: 1px solid #ccc;
        color: #000;
        font-size: 0.27rem;
        position: relative;
    }

    .class-list:last-child {
        margin-bottom: 1rem;
    }

    .left {
        /*flex: 1;*/
        font-size: 0.26rem;
        color: #141414;
    }

    .right {
        position: absolute;
        top: .1rem;
        right: .1rem;
        text-align: right;
        /*flex:1;*/
    }


</style>
