<?php
/**
 * The template for displaying category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package p619
 */
global $woo_options;
get_header(); ?>

<!-- #content Starts -->
<?php woo_content_before(); ?>

<header class="entry-header">
	<?php
	if ( is_product_category() ){
	    global $wp_query;

	    // get the query object
	    $cat = $wp_query->get_queried_object();

	    // get the thumbnail id using the queried category term_id
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );

	    // get the image URL
	    $image = wp_get_attachment_url( $thumbnail_id );

	    // print the IMG HTML
	    echo "<img src='{$image}' alt='' width='762' height='365' />";
	};
	the_title( '<h1 class="entry-title">', '</h1>' );
	?>
	<div class="down-arrow"></div>
</header><!-- .entry-header -->

<div id="content" class="col-full">

		<div id="main-sidebar-container">

				<!-- #main Starts -->
				<?php woo_main_before(); ?>
				<div id="main" class="col-left">

				<?php get_template_part( 'loop', 'archive' ); ?>

				</div><!-- /#main -->
				<?php woo_main_after(); ?>

				<?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->

		<?php get_sidebar( 'alt' ); ?>

</div><!-- /#content -->
<?php woo_content_after(); ?>

<?php get_footer(); ?>
