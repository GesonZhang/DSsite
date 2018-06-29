<template>
    <div class="common-footer">
        <ul>
            <li>
                <router-link to="/indexreal">
                    <img src="/static/img/icn_tec_def.png" alt="">
                    <p>首页</p>
                </router-link>
            </li>
            <li>
                <router-link to="/education">
                    <img src="/static/img/icn_tut_def.png" alt="">
                    <p>家教</p>
                </router-link>
            </li>
            <li>
                <router-link to="/course">
                    <img src="/static/img/icn_tit_def.png" alt="">
                    <p>课程表</p>
                </router-link>
            </li>
            <li>
                <router-link to="/more">
                    <img src="/static/img/icn_psn_def.png" alt="">
                    <p>个人中心</p>
                </router-link>
            </li>
        </ul>
    </div>
</template>
<script>
    import $ from 'jquery'

    export default {
        data() {
            return {}
        },
        mounted() {
            var $img = $('.router-link-active img');
            $img.attr('src', $img.attr('src').replace(/def/, "sel"));
            $('.router-link-active p').css('color', "#2c93e0");
        },
        methods: {}
    }

</script>
<style scoped>
    .common-footer {
        width: 100%;
        height: 1rem;
        position: fixed;
        bottom: 0;
        background-color: #fff;
        border-top: 1px solid #ccc;
        font-size: 0.25rem;
    }

    .common-footer ul {
        display: flex;
        height: 100%;
    }

    .common-footer > ul > li {
        flex: 1;
        height: 100%;
        text-align: center;
    }

    .common-footer a {
        display: block;
        width: 100%;
        height: 100%;
        /*padding-top: 0.05rem;*/
    }

    .common-footer a.router-link-active {
        color: #2c93e0;
    }

    .common-footer img {
        width: 0.53rem;
        height: 0.53rem;
    }

    .common-footer p {
        color: #b8b8b8;
        font-size: .25rem;
    }

</style>
