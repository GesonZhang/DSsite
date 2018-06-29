<template>
    <div class="management">
        <common-header></common-header>
        <div class="btn-box">
            <button class="change-img">修改头像
                <input type="file" id="imageFile" @change="sub($event)"></button>
            <br/>
            <router-link to="/more/change/namechange">
                <button>修改昵称</button>
                <br/></router-link>
            <router-link to="/more/change/phonechange">
                <button>绑定修改</button>
                <br/></router-link>
            <router-link to='/more/changepassword'>
                <button>修改密码</button>
            </router-link>
            <br/>
        </div>
        <common-footer></common-footer>
    </div>
</template>
<script>
    import Axios from 'axios'
    import $ from 'jquery'
    import CommonHeader from './CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'

    export default {
        data() {
            return {
                info: this.$store.state.info,
                identify: Number(this.$store.state.info.identify),
            }
        },
        components: {
            CommonHeader,
            CommonFooter
        },
        mounted() {
            $('a').css({"color": "black"})
        },
        methods: {
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
    .btn-box {
        width: 5.2rem;
        margin: 1rem auto;
        text-align: center;
    }

    .btn-box button {
        margin-bottom: 1rem;
        padding: .2rem 1rem;
    }

    .change-img {
        position: relative;
    }

    #imageFile {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
</style>