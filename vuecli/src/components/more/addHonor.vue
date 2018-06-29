<template>
    <div id="add-class">
        <div class="header">
            <i class="glyphicon glyphicon-menu-left" @click="back()"></i>
            <h4>个人荣誉</h4>
        </div>
        <div class='add-honor'>
            <div class="honor-list" v-for='(msg,index) in teacherHonor'>
                <div class="left">
                    <p>{{msg.honor_medal}}</p>
                    <p>{{msg.honor_time}}</p>
                </div>
                <div class="right">
                    <img :src="msg.honor_img" alt="" class="right-img" @click='show(index)'>
                </div>
            </div>
            <!-- 弹层图片开始 -->
            <div id="tancen-img" v-if='flag' @click='flag=!flag'>
                <div class="tancen-img">
                    <img :src="teacherHonor[index1].honor_img" class="honor-img">
                    <p class="honor-content">
                        <span>{{teacherHonor[index1].honor_medal}}</span><br><span>{{teacherHonor[index1].honor_time}}</span>
                    </p>
                </div>
            </div>
            <!-- 弹层图片开始结束 -->

        </div>
        <div id="honor-img">
            <span class="honor-content">证件类型:&nbsp;</span><input type="text" placeholder="请输入证件类型"
                                                                 v-model='honor.content'><br>
            <span class="honor-content">证件时间:&nbsp;</span><input type="text" placeholder="请输入证件类型"
                                                                 v-model='honor.h_time'>
            <el-upload
                    class="upload-demo"
                    ref="upload"
                    :data='honor'
                    action="http://127.0.0.1/ttyk/phpci/teacher/do_upload"
                    name='userfile'
                    :on-preview="handlePreview"
                    :on-remove="handleRemove"
                    :file-list="fileList"
                    :on-success="handleAvatarSuccess"
                    :before-upload="beforeAvatarUpload"
                    :auto-upload="false">
                <el-button slot="trigger" size="small" type="primary">证件照片</el-button>
                <el-button style="margin-left: 10px;" size="small" type="success" @click="submitUpload">上传证件</el-button>
                <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
            </el-upload>
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
                teacherMsg: {},
                teacherHonor: [],
                flag: false,
                fileList: [],
                honor: {
                    t_id: localStorage.id,
                    content: '',
                    h_time: ''
                },
                imageUrl: ''
            }
        },
        components: {
            CommonFooter,
        },
        mounted: function () {
            Axios.get('http://localhost:3000/teacherHonor', {
                params: {
                    id: localStorage.id,
                }
            }).then((res) => {
                this.teacherHonor = JSON.parse(res.data);
            });
        },
        methods: {
            back() {
                history.go(-1);
            },
            show: function (num) {
                this.index1 = num;
                this.flag = true;
            },
            submitUpload() {
                this.$refs.upload.submit();
            },
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePreview(file) {
                console.log(file);
            },
            handleAvatarSuccess(res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);
                this.teacherHonor = res;
            },
            beforeAvatarUpload(file) {
                const isJPG = file.type === 'image/jpeg';
                const isLt2M = file.size / 1024 / 1024 < 2;
                if (!isJPG) {
                    this.$message.error('上传图片只能是 JPG 格式!');
                }
                if (!isLt2M) {
                    this.$message.error('上传图片大小不能超过 2MB!');
                }
                return isJPG && isLt2M;
            }
        },
    }
</script>

<style>
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

    .honor-list {
        padding: 0.2rem;
        display: flex;
        color: #000;
        font-size: 0.27rem;
        border-bottom: 1px solid #ccc;
    }

    .left {
        flex: 1;
        font-size: 0.25rem;
    }

    .right {
        flex: 1;
    }

    .right img {
        float: right;
        width: 1rem;
        height: 1rem;
    }

    .submit {
        margin-top: 0.3rem;
        width: 2rem;
        height: 0.7rem;
        border: 0;
        background: red;
        color: #fff;
        border-radius: 0.15rem;
        outline: none;
    }

    #tancen-img {
        z-index: 15;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: rgba(100, 100, 100, 0.3);
    }

    .tancen-img {
        text-align: center;
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -2.4rem;
        margin-top: -3.2rem;
        width: 4.8rem;
        height: 6.4rem;
        border-radius: 0.3rem;
        overflow: hidden;
        background: #fff;
    }

    .tancen-img .honor-img {
        width: 100%;
        height: 4.8rem;
    }

    .honor-content {
        padding: 0.2rem 0;
    }

    .honor-content span {

        color: #00bcd4;
        font-size: 0.3rem;
    }

    #honor-img .el-upload__input {
        display: none;
    }

    .honor-content {
        color: #000;
        font-size: 0.25rem;
    }

    #honor-img {
        margin-top: 0.5rem;
    }

    #honor-img {
        padding: 0.2rem;
    }

    #honor-img input {
        border: 1px solid #ccc;
        height: 0.5rem;
        border-radius: 0.1rem;
        margin-bottom: 0.2rem;
        padding-left: 0.15rem;
    }


</style>
