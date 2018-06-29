<template>
    <div id="common-body">
        <input type="text" :value="prop">
        <img src="../../../assets/img/40对话框_关闭.png" alt="" @click="clear()">
    </div>
</template>

<script>

    export default {
        props: ['prop'],
        methods: {
            clear() {
                var $input = document.getElementsByTagName('input')[0];
                $input.value = '';
            }
        }
    }
</script>

<style scoped>
    #common-body {
        height: 1rem;
        border-bottom: 1px solid #ccc;
        background: #fff;
        line-height: 1rem;
        padding: 0 0.2rem;
        position: relative;
        margin-top: 1rem;
    }

    #common-body input {
        height: 0.9rem;
        border: 0;
        outline: none;
        font-size: 18px;
    }

    #common-body img {
        height: 0.5rem;
        position: absolute;
        right: .3rem;
        top: .2rem;
    }
</style>
