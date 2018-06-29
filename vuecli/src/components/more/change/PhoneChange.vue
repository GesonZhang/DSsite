<template>
    <div id="phone-change">
        <common-header prop="phone">
            <span>手机号</span>
        </common-header>
        <common-body :prop="$store.state.info.phone"></common-body>
    </div>
</template>

<script>
    import CommonHeader from '../CommonHeader'
    import CommonBody from './CommonBody'

    export default {
        data() {
            return {}
        },
        components: {
            CommonHeader,
            CommonBody
        }
    }
</script>

<style scoped>
    #phone-change {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }
</style>
