<template>
    <div id="del-class">
        <div class="header">
            <i class="glyphicon glyphicon-menu-left" @click="back()"></i>
            <h4>我的课程</h4>
        </div>
        <div class='del-class'>
            <div class="class-list" v-for='(msg,index) in classList'>
                <div class="left">
                    <p>{{msg.c_subject}}</p>
                </div>
                <template>
                    <el-button type="text" @click="open2(msg.c_id,index)">取消课程</el-button>
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
            open2(id, index) {
                this.$confirm('是否删除该课程?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    //检验当前课程是否有人报名
                    Axios.get('http://localhost:3000/checkJoinClass', {
                        params: {
                            c_id: id,
                        }
                    }).then((res) => {
                        //console.log(res)
                        if (res.data) {//没有学生报名，进行删除操作
                            this.$message({
                                type: 'success',
                                message: '当前课程有学生，暂时不能删除!'
                            });
                        }else{
                            Axios.get('http://localhost:3000/delClass', {
                                params: {
                                    c_id: id,
                                }
                            }).then((res) => {console.log(res.data)
                                if (res.data == 'true') {
                                    this.classList.splice(index, 1)
                                }
                            });
                            this.$message({
                                type: 'success',
                                message: '删除成功!'
                            });
                        }
                    });

                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '已取消删除'
                    });
                });
            }
        },
        mounted: function () {
            Axios.get('http://localhost:3000/teacherClass', {
                params: {
                    id: localStorage.id,
                }
            }).then((res) => {
                this.classList = JSON.parse(res.data);
            });
        }
    }
</script>
<style>
    .el-message-box {
        width: 5.0rem;
    }

    .el-button, .el-button--text {
        background-color: #FF4364;
        color: #fff;
        padding: 0.2rem;
        font-size: 0.22rem;
    }
</style>
<style scoped>
    /*@import "../../assets/bootstrap/css/bootstrap.min.css"*/

    #del-class {
        position: absolute;
        left: 0;
        top: 1rem;
        right: 0;
        bottom: 1rem;
        background: url('/static/bgImg/b3.jpg') no-repeat;
        background-size: cover;
        color: #000;
        background-attachment: fixed;
        min-height: 100vh
    }

    .header {
        width: 100%;
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
        display: flex;
        border: 1px solid #ccc;
        color: #000;
        font-size: 0.27rem;
    }

    .class-list:last-child {
        margin-bottom: 1rem;
    }

    .left {
        flex: 1;
        font-size: 0.26rem;
        color: #141414;
    }

    .right {

        flex: 1;
    }


</style>
