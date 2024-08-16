<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! hello_get_header_display() ) {
	return;
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
] );
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" >
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.menus-main, .menus-mainl3, .menus-mainl4 {
	width: 16px;
	height: 16px;
	display: none;
}
nav ul{list-style:none !important;}
.author {
	position: fixed;
	bottom: 15px;
	right: 15px;
	font-family: "Poppins", Sans-serif;
	font-size: 14px;
	color: #999;
}
.input-group.rounded {
    display: flex;
    align-items: center;
}
.forms-col input.form-control {
    border-top: unset;
    border-left: unset;
    border-right: unset;
    margin-left: 15px;
    box-shadow: unset !important;
    background: transparent;
}
.forms-col{
   padding:50px 0;
}
.author a {
	color: #777;
	text-decoration: none;
}

.author a:hover {
	color: blue;
}

header.dark blockquote {
	color: #fff;
}

header.light blockquote {
	color: #000;
}

blockquote {
	max-width: 1000px;
	margin: 0 auto;
	font-size: 16px;
	border-left: 0px;
	padding: 20px;
}

blockquote h2 {
	padding-right: 40px;
	margin: 0px;
}
header{
	padding-top: 0 !important;
	padding-bottom: 0 !important;
}
header.dark blockquote a {
	color: orange;
	text-decoration: underline;
}

header.light blockquote a {
	text-decoration: underline;
}

header.dark nav {
	background-color: #212C54;
	width: 100%;
}

/* Navigation Styles */
nav {
	position: relative;
}

.spaing-cls-divs{
	display: flex;
    justify-content: center;
    padding: 15px 0 0;
}
ul.main-nav{
list-style-type: none;
	padding: 0px;
	font-size: 0px;
}
ul.main-nav>li {
	display: inline-block;
	padding: 0;
}

ul.main-nav>li>a {
	display: block;
	padding: 20px 12px;
	position: relative;
	color: #fff;
	font-size: 16px;
	font-weight: 400;
	box-sizing: border-box;
}

ul.main-nav>li:hover {
	background-color: trasnparent;
}

ul.main-nav>li:hover>a {
	color: #fff;
	font-weight: 400;
    text-decoration:unset;
}

ul.main-nav>li ul.sub-menu-lists {
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	display: block;
}

ul.main-nav>li ul.sub-menu-lists>li {
	padding: 8px 0;
}

ul.main-nav>li ul.sub-menu-lists>li>a {
    font-size: 16px;
    color: #555;
    font-weight: 500 !important;
    font-family: "Poppins", Sans-serif !important;
    text-decoration:unset;
}

.ic {
	position: fixed;
	cursor: pointer;
	display: inline-block;
	right: 25px;
	width: 32px;
	height: 24px;
	text-align: center;
	top: 0px;
	outline: none;
}
.bi.bi-search {
	color: #fff;
}
.ic.close {
	opacity: 0;
	font-size: 0px;
	font-weight: 300;
	color: #fff;
	top: 8px;
	height: 40px;
	display: block;
	outline: none;
}

/* Menu Icons for Devices*/
.ic.menu {
	top: 25px;
	z-index: 20;
}

.ic.menu .line {
	height: 4px;
	width: 100%;
	display: block;
	margin-bottom: 6px;
}

.ic.menu .line-last-child {
	margin-bottom: 0px;
}

.sub-menu-head {
	margin: 10px 0;
}

.banners-area {
	margin-top: 20px;
	padding-top: 15px;
}

.banners-area img {
	width: 150px;
}
.aligned-div {
  max-width: 970px;
  margin: 0 auto;
}

@media only screen and (max-width:768px) {
	.sub-menu-block{display:none;}
.selected ~ .sub-menu-block {
  display: block;
}
	.top-level-link a {
	padding: 5px 12px !important;
	font-size: 14px;
	color: #fff;
	text-decoration: unset;
}
	
.spaing-cls-divs{
	display: flex;
    justify-content: left;
    padding: 15px 0 0;
}
.spaing-cls-divs img {
	padding: 5px 25px 10px 25px;
}
#menu-btn {
  position: absolute;
  right: 1em;
  top: 2em;
  width: 40px;
  padding: 0;
  border-radius: 100%;
  transition: all .2s ease-out;
  z-index:2;
}
  /*Cursor on toggle button hover*/
  #menu-btn:hover{ cursor: pointer; }
  /*Changing color of hamburger lines on hover*/
  #menu-btn:hover .menu-line{ background-color: #999999; }

  #menu-btn:active{ box-shadow: 0 0 5px black; background-color: #524a88; }

  /*Styles for the hamburger lines*/
  .menu-btn-line{ 
    height: .25em; 
    background-color: #fff; 
    margin-bottom: .5em; 
  }
  /*No margin-bottom for last hamburger line.*/
  .menu-btn-line:last-child{ margin-bottom: 0; }
#menu {
  position: absolute;
  background-color: #212c54;
  top: 77px;
  width: 100%;
  z-index: 99999;
  display:none;
}
 .hide-class{
   display:none;
  }
	.sub-menu-head {
		color: orange;
	}

	.ic.menu {
		display: block;
	}

	header.dark .ic.menu .line {
		background-color: #fff;
	}

	header.light .ic.menu .line {
		background-color: #000;
	}

	.ic.menu .line {

		-webkit-transform-origin: center center;
		-ms-transform-origin: center center;
		transform-origin: center center;
	}

	.ic.menu:focus .line {
		background-color: #fff !important;
	}

	.ic.menu:focus .line:nth-child(1) {
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}

	.ic.menu:focus .line:nth-child(2) {
		-webkit-transform: rotate(-45deg);
		-moz-transform: rotate(-45deg);
		-ms-transform: rotate(-45deg);
		transform: rotate(-45deg);
		margin-top: -10px;
	}

	.ic.menu:focus .line:nth-child(3) {
		transform: translateY(15px);
		opacity: 0;
	}

	.ic.menu:focus {
		outline: none;
	}

	.ic.menu:focus~.ic.close {
		opacity: 1;
		z-index: 21;
		outline: none;
	}

	/*
  
  .ic.menu:focus ~ .ic.close { opacity: 1.0; z-index : 21;  }
  .ic.close:focus { opacity: 0; }
  */
	.ic.menu:hover,
	.ic.menu:focus {
		opacity: 1;
	}


	nav {
		background-color: transparent;
	}

	/ Main Menu for Handheld Devices  /

	.ic.menu:focus~.main-nav {
		width: 300px;
		background-color: rgba(0, 0, 0, 1);
	}

	

	ul.main-nav>li>a:after {
		display: none;
	}

	ul.main-nav>li:first-child {
		border-radius: 0px;
	}

	ul.main-nav>li {
		display: block;
		border-bottom: 1px solid #444;
	}

	ul.main-nav>li>a {
		font-weight: 600;
	}

	ul.main-nav>li ul.sub-menu-lists>li a {
		color: #eee;
		font-size: 14px;
	}

	.sub-menu-head {
		font-size: 16px;
	}

	ul.main-nav>li:hover {
		background-color: transparent;
	}

	ul.main-nav>li:hover>a {
		color: #fff;
		text-decoration: none;
		font-weight: 600;
	}

	.ic.menu:focus~ul.main-nav>li>div. {
		border-left: 0px solid #ccc;
		border-right: 0px solid #ccc;
		border-bottom: 0px solid #ccc;
		position: relative;
		visibility: visible;
		opacity: 1.0;
	}

	.sub-menu-block {
		padding: 0 30px;
	}

	.banners-area {
		padding-bottom: 0px;
	}

	.banners-area div {
		margin-bottom: 15px;
	}

	.banners-area {
		border-top: 1px solid #444;
	}
	
}
@media only screen and (max-width:767px) {
	.mega-menu .iconnav {
		display: block !important;
	}
}

@media only screen and (min-width:769px) {
	.sub-menu-block .dropdown-item {
	color: #000 ;
}
	.mega-menu .iconnav {
	display: none !important;
}
	
.aligned-div div {
	margin: 5px 0;
	border-bottom: dotted 1px #f3f3f3;
	text-transform: capitalize;
	font-size: 16px;
}
	.ic.menu {
		display: none;
	}

	/* Main Menu for Desktop Devices  */
	ul.main-nav {
		display: block;
		position: relative;
        padding-left:100px;
	}

	.sub-menu-block {
		padding: 15px;
	}

	/* Sub Menu */
	ul.main-nav>li>div.sub-menu-block {
		visibility: hidden;
		background-color: #f9f9f9;
		position: fixed;
		margin-top: 0px;
		width: 100%;
		color: #333;
		left: 0;
		box-sizing: border-box;
		z-index: 3;
		font-size: 16px;
		border-left: 1px solid #ccc;
		border-right: 1px solid #ccc;
		border-bottom: 1px solid #ccc;
		opacity: 0;

		/*CSS animation applied for sub menu : Slide from Top */
		-webkit-transition: all 2.5s ease 0s;
		-o-transition: all 2.5s ease 0s;
		transition: all 2.5s ease 0s;
		-webkit-transform: rotateX(90deg);
		-moz-transform: rotateX(90deg);
		-ms-transform: rotateX(90deg);
		transform: rotateX(90deg);
		-webkit-transform-origin: top center;
		-ms-transform-origin: top center;
		transform-origin: top center;

	}

	ul.main-nav>li:hover>div.sub-menu-block {
		background-color: #f9f9f9;
		visibility: visible;
		opacity: 1;
		-webkit-transform: rotateX(0deg);
		-moz-transform: rotateX(0deg);
		-ms-transform: rotateX(0deg);
		transform: rotateX(0deg);
        z-index:9999999 !important;
	}

	ul.main-nav>li>div.sub-menu-block>* {
		-webkit-transition-property: opacity;
		-moz-transition-property: opacity;
		-o-transition-property: opacity;
		transition-property: opacity;
		-webkit-transition-duration: 0.4s;
		-moz-transition-duration: 0.4s;
		-o-transition-duration: 0.4s;
		transition-duration: 0.4s;
		opacity: 0;
	}

	ul.main-nav>li:hover>div.sub-menu-block>* {
		opacity: 1;
	}

	.sub-menu-head {
		font-size: 20px;
	}

	/* Drop Down/Up Arrow for Mega Menu */
	ul.main-nav>li>a.mega-menu>span {
		display: block;
		vertical-align: middle;
       color: #fff;
	}

	ul.main-nav>li>a.mega-menu>span:after {
		width: 0;
		height: 0;
		border-left: 5px solid transparent;
		border-right: 5px solid transparent;
		border-top: 5px solid #fff;
		/*content: '';*/
		background-color: transparent;
		display: inline-block;
		margin-left: 10px;
		vertical-align: middle;
       color: #fff;
	}

	ul.main-nav>li:hover>a.mega-menu span:after {
		border-left: 5px solid transparent;
		border-right: 5px solid transparent;
		border-top: 0px solid transparent;
		border-bottom: 5px solid #fff;
	}

	.banners-area {
		border-top: 1px solid #ccc;
	}
}
.searchpopdiv{
	display:flex;
	flex-wrap: wrap;
}
.searchpopdiv h6{
	font-weight:600;
}
.serchbar_box, .searchboxmenu {
	width: 100%;
	display: block;
}
.searchboxmenu ul{
	list-style: none;
	margin: 15px 0;
	padding:0;
}
.searchboxmenu ul li{
	text-decoration:none;
	font-size: 14px;
}
.page-header {
	padding-bottom: 0 !important;
	margin: 0 !important;
	border-bottom: 0px solid #eee!important;
}
.iconnavlevel {
	display: none;
}
@media only screen and (max-width: 992px) {
.cross {
      display: block !important;
   }
   .main-nav {
      display: none;
   }
   
span.iconnav {
    padding-right: 15px;
    position: absolute;
    right: 0;
    margin-top: -25px;
}
   }
.top-level-link:nth-child(1) :hover .sub-menu-lists div:nth-child(4) .menus-main {
	display: inline-block !important;
}
.top-level-link:nth-child(1) :hover .sub-menu-lists div:nth-child(10) .menus-main {
	display: inline-block !important;
}
.top-level-link:nth-child(1) :hover .sub-menu-lists div:nth-child(4) #html-show li:nth-child(1) .menus-mainl3 {
display: none !important;
	/*display: inline-block !important;*/
}
.top-level-link:nth-child(1) :hover .sub-menu-lists div:nth-child(10) #html-show li:nth-child(1) .menus-mainl3 {
	display: none !important;
}
.top-level-link:nth-child(1) :hover .sub-menu-lists div:nth-child(4) #html-show li:nth-child(1) .menus-mainl3 .d-noness :hover li:nth-child(2) .menus-mainl4 {
	display: inline-block !important;
}
.lvl5{
	display:none;
}
.d-noness li:nth-child(2) .menus-mainl4 {
	display: inline-block !important;
}
.d-noness li:hover ul {
	display: block !important;
}
 </style>

<?php 
	$menus = wp_get_nav_menus();	
	$menuname = $menus[0]->term_id;	
	$menuitems = wp_get_nav_menu_items( $menuname );
?>
<header id="site-header" class="site-header dynamic-header dark <?php echo esc_attr( hello_get_header_layout_class() ); ?>" role="banner">
	<div class="topbar-box">
		<div class="topbar_inner">
			<div class="topbar_inner_left">
				<?php dynamic_sidebar('topbarleft_sidebar');?>
			</div>
		</div>
		<div class="topbar_inner">
			<div class="topbar_inner_right">
				<?php dynamic_sidebar('topbarright_sidebar');?>
			</div>
		</div>
	</div>
	<nav role="navigation">
		<div class="spaing-cls-divs">   
			<div class="imgs-sec">
				<a href="https://icspro.net">
				   <img width="263" height="62" src="https://icspro.net/wp-content/uploads/2023/06/ics-logo.png" class="attachment-medium size-medium wp-image-29" alt="" loading="lazy">	
				</a>
			</div>
			<div id="menu-btn">
			  <div class="menu-btn-line"></div>
			  <div class="menu-btn-line"></div>
			  <div class="menu-btn-line"></div>
			</div>
			<ul class="main-nav" id="menu">
			<?php
				$menu = get_term( $locations['locations-menu-1'], 'nav_menu' );
				$menu_items = wp_get_nav_menu_items(2);
				//echo '<pre>'; print_r($menu_items); die();
				$bool = true;
				foreach( $menu_items as $menu_item ) {				
					 if( $menu_item->menu_item_parent == 0 ) {
						$title = $menu_item->title;
						$link = $menu_item->url;
						$parent = $menu_item->ID;
			?>
						<li class="top-level-link">
							<a class="mega-menu" href="<?php echo $link;?>">
								<span><?php echo $title;?></span>								
							
							</a>
							<span class="iconnav">
								<i class="fa fa-plus menuplus" aria-hidden="true" style="display:none;"></i>
								<i class="fa fa-minus menuminus" aria-hidden="true" style="display:none;"></i>
							</span>
							<?php if($parent){ ?>
								<div class="sub-menu-block hide-class" id="sub-menu-blockss">
									<div class="row aligned-div">
										<ul class="sub-menu-lists">
								<?php foreach( $menu_items as $submenu ){	?>
										<?php						
												if( $submenu->menu_item_parent == $parent ) {
														$submenu_title = $submenu->title;
														$submenu_link = $submenu->url;
														$submenu_level2 = $submenu->ID;	
												?>
													<div class="col-md-3 col-lg-3 col-sm-3">
														<li>
															<a class="dropdown-item " href="<?php echo $submenu_link;?>">
																<?php echo $submenu_title; ?>
															</a>
															<?php if($submenu_level2){ ?>
																<ul id="html-show">
																	<?php
																		foreach( $menu_items as $submenu_level3 ){
																			if( $submenu_level3->menu_item_parent == $submenu_level2 ) {
																				$submenulevel3_link = $submenu_level3->url;
																				$submenulevel3_title = $submenu_level3->title;
																				$sub_submenu_level3 = $submenu_level3->ID;
																	?>
																	<li>
																		<a class="dropdown-item" href="<?php echo $submenulevel3_link;?>">				
																		<?php echo $submenulevel3_title;?>
																		</a>
																		<?php if($sub_submenu_level3){ ?>
																			<ul class="d-noness">
																				<?php	
																					foreach( $menu_items as $submenu_level4 ){
																						if( $submenu_level4->menu_item_parent == $sub_submenu_level3 ) {
																							$submenulevel4_link = $submenu_level4->url;
																							$level4_title = $submenu_level4->title;
																							$sub_submenu_level5 = $submenu_level4->ID;
																				?>
																						<li>
																							<a class="dropdown-item" href="<?php echo $level4_title; ?>">
																								<?php echo $level4_title; ?>
																							</a>
																						
																							<?php if($sub_submenu_level5){ ?>
																									<ul class="lvl5">
																								<?php 
																									foreach( $menu_items as $submenu_level5 ){
																										if( $submenu_level5->menu_item_parent == $sub_submenu_level5 ) {
																											$level5_title = $submenu_level5->title;
																											$level5_link = $submenu_level4->url;
																								?>	
																									<li>
																										<a class="dropdown-item" href="<?php echo $level5_link; ?>">
																											<?php echo $level5_title;?> 
																										</a>
																									</li>	
																								<?php		}
																									} 
																								?>
																									</ul>
																							<?php } ?>		
																						</li>
																				<?php
																						}
																					}
																				?>
																			</ul>
																		<?php } ?>
																	</li>
																		<?php } }?>
																</ul>
															<?php } ?>
														</li>
													</div>
												<?php 	} 	?>
								<?php } ?>
										</ul>
									</div>
								</div>
							<?php } ?>
							
						</li>
				<?php } } ?>
					
				<li class="top-level-link">
					<div class="sub-menu-block searchpop" style="display:none;">
						<div class="row aligned-div">
							<div class="col-md-12 col-lg-12 col-sm-12">
								<ul class="sub-menu-lists">
									<div class="input-group rounded forms-col searchpopdiv">
										<div class="serchbar_box">
											<?php echo do_shortcode('[wd_asp id=1]'); ?>
										</div>
										<div class="searchboxmenu">
											<h6>Quick Links</h6>
											<?php 
												$menui_tems_search = wp_get_nav_menu_items( 66 );
												echo '<ul class="serchbar_box_items">';
												foreach( $menui_tems_search as $item_search ){						
														$link = $item_search->url;
														$title = $item_search->title;
														echo '<li>
																<a href="'.$link.'">'.$title.'</a>
															  </li>';
													}
												echo '</ul>';
											?>
										</div>
									</div>
								</ul>           
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	












	<!--<div class="header-inner">
		<div class="site-branding show-<?php /* echo esc_attr( hello_elementor_get_setting( 'hello_header_logo_type' ) ); ?>">
			<?php if ( has_custom_logo() && ( 'title' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-logo <?php echo esc_attr( hello_show_or_hide( 'hello_header_logo_display' ) ); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ( $site_name && ( 'logo' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
				<h1 class="site-title <?php echo esc_attr( hello_show_or_hide( 'hello_header_logo_display' ) ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr__( 'Home', 'hello-elementor' ); ?>" rel="home">
						<?php echo esc_html( $site_name ); ?>
					</a>
				</h1>
			<?php endif;

			if ( $tagline && ( hello_elementor_get_setting( 'hello_header_tagline_display' ) || $is_editor ) ) : ?>
				<p class="site-description <?php echo esc_attr( hello_show_or_hide( 'hello_header_tagline_display' ) ); ?>">
					<?php echo esc_html( $tagline ); ?>
				</p>
			<?php endif;  */?>
		</div>

		


		<?php /* if ( $header_nav_menu ) : ?>
			<nav class="site-navigation <?php echo esc_attr( hello_show_or_hide( 'hello_header_menu_display' ) ); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
			<div class="site-navigation-toggle-holder <?php echo esc_attr( hello_show_or_hide( 'hello_header_menu_display' ) ); ?>">
				<div class="site-navigation-toggle" role="button" tabindex="0">
					<i class="eicon-menu-bar" aria-hidden="true"></i>
					<span class="screen-reader-text"><?php echo esc_html__( 'Menu', 'hello-elementor' ); ?></span>
				</div>
			</div>
			<nav class="site-navigation-dropdown <?php echo esc_attr( hello_show_or_hide( 'hello_header_menu_display' ) ); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif;   */?>
	</div> -->
</header>