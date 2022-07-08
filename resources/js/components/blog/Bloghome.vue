<template>
	<div>
		<section id="hero" class="">
		    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

		      <div class="carousel-inner" role="listbox">

		        <!-- Slide 1 -->
		        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
		          <div class="carousel-container">
		            <div class="carousel-content animate__animated animate__fadeInUp">
		              <h2>Welcome to <span>Flattern</span></h2>
		              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
		              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
		            </div>
		          </div>
		        </div>

		        <!-- Slide 2 -->
		        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
		          <div class="carousel-container">
		            <div class="carousel-content animate__animated animate__fadeInUp">
		              <h2>Lorem Ipsum Dolor</h2>
		              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
		              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
		            </div>
		          </div>
		        </div>

		        <!-- Slide 3 -->
		        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
		          <div class="carousel-container">
		            <div class="carousel-content animate__animated animate__fadeInUp">
		              <h2>Sequi ea ut et est quaerat</h2>
		              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
		              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
		            </div>
		          </div>
		        </div>

		      </div>

		      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
		        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
		      </a>

		      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
		        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
		      </a>

		      <ol class="carousel-indicators" id="hero-carousel-indicators"><li data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></li><li data-bs-target="#heroCarousel" data-bs-slide-to="1" class=""></li><li data-bs-target="#heroCarousel" data-bs-slide-to="2" class=""></li></ol>

		    </div>
		</section>
	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>