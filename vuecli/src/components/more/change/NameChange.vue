<template>
    <div id="name-change">
        <common-header prop="name">
            <span>姓名</span>
        </common-header>
        <common-body :prop="$store.state.info.name"></common-body>
    </div>
</template>

<script>
    import CommonHeader from '../CommonHeader'
    import CommonBody from './CommonBody'

    export default {
        components: {
            CommonHeader,
            CommonBody
        }
    }
</script>

<style scoped>
    #name-change {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }
</style>
