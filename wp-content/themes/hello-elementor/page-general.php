<?php
/**
 * Template Name: solutions-tempalte
 *
 * @package HelloElementor
 */
get_header();
$postID = get_the_ID();

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>
    <style>
    .fullrow .entry-title {
    margin: 0!important;
}
    #content {
	max-width: 1160px;
	width: 100%;
	margin: 0 auto;
}
    </style>
<?php $featured_img_url = get_the_post_thumbnail_url($postID,'full'); ?>
<div class="fullrow" style="background-image:url('<?php echo $featured_img_url; ?>');">
	<div class="page-titlesection">				
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>
<main id="content" <?php post_class( 'site-main' ); ?>>
	
	<div class="page-content">
    <div class="breadcrumbs" id="<?php echo $postID;?>">
    <div class="fbc fbc-page">
   <!-- Breadcrumb wrapper -->
   <div class="fbc-wrap">
      <!-- Ordered list-->
      <ol class="fbc-items" itemscope="" itemtype="https://schema.org/BreadcrumbList">
         <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span itemprop="name">
               <!-- Home Link -->
               <a itemprop="item" href="https://icspro.net">
               <i class="fa fa-home" aria-hidden="true"></i>Home                    
               </a>
            </span>
            <meta itemprop="position" content="1">
            <!-- Meta Position-->
         </li>
		 <li><span class="fbc-separator">/</span></li>
         <li class="active" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span itemprop="name" title="Solutions">
				<a itemprop="item" href="https://icspro.net/solutions">Solutions</a>
			</span>
            <meta itemprop="position" content="2">
         </li>
		 <li><span class="fbc-separator">/</span></li>
         <li class="active" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span itemprop="name" title="Cloud Migration">
				<a itemprop="item" href="https://icspro.net/solutions/cloud-migration/">Cloud Migration</a>
			</span>
            <meta itemprop="position" content="3">
         </li>
         <li><span class="fbc-separator">/</span></li>
         <li class="active" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span itemprop="name" title="<?php the_title();?>"><?php the_title();?></span>
            <meta itemprop="position" content="4">
         </li>
      </ol>
      <div class="clearfix"></div>
   </div>
</div>
</div>

		<div class="industry-singletype">
			<div class="single-left">
				<?php the_content(); ?>
				<div class="post-tags">
					<?php the_tags( '<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
				</div>
				<?php wp_link_pages(); ?>
				<?php if(get_field('faqs_listing', $postID)){?>
					<div class="custom-faq">
						<div class="faq_boxtitle_desc">
                        	<h4><?php echo get_field('faqbox_title', $postID);?></h4>
                            <div><?php echo get_field('faqbox_shortdescription', $postID);?></div>
                        </div>
                        <div class="faq-boxes">
                        	
							<?php  
								while( the_repeater_field('faqs_listing', $postID) ) {
									$faq_title = get_sub_field('faq_title');
									$faq_description = get_sub_field('faq_description');
							?>							
									<div class="faqserv-box">
										<button class="accordion"><?php echo $faq_title; ?></button>
										<div class="panel"><?php echo $faq_description; ?></div>
									 </div>							
							<?php	} ?>
						</div>
					</div>
				<?php } ?>				
			</div>
			<div class="single-right">
				<?php dynamic_sidebar('services_sidebar'); ?>
			</div>		
		</div>		
	</div>
	<?php comments_template(); ?>
</main>

	<?php
endwhile;
get_footer();