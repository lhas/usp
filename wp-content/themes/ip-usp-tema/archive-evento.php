<?php
/**
 * The template for displaying Archive Results pages.
 *
 * @package unite
 */

get_header(); ?>

<?php
/* Buscar eventos */
$args = array(
	'post_type' => array('evento', 'defesa'),
	'posts_per_page' => 999999
);
$eventos = new WP_Query($args);
$datas = array();

while ( $eventos->have_posts() ) { $eventos->the_post();
	$data = get_field('data');

	if(!empty($data)) {
		$datas[] = $data;
	}
}


?>
	
<div class="green-espacamento container conteudo conteudo-archive">

	<div class="destaque row" id="destaque-posts">
		<div class="col-md-offset-1 col-md-10">
			<?php require_once "carousel-eventos.php"; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<hr class="green-linha-laranja">
		</div>
	</div>

	<div class="row">

		<div class="calendarios" data-selected-dates='<?php echo json_encode($datas); ?>'></div>

	</div> <!-- .row -->

	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			
			<ul id="listaEventos" data-selected-dates='<?php echo json_encode($datas); ?>'>
				<?php while ( $eventos->have_posts() ) : $eventos->the_post(); $data = get_field('data'); $explode = explode("/", $data); ?>
					<?php if(!empty($data)) : ?>
						<li data-month="<?php echo $explode[1]; ?>" data-year="<?php echo $explode[2]; ?>" style="display: none;">

							<a href="<?php the_permalink(); ?>">

								<p class="data"><?php echo $data; ?></p>

								<p><?php echo get_the_title(); ?></p>
							</a>
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>	
		</div> <!-- .col -->

	</div> <!-- .row -->

</div>

<?php get_footer(); ?>