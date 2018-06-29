<template>
    <div id="address-change">
        <common-header :prop="address">
            <span>城市</span>
        </common-header>
        <common-body :prop="$store.state.info.address"></common-body>
    </div>
</template>

<script>
    import CommonHeader from '../CommonHeader'
    import CommonBody from './CommonBody'

    export default {
        data() {
            return {
                address: Number(this.$store.state.info.identify)==0?'address':'area'
            }
        },
        components: {
            CommonBody,
            CommonHeader
        }
    }
</script>

<style scoped>
    #address-change {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #f0f0f0;
    }
</style>