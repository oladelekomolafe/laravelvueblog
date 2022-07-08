<template>
	<div>
		
		
		<div>
			<h2 style="background:#f2f2f2;margin-top:0px;padding:15px;">
				<img class="logo" src="../assets/logo.png">
			
			<span style="float:right;" class="nav-menu">
				<router-link to="/" active-class="active">Home</router-link> |
				<router-link to="/aboutus">About Us</router-link> |  
				<router-link to="/contactus">Contact</router-link> |
				<router-link :to="{ name: 'blog'}">Blog</router-link>
			</span>
			</h2>
		</div>
		<router-view></router-view>
	</div>
</template>

<style lang="css">
	.top-toolbar{
		padding: 5px;
		background-color: skyblue;
	}
	body{
		padding: 0px;
		margin: 0px;
	}
	.logo{
		height: 20px;
	}
    .nav-menu a{
        text-decoration: none;
        padding: 5px;
        padding-left: 10px;
        padding-right:  10px;
        color: #6382ff;
        font-weight: normal;
        font-size: 17px;
    }
    .active, .router-link-active{
        background-color: #487bc8;
        border-radius: 5px;
        color: #fff !important;
    }
</style> 