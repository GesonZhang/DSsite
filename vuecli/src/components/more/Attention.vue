<template>
    <div id="attention">
        <common-header></common-header>
        <ul id="list">
            <li v-for="(t,index) in teacherList">
                <router-link :to="'/teacher-msg/'+t.id">
                    <div class="pic"><img :src="t.img" alt=""></div>
                    <div class="info">
                        <h4>{{t.name}}</h4>
                        <p>{{t.jianjie}}</p>
                    </div>
                </router-link>
                <div class="btn" @click="toggle(index,t.id)">
                    <img src="/static/img/14_02icn_acc.png" alt="" class="btn1">
                    <img src="/static/img/14_01icn_ccn.png" alt="" class="btn2">
                </div>
            </li>
        </ul>
        <common-footer></common-footer>
    </div>
</template>

<script>
    import CommonHeader from './CommonHeader'
    import CommonFooter from '@/components/common/CommonFooter'
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                id: this.$store.state.info.id,
                teacherList: []
            }
        },
        components: {
            CommonFooter,
            CommonHeader
        },
        methods: {
            toggle(index, t_id) {
                $('.btn1').eq(index).toggle();
                $('.btn2').eq(index).toggle();
                Axios.get('http://localhost:3000/users/toggle_attention', {
                    params: {
                        t_id: t_id,
                        s_id: this.id
                    }
                }).then((res) => {
                    console.log(res.data);
                }).catch((err) => {
                    console.log(err)
                });
            }
        },
        mounted() {
            Axios.get('http://localhost:3000/users/attention', {
                params: {
                    id: this.id
                }
            }).then((res) => {
                this.teacherList = JSON.parse(res.data);
            });
        }
    }

</script>

<style scoped>
    #attention {
        width: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        background: #f0f0f0;
    }

    #list {
        margin: 1rem 0;
    }

    #list li {
        height: 1.5rem;
        background: #fff;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        margin: 0.2rem 0;
        display: flex;
    }

    #list li a {
        flex: 5;
        display: flex;
        width: 100%;
        height: 100%;
        color: #000;
        padding: .25rem 0.3rem;
        font-size: .25rem;
    }

    #list li a h4 {
        font-size: .25rem;
    }

    #list .pic {
        flex: 3;
    }

    #list .pic img {
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        vertical-align: middle;
    }

    #list .info {
        flex: 7;
        height: 100%;
        overflow: hidden;
        padding: 0.15rem;
    }

    #list .info p {
        color: #999;
        padding-top: 0.1rem;
    }

    #list .btn {
        flex: 1;
        line-height: 1.5rem;
    }

    #list .btn img {
        height: 0.8rem;
        vertical-align: middle;
    }

    .btn2 {
        display: none;
    }
</style>
