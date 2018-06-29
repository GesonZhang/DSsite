<template>
    <div class="teacher-list">
        <common-header></common-header>
        <div class="nav">
            <div class="nav-left" @click='newest()'>
                <p>最新发布</p>
            </div>
            <div class="nav-mid">
                <p class="teacher-years" @click="years()">
                    教龄
                    <img class="" src="../../assets/img/12_01icn_ord_def.png" alt="">
                </p>
            </div>
            <div class="nav-right">
                <p @click='price()'>价格<img src="../../assets/img/12_01icn_ord_def.png" alt=""></p>
            </div>
        </div>
        <ul class="info-list ">
            <!--<router-link to="/teacher-msg">-->
            <li class="info-more " v-for="(teacher,index) in $store.state.teacherList">
                <div class="wrapper">
                    <div class="up-part">
                        <div class="up-part-left">
                            <img :src="teacher.img">
                        </div>
                        <router-link :to="'/teacher-msg/'+teacher.id">
                            <div class="up-part-mid">
                                <span class="tea-name"><b>{{teacher.name}}</b></span>
                                <span>{{teacher.sex}}</span>
                                <p class="real">
                                    <img src="../../assets/img/13icn_ida.png" alt="">
                                    <span>实名认证</span>
                                </p>
                                <p class="jianjie" style="text-overflow:ellipsis">{{teacher.jianjie}}</p>
                            </div>
                        </router-link>
                        <!-- </router-link> -->
                        <div class="up-part-right" @click='focus(teacher.id)'>
                            <img src="../../assets/img/14_01icn_ccn.png" alt="" v-show='arr.indexOf(teacher.id)==-1'>
                            <img src="../../assets/img/14_02icn_acc.png" alt="" v-show='arr.indexOf(teacher.id)!=-1'>
                        </div>
                    </div>
                    <div class="down-part">
                        <div>
                            <p>教龄</p>
                            <p><b class="year">{{teacher.years}} </b>年</p>
                        </div>
                        <div>
                            <p>授课区域</p>
                            <p><b>{{teacher.area}}</b></p>
                        </div>
                        <div>
                            <p>班课</p>
                            <p>￥<span class="salary">{{teacher.price1}}</span></p>
                        </div>
                        <div>
                            <p>一对一</p>
                            <p>￥<span class="salary">{{teacher.price2}}</span>/课时</p>
                        </div>
                    </div>
                </div>
                <div class="space">
                </div>
            </li>
        </ul>
        <education-filter></education-filter>
        <!--<common-footer></common-footer>-->
    </div>
</template>
<!-- <script src="../../vuex/store.js" type="text/JavaScript"></script> -->
<script>
    import CommonHeader from "@/components/common/CommonHeader"
    import CommonFooter from "@/components/common/CommonFooter"
    import '../../assets/bootstrap/css/bootstrap.css'
    import $ from 'jquery'
    import EducationFilter from '@/components/education/filter'
    import Axios from 'axios';
    // import Vue from 'vue'
    // import Vuex from 'vuex'
    // <!-- store.set('username', 'marcus')//存值
    // store.get('username')//取值
    // store.remove('username')//移除某一项
    //     store.clear();//清除全部 -->
    export default {
        data() {
            return {
                // catalog:$store.state.catalog,
                catalog: this.$route.params.id,
                teacher_list: [],
                flag: true,
                price_flag: true,
                teacher_list_years: '',
                focus_flag: true,
                focus_flag_store: false,
                s_id: localStorage.id,
                arr: []
            }
        },
        components: {
            CommonHeader,
            CommonFooter,
            EducationFilter
        },
        mounted() {
            $('.header-right').on('click', function () {
                $('#filter').fadeIn(200);
            });
            Axios.get('http://localhost:3000/index_teacher_list', {
                params: {
                    catalog: this.catalog
                }
            }).then((res) => {
                this.teacher_list = JSON.parse(res.data);
                this.$store.dispatch('teacherList', this.teacher_list);
            })
            if (localStorage.id) {
                Axios.get('http://localhost:3000/index_focus/?s_id=' + this.s_id).then((res) => {
                    res.data = JSON.parse(res.data);
                    for (var i = 0; i < res.data.length; i++) {
                        this.arr.push(res.data[i].t_id);
                    }
                })
            }
        },
        methods: {
            filtershow: function () {
                $('#filter').fadeIn(300);
            },
            newest: function () {
                Axios.get('http://localhost:3000/index_teacher_list', {
                    params: {
                        catalog: this.catalog
                    }
                }).then((res) => {
                    this.teacher_list = JSON.parse(res.data);
                    this.$store.dispatch('teacherList', this.teacher_list);
                })
            },
            years: function () {
                this.flag = !this.flag;
                if (this.flag) {
                    Axios.get('http://localhost:3000/index_asc_year', {
                        params: {
                            dowell: this.catalog
                        }
                    }).then((res) => {
                        this.teacher_list = JSON.parse(res.data);
                        this.$store.dispatch('teacherList', this.teacher_list);
                    })
                } else {
                    Axios.get('http://localhost:3000/index_desc_year', {
                        params: {
                            dowell: this.catalog
                        }
                    }).then((res) => {
                        this.teacher_list = JSON.parse(res.data);
                        this.$store.dispatch('teacherList', this.teacher_list);
                    })
                }
            },
            price: function () {
                this.price_flag = !this.price_flag;
                if (this.price_flag) {
                    Axios.get('http://localhost:3000/index_asc_price', {
                        params: {
                            dowell: this.catalog
                        }
                    }).then((res) => {
                        this.teacher_list = JSON.parse(res.data);
                        this.$store.dispatch('teacherList', this.teacher_list);
                    })
                } else {
                    Axios.get('http://localhost:3000/index_desc_price', {
                        params: {
                            dowell: this.catalog
                        }
                    }).then((res) => {
                        this.teacher_list = JSON.parse(res.data);
                        this.$store.dispatch('teacherList', this.teacher_list);
                    })
                }
            },
            catalog: function () {
            },
            focus: function (id) {
                console.log(localStorage.id);
                if (localStorage.id) {
                    Axios.get('http://localhost:3000/index_change_focus', {
                        params: {
                            s_id: this.s_id,
                            t_id: id
                        }
                    }).then((res) => {
                        if (res.data == 'del') {
                            this.arr.push(id);
                        } else {
                            var index = this.arr.indexOf(id);
                            this.arr.splice(index, 1)
                        }
                    })
                } else {
                    location.assign('http://localhost:8080/login');
                }

            }
        }
    }
</script>
<style scoped>
    .wrapper {
        width: 6rem;
        margin: 0 auto;
    }

    .teacher-list {
        width: 100%;
        color: #0c4458;
    }

    .teacher-list .list, .up-part, .down-part {
        display: flex;
    }

    .nav {
        height: 0.8rem;
        position: fixed;
        top: 1rem;
        display: flex;
        line-height: .8rem;
        width: 100%;
        background: #fff;
        z-index: 100;
    }

    .nav-left, .nav-mid, .nav-right {
        flex: 1;
        text-align: center;
    }

    .info-list {
        padding-top: 1.8rem;
    }

    .nav-mid img, .nav-right img {
        width: 8%;
        padding-top: 13%;
    }

    .up-part {
        padding-bottom: .1rem;
        width: 100%;
        display: flex;
        border-bottom: 1px solid #ccc;
    }

    .up-part-left, .up-part-right {
        flex: 1;
    }

    .up-part-mid {
        flex: 3;
    }

    .up-part-mid .jianjie {
        white-space: nowrap;
        width: 12em;
        overflow: hidden;
    }

    .up-part-left {
        /*border-radius: 50%;*/
        overflow: hidden;
        padding: .1rem;
        position: relative;
    }

    .up-part-left img {
        border-radius: 50%;
        width: 82%;
        /*height: 72%;*/
        position: absolute;
        top: 50%;
        margin-top: -35%;
    }

    .up-part-mid {
        padding: .1rem;
    }

    .up-part-mid .tea-name {
        font-size: 18px;

    }

    .up-part-mid > span {
        padding-left: .1rem;
    }

    .up-part-mid p.real {
        padding: .1rem;
    }

    .up-part-mid .real img {
        padding-right: .1rem;
    }

    .up-part-mid .real span {
        color: red;
    }

    .up-part-right img {
        width: 45%;
        padding-top: .5rem;
    }

    .down-part {
        display: flex;
        margin: .1rem;
    }

    .down-part > div {
        flex: 1;
        text-align: center;
    }

    .down-part .year {
        font-size: 18px;
    }

    .down-part .salary {
        color: red;
    }

    .space {
        height: .1rem;
        background: #eee;
    }
</style>
