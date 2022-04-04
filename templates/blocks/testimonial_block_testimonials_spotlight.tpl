
            <div id="testimonial-slider" class="owl-carousel">
			<{foreach item=testimonial from=$block}>
                <div class="testimonial2">
                    <div class="pic">
                        <img src="<{$testimonial_upload_url|default:false}>/uploads/testimonial/images/testimonials/<{$testimonial.img}>">
                    </div>
                    <div class="testimonial-profile">
                        <h3 class="title"><{$testimonial.title}></h3>
                        <span class="post"><{$testimonial.profession}></span>
                    </div>
                    <p class="description">
                       <{$testimonial.descr}>
                    </p>
                </div>
			<{/foreach}>	
            </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

<script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});
</script>

 <style>
.testimonial2{ margin: 0 20px 50px; }
.testimonial2 .pic{
    display: inline-block;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin: 0 15px 15px 0;
}
.testimonial2 .pic img{
    width: 100%;
    height: auto;
    border-radius: 50%;
}
.testimonial2 .testimonial-profile{
    display: inline-block;
    position: relative;
    top: -40px;
}
.testimonial2 .title{
    display: block;
    font-size: 20px;
    font-weight: 600;
    color: #2f2f2f;
    text-transform: capitalize;
    margin: 0 0 7px 0;
}
.testimonial2 .post{
    display: block;
    font-size: 14px;
    color: #5d7aa7;
}
.testimonial2 .description{
    padding: 20px 22px;
    background: #1f487e;
    font-size: 15px;
    color: #fff;
    line-height: 25px;
    margin: 0;
    position: relative;
}
.testimonial2 .description:before,
.testimonial2 .description:after{
    content: "";
    border-width: 18px 0 0 18px;
    border-style: solid;
    border-color: #5d7aa7 transparent transparent;
    position: absolute;
    bottom: -18px;
    left: 0;
}
.testimonial2 .description:after{
    border-width: 18px 18px 0 0;
    left: auto;
    right: 0;
}
.owl-theme .owl-controls{
    margin-top: 10px;
    margin-left: 30px;
}
.owl-theme .owl-controls .owl-buttons div{
    opacity: 0.8;
    background: #fff;
}
.owl-prev:before,
.owl-next:before{
    content: "\f053";
    font-family: "Font Awesome 5 Free"; font-weight: 900;
    font-size: 20px;
    color: #1f487e;
}
.owl-next:before{ content: "\f054"; }
</style>