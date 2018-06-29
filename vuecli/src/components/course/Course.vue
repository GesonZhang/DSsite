<template>
    <div id="course">
        <common-header>
            <div class="page-title">我的课程表</div>
        </common-header>
        <ul class="nav">
            <li>
                <router-link to="/course/class">正在上课 &nbsp({{ID ? $store.state.sentlength1 : 0}})</router-link>
            </li>
            <li>
                <router-link :to="wait">等待上课&nbsp({{ID ? $store.state.sentlength0 : 0}})</router-link>
            </li>
            <li>
                <router-link :to="finish">已结束&nbsp({{ID ? $store.state.sentlength2 : 0}})</router-link>
            </li>
        </ul>
        <router-view></router-view>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import $ from 'jquery'
    import CommonHeader from '@/components/common/CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'

    export default {
        data() {
            return {
                wait: "/course/waiting",
                finish: '/course/finish',
                ID: localStorage.id
            }
        },
        components: {
            CommonHeader,
            CommonFooter,
        },
        mounted() {
            //判断用户是否登陆，未登录则不允许查看信息。
            this.wait = localStorage.id ? this.wait : "/course/class";
            this.finish = localStorage.id ? this.finish : "/course/class";
            if (!localStorage.id) {//未登录时候导航栏颜色表示
                $('.nav li').find('a.router-link-active').eq(0).css({
                    'text-decoration': 'none',
                    'color': 'deepskyblue',
                    'border-bottom': '1px solid deepskyblue'
                });
                $('.nav li').on('click', function () {
                    $(this).find('a.router-link-active').css({
                        'text-decoration': 'none',
                        'color': 'deepskyblue',
                        'border-bottom': '1px solid deepskyblue'
                    }).end().siblings().find('a').css({
                        'text-decoration': 'none',
                        'color': '#ccc',
                        'border-bottom': '1px solid #ccc'
                    })
                })
            } else {//登陆后，被选中的显示为蓝色，未选中的则保持灰色。
                $('.nav li').find('a.router-link-active').eq(0).css({
                    'text-decoration': 'none',
                    'color': 'deepskyblue',
                    'border-bottom': '1px solid deepskyblue'
                });
                $('.nav li').on('click', function () {
                    $(this).find('a.router-link-active').css({
                        'text-decoration': 'none',
                        'color': 'deepskyblue',
                        'border-bottom': '1px solid deepskyblue'
                    });
                    $(this).siblings().find('a').css({
                        'text-decoration': 'none',
                        'color': '#ccc',
                        'border-bottom': '1px solid #ccc'
                    })
                })
            }
        }
    }
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .page-title {
        background-color: skyblue;
        width: 6.4rem;
        text-align: center;
        height: 1rem;
        z-index: 100;
    }

    .nav {
        display: flex;
        height: 1rem;
        position: fixed;
        top: 1rem;
        width: 100%;
        z-index: 100;
        background: #fff;
    }

    .nav li {
        height: 1rem;
        flex: 1;
        text-align: center;
        line-height: 1rem;
    }

    .nav li a {
        padding: 0;
    }

    .nav li a {
        display: block;
        width: 100%;
        height: 100%;
        color: #ccc;
        outline: none;
    }

    .nav li a.router-link-active {
        background: #fff;
        color: #ccc;
        border-bottom: 1px solid #ccc;
    }

    /*  .nav li:nth-child(1) a.router-link-active{
        background: #fff;
        color:deepskyblue;
        border-bottom: 1px solid deepskyblue;

      }*/


</style>
