SignatureChange.vue<template>
    <div id="signature">
        <common-header prop="dowell">
            <span>擅长科目</span></common-header>
        <common-body :prop="$store.state.info.dowell"></common-body>
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