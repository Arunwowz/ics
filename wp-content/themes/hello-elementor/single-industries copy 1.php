<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
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
<?php $featured_img_url = get_the_post_thumbnail_url($postID,'full'); ?>
<div class="fullrow" style="background-image:url('<?php echo $featured_img_url; ?>');">
	<div class="page-titlesection">				
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>
<main id="content" <?php post_class( 'site-main' ); ?>>
	<?php //if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<!-- <header class="page-header">
			<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header> -->
	<?php //endif; ?>
	<div class="page-content">
		<div class="industry-singletype">
			<div class="single-left">
				<?php the_content(); ?>
				<div class="post-tags">
					<?php the_tags( '<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
				</div>
				<?php wp_link_pages(); ?>				
				<?php if(get_field('faqs_listing', $postID)){?>
					<div class="custom-faq">
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
				<?php dynamic_sidebar('industries_sidebar'); ?>
			</div>		
		</div>		
	</div>
	<?php comments_template(); ?>
</main>

	<?php
endwhile;
get_footer();