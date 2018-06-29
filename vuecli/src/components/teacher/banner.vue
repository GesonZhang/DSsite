<template>
	<div class="banner">
		<img src="../../../static/teaImg/1.jpg" alt="">
	</div>
</template>
<script>
	export default {
		data(){
			return {

			}
		},
		mounted(){
			setTimeout(
				function(){
            location.assign('http://localhost:8080/indexreal');
				},3000
			)
		}
	}
</script>
<style scoped>
	.banner{
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}
	.banner img{
		width: 100%;
		height: 100%;
	}
</style>
