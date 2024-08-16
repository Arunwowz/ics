<?php

   /**

    * Template Name:Newsletter Template

    *

    * If the user has selected a static page for their homepage, this is what will

    * appear.

    * Learn more: https://codex.wordpress.org/Template_Hierarchy

    *

    */

	get_header(); 

	

?>


<style>

   #loading {

    display: inline-block;
    width: 50px;
    height: 50px;
    border: 3px solid #212c54;
    border-radius: 50%;
    border-top-color: #212c54;
    animation: spin 1s ease-in-out infinite;
    -webkit-animation: spin 1s ease-in-out infinite;
    z-index: 999999999999999;
    position: relative;

}



@keyframes spin {

  to { -webkit-transform: rotate(360deg); }

}

@-webkit-keyframes spin {

  to { -webkit-transform: rotate(360deg); }

}

.video_outer {

    margin: 40px 0px 0px 0px;

    position: relative;

}



#video-section-loader {

    position: absolute;

    left: 50%;

    top: 50%;

    transform: translate(-50%, -50%);

}



.video-loader {

    border: 1px solid;

    min-height: 180px;

    padding-top: 20px;

	

}

.hide-class{display:none;}



iframe.ifame-class {

    width: 100%;

    height: 243px;

}



#loadBtn {

    background: #212c54;
    border-radius: 50px;
    border: none;
    color: #fff;
    font-size: 24px;
    font-weight: var(--font-weight-bold);
    line-height: normal;
    transition: all .3s;
    width: 32%;
    padding: 17px 0;
    margin: 0 10px 0 0;
    display: inline-block !important;

}



.video-btn {

    background: #f7cc31;

    border-radius: 50px;

    color: #122b42;

    font-size: 24px;

    font-weight: var(--font-weight-bold);

    line-height: normal;

    transition: all 0.3s;

    width: 34%;

    padding: 8px 0px;

    margin: 0px 10px 0px 0px;

}



div#form-search-btn i {
    color: #ffff;
    font-size: 12px;
}
.search_right {
 background: #212c54;
    position: absolute;
    right: 8px;
    top: 4px !important;
    padding: 8px 11px !important;
    text-align: center;
    border-radius: 5px;
}


.video_icon {

    margin: 35px 0px 0px 0px;

}

p.no-data-class {

    border: 1px solid #022082;

    display: inline-block;

    color: #022082;

    padding: 5px 0px 5px 10px;

    border-radius: 5px;

    letter-spacing: 2px;

}

span.close-video {

    color: #022082;

    padding: 0px;

    cursor: pointer;

}
	
div#video-wrap-id-10640 {
    display: inline-block;
}
.video-wrap {
	margin-bottom: 35px;
}
.video-right img {
	width: 100%;
    height: 250px;
}
.video-right {
	border: 1px dashed #ddd;
	padding: 10px;
	display: inline-block;
	text-align: center;
	margin: 0 auto;
	width: 100%;
}

.video_content h2 {
font-size: 14px;
    color: #000;
    font-weight: 400;
} 

	div#loadmore {
    margin: 30px 0px 0px 0px;
}
	
	input#search_inp {
    border: 1px dashed #ddd;
    height: 45px;
    border-radius: 5px;
}
	.search_area {
    position: relative;
}
	.search_right {
    background: #212c54;
    position: absolute;
    right: 8px;
    top: 7px;
    padding: 15px 15px;
    text-align: center;
    border-radius: 5px;
}
	

</style>

<section class="hero-section" id="section_1">

   <div class="section-overlay"></div>

   <div class="container justify-content-center align-items-center">

      <div class="row">

         <div class="col-12 mb-5 text-center banner_content">

            <h1 class="text-white mb-5">Newsletter</h1>

			    <div class="search_area">

				   <input type="search" id="search_inp" class="search_inp" placeholder="Search Newsletter" />

				   <div class="search_right" id="form-search-btn">

				<i class="fa fa-search" aria-hidden="true"></i>

					 

				   </div>

				</div>

			

           

         </div>

      </div>

   </div>

  </section>



<section class="video_outer" id="section_1">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 text-align-left hide-class">

            <h2>Newsletter</h2>

         </div>

      </div>

	  <div id="video-section-loader">

		<div id="loading"></div>

	  </div>

	  <div id="video-align-div" class="video-align-div video-loader">

		  <div class="row postList"></div>

		   <div class="row">

			 <div id="loadmore" class="col-lg-12 text-center loadmore hide-class">

				<input type="button" id="loadBtn" value="VIEW ALL NEWSLETTER" class="blog-btn">

				<input type="hidden" id="row" value="0">

				<input type="hidden" id="postCount" value="">

			 </div>

		  </div>

	

	  </div>

	  

   </div>

</section>

<?php  get_footer(); ?>