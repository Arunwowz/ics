<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */
get_header();
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
?>

<style>
.news-letter-outer {
    width: 100%;
    display: inline-block;
    text-align: center;
}

.news-left {
    border: 1px dashed #ddd;
    padding: 10px;
    display: inline-block;
}

.news-left img {
    width: 60%;
    text-align: center;
    display: inline-block;
}


.news-left p {
    font-size: 18px;
    margin: 10px 0px 0px 0px;
    padding: 10px; color: #000;
} 
</style>

<main id="content" <?php post_class( 'site-main' ); ?>>
	<div class="breadcrumbs">
	        <?php echo do_shortcode( '[flexy_breadcrumb]'); ?>
	    </div>
    <div class="industry-singletype">
	    <div class="single-left">
			<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
				<header class="page-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
			<?php endif; ?>
			<div class="page-content">
				    
				
				<div class="news-letter-outer">
				
					<div class="news-left">
							<?php
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail( 'full' );
									}
							?>
						<?php the_content(); ?>
					</div>
				
				</div>

				<?php wp_link_pages(); ?>
			</div>

		</div>
		<div class="single-right">
			<?php dynamic_sidebar('allpages_sidebar'); ?>
		</div>	
	</div>
</main>

	<?php
endwhile;
get_footer();