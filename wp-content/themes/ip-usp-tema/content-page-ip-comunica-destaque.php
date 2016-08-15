<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => array('noticia'),
		'posts_per_page'         => '3',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'category__not_in'  	 => '-255,-24',
	);
	$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) { ?>
	<div id="destaque-ip-comunica-slider" class="liquid-slider">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row header">
						<div class="col-md-10 col-md-offset-1 ">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="linhafina"><?php echo get_post_meta('linhafina'); ?></div>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php } else { ?>
<article>
	<p>Nenhuma notícia recente.</p>
</article>
<?php }
/* Restore original Post Data */
wp_reset_query();
?>

<div class="row seletor-holder">
	<div class="col-md-2 col-md-offset-1">
		<?php seletorPosts($the_query, null, null, true); ?>
	</div>
</div>