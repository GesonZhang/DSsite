<template>
    <div id="skin">
        <common-header></common-header>
        <ul class="list">
            <li v-for="src in imgList" @click="change_skin(src)"><img :src="src" alt=""></li>
        </ul>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import CommonHeader from '../CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                imgList: ['/static/img/skin/1.jpg', '/static/img/skin/2.jpg', '/static/img/skin/3.jpg', '/static/img/skin/4.jpg', '/static/img/skin/5.jpg', '/static/img/skin/6.jpg', '/static/img/skin/7.jpg']
            }
        },
        components: {
            CommonHeader,
            CommonFooter
        },
        methods: {
            change_skin(src) {
                Axios.get('http://127.0.0.1/ttyk/phpci/users/change_info', {
                    params: {
                        id: localStorage.id,
                        form: Number(localStorage.identify) ? 'teacher' : 'student',
                        prop: 'skin',
                        val: src,
                    }
                }).then((res) => {
                    this.$router.push('/more');
                })
            }
        }
    }
</script>

<style scoped>
    .list {
        margin: .9rem 0 1rem;
    }
</style>






