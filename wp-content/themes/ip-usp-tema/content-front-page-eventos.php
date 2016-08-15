<?php 
	wp_reset_query();
	$total = 6;
	$slides = [];
	$args = array (
		'post_type'              => array( 'evento', 'defesa' ),
		'posts_per_page'         => $total,
		'meta_key'			=> 'data',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC'
		
	);
	$the_query = new WP_Query( $args );

	// Itera todos os posts
	while ( $the_query->have_posts() ) : $the_query->the_post();

		$tmp = [
			'id' => get_the_id(),
			'titulo' => get_the_title(),
			'data' => get_the_date('d') . '<br>' . get_the_date('M'),
			'permalink' => get_the_permalink(),
			'categoria' => get_the_category()[0],
			'tags' => get_the_tags(),
			'local' => get_field('local'),
			'nivel' => get_field('nivel'),
			'data_em_breve' => DateTime::createFromFormat("d/m/Y", get_field('data'))
		];

		// Se o post tiver uma imagem destacada,
		// preenche o slide atual e vai para o próximo
		if(get_the_post_thumbnail()) :

			// itera entre os slides
			for ($i=1; $i <= 3; $i++) {
				// se o slide iterado estiver vazio
				if(empty($slides[$i])) {
					// cria um slide para ele
					$tmp['imagem'] = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];

					$slides[$i][] = $tmp;
					break;
				}
			}

		else:

			for ($i=1; $i <= 3; $i++) {

				if(empty($slides[$i][0])) {
					$slides[$i][0] = $tmp;
					break;
				} else {

					if(empty($slides[$i][0]['imagem']) && empty($slides[$i][1]) ) {
						$slides[$i][] = $tmp;
						break;
					} else {
						continue;
						break;
					}
				}
			}

		endif;
	endwhile;


?>
<div class="row header">
	<div class="col-xs-2 seletor-holder" style="padding: 0px;">
		<?php seletorPosts($the_query, "eventos-seletor", 3); ?>
	</div>
	<div class="col-xs-10 titulo">
		<h1>Eventos</h1>
	</div>
</div>

	<div class="liquid-slider" id="eventos-slider">
		<?php foreach($slides as $articles) : ?>
				<div>
					<?php foreach($articles as $article) : ?>
					<article id="post-<?php echo $article['id']; ?>">
						<div class="row">
							<div class="col-xs-2 metainfo">
								<div class="data">
									<strong>
										<img src="<?php echo get_template_directory_uri(); ?>/imgs/icon-noticia.png" /><br>
										<?php if(empty($article['data_em_breve'])) : ?>
											<?php echo $article['data']; ?>
										<?php else: ?>
											<?php echo $article['data_em_breve']->format("d") . '<br>' . strtolower(strftime("%b", $article['data_em_breve']->getTimestamp())); ?>
										<?php endif; ?>
									</strong>
								</div>
							</div>
							<div class="col-xs-8 resumo">

								<a href="<?php echo $article['permalink']; ?>" class="green-link">

									<?php if(!empty($article['imagem'])) : ?>
									<div class="imgLiquidFill imgLiquid" style="width:100%; height:200px;">
									    <img src="<?php echo $article['imagem']; ?>" />
									</div>
									<?php endif; ?>

									<?php if(empty($article['nivel'])) : ?>
										<p class="green-categoria">
											<?php echo $article['categoria']->name; ?>
										</p>
									<?php else: ?>
										<p class="green-categoria">
											Defesa
										</p>
									<?php endif; ?>

									<h2 class="green-chamada"><?php echo $article['titulo']; ?></h2>

									<?php if(!empty($article['tags'])) : ?>
									<div class="metainfo">
										<ul class="list-inline tags">
										<?php foreach($article['tags'] as $tag) : ?>
											<li>#<?php echo($tag->name); ?></li>
										<?php endforeach; ?>
										</ul>
									</div>
									<?php endif; ?>


									<?php if(!empty($article['local'])) : ?>
									<div class="local">
										<i class="fa fa-2x fa-map-marker"></i> <span><?php echo $article['local']; ?></span>
									</div>
									<?php endif; ?>

									</a>
							</div>
						</div><!--  row  -->
					</article>
					<?php endforeach; ?>
				</div>
		<?php endforeach; ?>
	</div>

<?php
	/* Restore original Post Data */
	wp_reset_query();
?>