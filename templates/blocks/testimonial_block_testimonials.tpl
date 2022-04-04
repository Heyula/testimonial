<div id="section6">
<div class="grid col-5">
<{foreach item=testimonial from=$block}>
<div class="col test"><img src="<{$testimonial_upload_url|default:false}>/uploads/testimonial/images/testimonials/<{$testimonial.img}>" alt="<{$testimonial.title}>" />
<div class="testText">
<div class="inner"><{$testimonial.descr}></div>
</div>
<div class="testName">
<div class="testIcon"><i class="fa fa-comment-o fa-2x"></i></div>
<h4><{$testimonial.title}> <strong><{$testimonial.profession}></strong></h4>
</div>
</div>
<{/foreach}>
</div>
</div>


<style>
.icons svg{fill: currentColor;}
.icons path{fill: currentColor;} 
.icons{fill: currentColor;}

/* ---------------------------------- */
/* ----------- SECTION 6 ------------ */
/* ---------------------------------- */

#section6 .container {
  max-width: 100%;
  padding: 0 !important;
}
#section6 .grid {
   flex-wrap: wrap;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
}
#section6 .col {
  padding: 0;
  position: relative;
  background: #1f1f1f;
}
#section6 .col:hover {
  background: #af8734;
}
#section6 img {
  width: 100%;
  height: auto;
  display: block;
  opacity: 0.15;
  filter: alpha(opacity=15);
}
#section6 .col:hover img {
  opacity: 0.04;
  filter: alpha(opacity=4);
}
#section6 .testText {
  position: absolute;
  top: 15%;
  left: 15%;
  right: 15%;
  bottom: 20%;
  opacity: 0;
  filter: alpha(opacity=0);
  color: #fff;
  
  -webkit-transition: all 0.5s ease;
transition: all 0.5s ease;
  
     display: -webkit-flex;
   display: -ms-flexbox;
   display: -webkit-box;
   display: flex;
   
   -webkit-flex-direction: row;
   -ms-flex-direction: row;
           -webkit-box-orient: horizontal;
           -webkit-box-direction: normal;
           flex-direction: row;
           
   -webkit-align-items: center;
   -ms-flex-align: center;
           -webkit-box-align: center;
           align-items: center;
           
   -webkit-justify-content: center;
   -ms-flex-pack: center;
           -webkit-box-pack: center;
           justify-content: center;
}
#section6 .testText .inner {
  position: relative;
  line-height: 1.4em;
}
#section6 .testText .inner:before {
  content: "\f10d";
  font-family: FontAwesome;
  font-size: 0.8em;
  position: absolute;
  top: -5px;
  left: -15px;
  color: #1b1b1b;
}

#section6 .col:hover .testText {
  top: 5%;
  opacity: 1;
  filter: alpha(opacity=100);
}

#section6 .testName {
  position: absolute;
  top: 80%;
  left: 5%;
  right: 5%;
  bottom: 5%;
}
#section6 h4 {
  font-size: 1em;
  line-height: 2em;
  display: inline-block;
  color: #fff;
  text-transform: uppercase;
}
#section6 h4 strong {
  color: #cfa03a;
}
#section6 .col:hover h4 strong {
  color: #1b1b1b;
}

/* ----------- SECTION 6 ICONS ------------ */

.testName .testIcon {
  width: 25px;
  height: 20px;
  display: inline-block;
  position: relative;
  margin-right: 10px;
  color: #a78132;
}

#section6 svg {
  position: absolute;
  top: 2px;
  left: 2px;
  width: 30px;
  height: 30px;
  fill: #cfa03a;
}

#section6 svg.plus {
  fill: #000;
}

#section6 svg.plus {
  opacity: 0;
  filter: alpha(opacity=0);
}
#section6 .col:hover svg.plus {
  opacity: 1;
  filter: alpha(opacity=100);
}

#section6 svg:first-child {
  opacity: 1;
  filter: alpha(opacity=100);
}
#section6 .col:hover svg:first-child {
  opacity: 0;
  filter: alpha(opacity=0);
}

/*-----------------------------------*/
/*-------------- GRID ---------------*/
/*-----------------------------------*/
.grid {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  -webkit-box-pack: justify;
  justify-content: space-between;

  flex-wrap: wrap;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;

  width: 100%;
}

.grid .col {
  padding: 10px;
}

.grid.small-gutter .col {
  padding: 5px;
}

.col-1 .col {
  width: 100%;
}

.col-2 .col {
  width: 50%;
}

.col-3 .col {
  width: 33.33333%;
}

.col-4 .col {
  width: 25%;
}

.col-5 .col {
  width: 20%;
}

.col-6 .col {
  width: 19%;
}

.grid .col-1 {
  width: 6.25%;
}
.grid .col-2 {
  width: 12.5%;
}
.grid .col-3 {
  width: 18.75%;
}
.grid .col-4 {
  width: 25%;
}
.grid .col-5 {
  width: 31.25%;
}
.grid .col-6 {
  width: 37.5%;
}
.grid .col-7 {
  width: 43.75%;
}
.grid .col-8 {
  width: 50%;
}
.grid .col-9 {
  width: 56.25%;
}
.grid .col-10 {
  width: 62.5%;
}
.grid .col-11 {
  width: 68.75%;
}
.grid .col-12 {
  width: 75%;
}
.grid .col-13 {
  width: 81.25%;
}
.grid .col-14 {
  width: 87.5%;
}
.grid .col-15 {
  width: 93.75%;
}
.grid .col-16 {
  width: 100%;
}

@media all and (max-width: 1400px) {
.col-5 .col {
  width: 33.33%;
}
  .col-5 .col:last-child {
    display: none;
  }
}

@media all and (max-width: 900px) {
.col-5 .col {
  width: 50%;
}
}

@media all and (max-width: 600px) {
.col-5 .col {
  width: 100%;
}
}
</style>