<template>
    <div id="header">
        <i class="glyphicon glyphicon-menu-left" @click="back()"></i>
        <slot></slot>
        <span class="sub" @click="change()">保存</span>
    </div>
</template>

<script>
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        props: ['prop'],
        data() {
            return {}
        },
        methods: {
            back() {
                history.go(-1);
            },
            change() {
                Axios.get('http://localhost/ttyk/phpci/users/change_info', {
                    params: {
                        id: this.$store.state.info.id,
                        form: Number(this.$store.state.info.identify) ? 'teacher' : 'student',
                        prop: this.prop,
                        val: $('input').val()
                    }
                }).then((res) => {
                    location = '/more';
                });
            }
        }
    }
</script>

<style scoped>
    #header {
        position: fixed;
        top: 0;
        width: 100%;
        height: .9rem;
        background: #2c93e0;
        text-align: center;
        color: #fff;
        line-height: .9rem;
    }

    #header .glyphicon {
        position: absolute;
        font-size: 0.4rem;
        color: #fff;
        top: 0.25rem;
    }

    #header .glyphicon-menu-left {
        left: 0.3rem;
    }

    #header .glyphicon-search {
        right: 0.3rem;
    }

    #header span {
        font-size: 0.4rem;
    }

    #header .sub {
        position: absolute;
        right: 0.3rem;
        font-size: 0.33rem;
    }
</style>