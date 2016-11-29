<?php
/**
 * Template Name: marcasc cat template.
 */
?>
<?php get_header(); ?>
<div class="display_dos">
	<?php
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$query = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'category_name' => array( 'marcasc' ),
		'orderby' => 'date',
		'order' => 'ASC',
		'paged' => $paged
	) );
	/**
	 * backup wp_query
	 * assign $query to $wp_query object
	 */
	$temp_query = $wp_query;
	$wp_query = NULL;
	$wp_query = $query;
	?>
	<?php //query_posts( 'category_name=aciform&showposts=2' );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>

		<div class="galeria_info">
			<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
			<?php
			if ( has_post_thumbnail() ) {
				echo '<a href="' . get_permalink( $post->ID ) . '" >';
				the_post_thumbnail( 'minimo' );
				echo '</a>';
			}
			?>
		</div>
		<?php the_title( '<h3>', '</h3>' ); ?>

	<?php endwhile;

	if ( function_exists( 'wp_bootstrap_pagination' ) ): ?>
		<?php wp_bootstrap_pagination(); ?>
	<?php endif; ?>
	</div>
	<?php
	/**
	 * reset query
	 */
	wp_reset_query();
	$wp_query = NULL;
	$wp_query = $temp_query;

	else : endif; ?>

<?php get_sidebar(); ?>
</div>