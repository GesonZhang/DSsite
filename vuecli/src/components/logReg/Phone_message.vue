<template>
	<div id="ph-mes">
		<div class="header">
			<div class="back">
				<router-link to="/reg"><img src="../../assets/img/back.png" alt=""></router-link>
			</div>
			<h1>注册</h1>
		</div>
		<div class="logo">
			<img src="../../assets/img/33icn_ttc168.png" alt="">
		</div>
		<p>点击发送验证码，天天有课将向您的手机号
			<router-link to="/">18958855588</router-link>
		</p>
		<p>发送一条验证短信。</p>
		<div class="confirm">
			<img src="../../assets/img/confirm.png" alt="">
			<input type="text" placeholder="请输入短信验证码">
			<input type="submit" value="发送验证码" class="send-btn">
		</div>
		<div class="next">
			<a href="javascript:;" @click="check()">{{$store.state.account}}下一步</a>
		</div>

	</div>
</template>
<script>
	export default {
		data() {
			return {

			}
		},
		methods: {
			check() {
				if(true) {
					this.reg();
				}
			},
			reg() {
				Axios.get('http://localhost:3000/users/reg', {
					params: {
						account: this.account,
						password: this.password,
						phone: this.phone
					}
				}).then((res) => {
					if(res.data) {
						alert('注册成功');
						location = "/index";
					}
				})
			}
		}
	}
</script>
<style scoped>
	@import "../../assets/css/reset.css";
	#ph-mes {
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		height: 100%;
		background: #f5f5f5;
	}
	
	#ph-mes .header {
		height: 1rem;
		background: deepskyblue;
		color: #fff;
		position: fixed;
		top: 0;
		width: 100%;
		line-height: 1rem;
		text-align: center;
		display: flex;
	}
	
	#ph-mes .header h1 {
		flex: 2;
		text-indent: -0.5rem;
		font-size: 0.4rem;
		line-height: 1rem;
	}
	
	#ph-mes .header .back {
		height: 0.4rem;
		width: 0.4rem;
		text-align: center;
		line-height: 1rem;
		float: right;
		margin-top: 0.3rem;
		margin-left: 0.1rem;
	}
	
	#ph-mes .logo {
		height: 2rem;
		width: 2rem;
		margin: 1.5rem auto 0.5rem auto;
	}
	
	#ph-mes .logo img {
		height: 100%;
		border-radius: 50%;
	}
	
	#ph-mes p {
		text-align: left;
		margin-left: 0.5rem;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
	
	#ph-mes .confirm {
		margin-top: 0.5rem;
		width: 100%;
		height: 1rem;
		background: #fff;
		border: 1px solid #ccc;
		text-align: center;
	}
	
	#ph-mes .confirm img {
		height: 60%;
		float: left;
		margin-top: 0.2rem;
		margin-left: 0.2rem
	}
	
	#ph-mes .confirm input {
		height: 0.8rem;
		width: 2.5rem;
		font-size: 0.2rem;
		border: none;
		line-height: .8rem;
		outline: none;
		text-align: center;
	}
	
	#ph-mes .confirm .send-btn {
		width: 2rem;
		height: 0.5rem;
		background: red;
		color: #fff;
		border-radius: 0.1rem;
		float: right;
		margin-right: 0.5rem;
		margin-top: 0.25rem;
		text-align: center;
	}
	
	#ph-mes .next {
		width: 3rem;
		height: 0.8rem;
		background: #ccc;
		border-radius: 0.1rem;
		margin: 0.5rem auto;
		font-size: 0.3rem;
		line-height: 0.8rem;
		text-align: center;
	}
	
	#ph-mes .next a {
		color: #fff;
	}
</style>