<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => array( 'revistaipcomunica' ),
		'posts_per_page'         => 3,
	);
	$the_query = new WP_Query( $args ); 
?>

<div class="row header">
	<div class="col-md-2 seletor-holder tar">
		<?php seletorPosts($the_query); ?>
	</div>
	<div class="col-md-10 titulo">
		<h1>IP Na Mídia</h1>
	</div>
</div>
<?php if ( $the_query->have_posts() ) { ?>
	<div id="na-midia-slider" class="liquid-slider">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-md-2 metainfo tar">
							<div class="data">
							</div>
						</div>
						<div class="col-md-8 resumo">

								<a href="<?php the_permalink(); ?>" class="green-link">

									<?php if(!empty(has_post_thumbnail())) : ?>
									<div class="imgLiquidFill imgLiquid" style="width:100%; height:200px;">
									    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0]; ?>" />
									</div>
									<?php endif; ?>

									<h2 class="green-chamada"><?php the_title(); ?></h2>

									<?php if(!empty(get_the_tags())) : ?>
									<div class="metainfo">
										<ul class="list-inline tags">
										<?php foreach(get_the_tags() as $tag) : ?>
											<li>#<?php echo($tag->name); ?></li>
										<?php endforeach; ?>
										</ul>
									</div>
									<?php endif; ?>

									<div class="local">
										<p>
										<?php if(!empty(get_field('ano_e_numero'))) : ?>
											<i class="fa fa-2x fa-newspaper-o"></i> <?php echo get_field('ano_e_numero'); ?>
										<?php endif; ?>
										<?php if(!empty(get_field('local'))) : ?>
											<i class="fa fa-2x fa-map-marker"></i> <?php echo get_field('local'); ?> 
										<?php endif; ?>
										<?php if(!empty(get_field('candidato'))) : ?>
											<i class="fa fa-2x fa-user"></i> <?php echo get_field('candidato'); ?> 
										<?php endif; ?>
										<?php if(!empty(get_field('horario'))) : ?>
											<i class="fa fa-2x fa-clock-o"></i> <?php echo get_field('horario'); ?> 
										<?php endif; ?>
										</p>
									</div>

								</a>

						</div>
					</div><!--  row  -->
				</article>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php } else { ?>
	<article style="text-align: center;">
		<p>Nenhum IP na mídia cadastrado.</p>
	</article>
<?php }
	/* Restore original Post Data */
	wp_reset_query();
?>