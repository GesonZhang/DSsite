SignatureChange.vue<template>
    <div id="signature">
        <common-header prop="major">
            <span>专业</span></common-header>
        <common-body :prop="$store.state.info.major"></common-body>
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
    #signature {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }
</style>