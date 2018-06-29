<template>
    <div id="signature">
        <common-header :prop="says"></common-header>
        <common-body :prop="$store.state.info.says"></common-body>
    </div>
</template>

<script>
    import CommonHeader from '../CommonHeader'
    import CommonBody from './CommonBody'

    export default {
        data() {
            return {
                says: Number(this.$store.state.info.identify)==0?'says':'jianjie'
            }
        },
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