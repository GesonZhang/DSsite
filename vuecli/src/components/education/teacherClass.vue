<template>
    <div id="teacher-class">
        <div id="teacher-course">
            <div class="teacher-apply" v-for='(msg,index) in $store.state.classList'>
                <div class="left-apply">
                    <p>{{msg.c_subject}}</p>
                    <div class="teacher-audititn">
                        <span class="no-audition" v-if='!(Number(msg.c_try))' style='padding:0.05rem'>不试听</span>
                        <span class="audition" v-if='Number(msg.c_try)' style='padding:0.05rem'>可试听</span>
                        &nbsp;&nbsp;<span>{{msg.c_describe}}</span>
                    </div>
                </div>
                <div class="right-apply">
                    <span class="right-price">￥<span>{{msg.c_price}}</span>/小时</span>
                    <router-link :to="'/join-class/'+msg.c_id">
                        <button>报名</button>
                    </router-link>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import $ from 'jquery'
    import Axios from 'axios'

    export default {
        data() {
            return {
                index: this.$route.params.id,
                teacherClass: [],
            }
        },
        mounted: function () {

        },

        components: {}
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    button {
        outline: none;
    }

    #teacher-course {
        width: 100%;
        background: #f0f0f0;
        position: absolute;
        top: 1rem;
        bottom: 1rem;
    }

    .course p {
        background: #f0f0f0;
        line-height: 1rem;
        padding-left: 0.4rem;
        height: 1rem;
        font-size: 0.25rem;
    }

    .course img {
        width: 0.25rem;
        margin-top: 0.4rem;
        margin-right: 0.1rem;
    }

    .teacher-apply {
        padding-right: 0.1rem;
        border-bottom: 1px solid #ccc;
        clear: both;
        background: #fff;
        display: flex;
    }

    .left-apply {
        padding: 0.2rem;
        width: 3.5rem;
    }

    .left-apply p {
        font-size: 16px;
    }

    .teacher-audition {
        font-size: 13px;
    }

    .audition {
        color: #f00;
        border: 1px solid #f00;
    }

    .no-audition {
        color: #00f;
        border: 1px solid #00f;
    }

    .right-apply {
        flex: 1;
        padding: 0.4rem 0;
        text-align: center;
    }

    .right-price span {
        color: #f00;
        font-size: 16px;
    }

    .right-apply .right-price {
        padding-right: 0.1rem;
    }

    .right-apply button {
        height: 0.4rem;
        width: 1.2rem;
        border: 0;
        border-radius: 10px;
        font-size: 18px;
        line-height: 0.4rem;
        color: #fff;
        background: #40AA63;
        outline: none;
    }


</style>
