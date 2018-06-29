<template>
    <div class="common-header">
        <slot>
            <div class="header-box">
                <div class="header-left" @click="goBack">
                    &lt;
                </div>
                <div class="header-mid">
                    <select @click='catalogChange()' class="form-control">
                        <option value="语文">语文</option>
                        <option value="英语">英语</option>
                        <option value="物理">物理</option>
                        <option value="数学">数学</option>
                        <option value="化学">化学</option>
                        <option value="艺术特长">艺术特长</option>
                    </select>
                </div>
                <div class="header-right">
                    筛选
                </div>
            </div>
        </slot>
        <slot name="home">
        </slot>
    </div>
</template>
<script>
    import $ from 'jquery'
    import '../../assets/bootstrap/css/bootstrap.css'
    import Axios from 'axios'

    export default {
        data() {
            return {
                catalog: this.$route.params.id
            }
        },
        mounted() {
            $('select').val(this.catalog);
        },
        methods: {
            goBack: function () {
                history.go(-1)
            },
            catalogChange: function () {
                var catalog = $('select').val();
                Axios.get('http://localhost:3000/index_teacher_list', {
                    params: {
                        catalog: catalog
                    }
                }).then((res) => {
                    this.teacher_list = JSON.parse(res.data);
                    this.$store.dispatch('teacherList', this.teacher_list);
                })
            }
        }
    }
</script>
<style scoped>
    .common-header {
        top: 0;
        height: 1rem;
        width: 100%;
        background-color: #474a4f;
        position: fixed;
        color: #fff;
        text-align: center;
        line-height: 1rem;
        font-size: 20px;
        z-index: 100;
    }

    .header-box {
        display: flex;
    }

    .header-left {
        flex: 1;
    }

    .header-mid {
        padding-top: .2rem;
        flex: 2;
    }

    .header-right {
        flex: 1;
    }

</style>
