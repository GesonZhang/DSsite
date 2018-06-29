<template>
    <div id="teacher-class">

        <div id="teacher-eva">

            <div class="comment-list" v-for='(msg,index) in commentList'>
                <div class="s-img">
                    <img :src="msg.img" alt="">
                </div>
                <div class="content">
                    <span class="s-name">{{msg.name}}</span><br>
                    <span class="s-time">{{msg.comm_time}}</span><br>
                    <div class="good">
                        <img src="/static/img1/已赞.png" alt="" @click="addGood(index)" :class="'good-img'+index"
                        >
                        <img src="/static/img1/点赞.png" alt="" @click="addGood(index) " :class="'good-img'+index">
                        <span>{{msg.comm_good}}</span>
                        <input type="text" style="display: none" :class="'good-state'+index" value="0">
                    </div>
                    <p>{{msg.comm_content}}</p>
                </div>
            </div>
            <div class="load" v-if='commentList.length==0'>
                <p>暂时没有评论...</p>
            </div>
            <div class="comment">
                <input type="text" class="comm-ipt" placeholder="请输入你的评论" v-model='comm_content'>
                <button class="comm-btn" @click='comment'>发表评论</button>
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
                commentList: [],
                comm_content: ''
            }
        },
        mounted: function () {
//            console.log(localStorage)
            Axios.get('http://localhost:3000/teacherComment', {
                params: {
                    id: this.index
                }
            }).then((res) => {
                this.commentList = JSON.parse(res.data);
                $.each(this.commentList, function (index, obj) {
                    console.log(obj.comm_id)
                    $('.good-img' + index).css('display', 'none');
                    Axios.get('http://127.0.0.1/ttyk/phpci/teacher/get_add_good_info', {
                        params: {
                            id: obj.comm_id
                        }
                    }).then((res) => {
                        console.log(res.data)
                        var data = res.data;
                        if (data) {
                            $('.good-state' + index).val(data.add_good_state);
                            if (data.add_good_state == 1) {//state为1表示已赞，为0表示未赞。
                                $('.good-img' + index).eq(0).add('display', 'inline-block').removeClass('hide');
                                $('.good-img' + index).eq(1).addClass('hide').removeClass('display', 'inline-block');
                            } else {
                                $('.good-img' + index).eq(1).add('display', 'inline-block').removeClass('hide');
                                $('.good-img' + index).eq(0).addClass('hide').removeClass('display', 'inline-block');
                            }
                        } else {
                            $('.good-img' + index).eq(1).add('display', 'inline-block').removeClass('hide');
                            $('.good-img' + index).eq(0).addClass('hide').removeClass('display', 'inline-block');
                        }
//                    this.commentList[index] = JSON.parse(res.data);

                    });
                })
            });
            //加载点赞状态


        },
        methods: {
            addGood: function (index) {
                var state = $('.good-state' + index).val();
                if (state == 0) {
                    state = 1;
                } else {
                    state = 0;
                }
//                console.log('good-state' + index + ' is:' + state);
                $('.good-state' + index).val(state);
                if (state) {//state为1表示已赞，为0表示未赞。
                    $('.good-img' + index).eq(0).add('display', 'inline-block').removeClass('hide');
                    $('.good-img' + index).eq(1).addClass('hide').removeClass('display', 'inline-block');
                } else {
                    $('.good-img' + index).eq(1).add('display', 'inline-block').removeClass('hide');
                    $('.good-img' + index).eq(0).addClass('hide').removeClass('display', 'inline-block');
                }
                $('.good-img' + index).animate({
                    width: 35,
                    height: 35,
                }, 150, function () {
                    $('.good-img' + index).css({'width': '0.35rem', 'height': '0.35rem'})
                });
                if (state) {
                    this.commentList[index].comm_good = Number(this.commentList[index].comm_good) + 1;
                } else {
                    this.commentList[index].comm_good = Number(this.commentList[index].comm_good) - 1;
                }
                Axios.get('http://localhost:3000/addGood', {
                    params: {
                        id: this.commentList[index].comm_id,
                        goodTimes: this.commentList[index].comm_good,
                        state: state,
                        accountId: localStorage.id,
                        identify: localStorage.identify
                    }
                }).then((res) => {
                    console.log(res)
                });
            },
            comment: function () {
                if (!localStorage.id) {
                    alert('请你先登录');
                } else if (localStorage.identify != 1) {
                    if (this.comm_content == '') {
                        alert('请输入内容')
                    } else {
                        Axios.get('http://localhost:3000/addComment', {
                            params: {
                                s_id: localStorage.id,
                                t_id: this.index,
                                c_content: this.comm_content
                            }
                        }).then((res) => {
                            this.commentList = JSON.parse(res.data)
                            this.comm_content = '';
                        });
                    }
                } else {
                    alert('您当前身份是教师，暂不可评论其他教师。')
                }
            }
        },
        components: {}
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    @import "../../assets/css/reset.css";

    #teacher-eva {
        background: #f0f0f0;
        padding-top: 1rem;
        padding-bottom: 1.2rem;
    }

    .evaluate {
        padding-left: 0.1rem;
        background: #fff;
        /*height: 1.1rem;*/
        padding-bottom: 1.1rem;
        padding-top: 0.1rem;
        border-bottom: 1px solid #ccc;
    }

    .evaluate .select-eva {
        border: 1px solid #ccc;
        display: block;
        width: 2rem;
        text-align: center;
        border-radius: 5px;
        float: left;
        margin-right: 0.1rem;
    }

    .select-eva span:nth-child(1) {
        color: #2e6da4;
        padding-left: 0.2rem;
    }

    .load p {
        text-align: center;
        font-weight: bolder;
        font-size: 18px;
        color: #000;
        padding-top: 0.2rem;
    }

    #footer {
        width: 100%;
        position: fixed;
        height: 1rem;
        text-align: center;
        display: flex;
        bottom: 0;
        background-color: #fff;
    }

    #footer img {
        width: 0.4rem;
        margin-top: 0.1rem;
    }

    #footer div {
        width: 1.8rem;
        float: left;
        border: 1px solid #ccc;
    }

    #footer button {
        flex: 1;
        outline: none;
        border: 0;
        background: #3e8f3e;
        color: #fff;
        font-size: 18px;
    }

    .comment-list {
        display: flex;
        margin: 0.1rem 0;
        background: #fff;
        position: relative;
    }

    .comment-list .s-img {
        width: 1.5rem;
        height: 1.5rem;
        padding: 0.2rem;

    }

    .comment-list .s-img img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .comment-list .content {
        flex: 1;
        padding: 0.2rem;
        color: #000;
        font-size: 0.2rem;
    }

    .comment-list .content .s-name {
        color: skyblue;
    }

    .comment-list .content .s-time {
        color: #999;
    }

    .good {

        width: 1rem;
        position: absolute;
        right: 0.4rem;
        top: 0.3rem;
    }

    .good img {
        /*display: none;*/
        width: 0.35rem;
        height: 0.35rem;
    }

    .good span {
        font-size: 0.25rem;
        color: #999;
    }

    /*  @-webkit-keyframes change{
        0%{width:0.3rem;height:0.3rem;}
        50%{width:1rem;height:1rem;}
        100%{width:0.3rem;height:0.3rem;}
      }*/
    .comment {
        padding: 0.3rem;
    }

    .comm-ipt {
        padding-left: 0.15rem;
        display: block;
        height: 0.7rem;
        width: 4.8rem;
        outline: none;
        border: 1px solid #999;
        border-radius: 0.2rem;
    }

    .comm-btn {
        margin-top: 0.1rem;
        width: 1.5rem;
        height: 0.5rem;
        border: 0;
        background: #e63030;
        color: #fff;
        border-radius: 0.1rem;
    }


</style>
