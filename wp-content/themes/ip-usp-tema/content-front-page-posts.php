<?php 
	wp_reset_query();
	$total = 6;
	$slides = [];
	$args = array (
		'post_type'              => array( 'noticia' ),
		'posts_per_page'         => $total
		
	);
	$the_query = new WP_Query( $args );

	// Itera todos os posts
	while ( $the_query->have_posts() ) : $the_query->the_post();

		// Se o post tiver uma imagem destacada,
		// preenche o slide atual e vai para o próximo
		if(get_the_post_thumbnail()) :

			// itera entre os slides
			for ($i=1; $i <= 3; $i++) {
				// se o slide iterado estiver vazio
				if(empty($slides[$i])) {
					// cria um slide para ele
					$slides[$i][] = [
						'id' => get_the_id(),
						'titulo' => get_the_title(),
						'data' => get_the_date('d') . '<br>' . get_the_date('M'),
						'permalink' => get_the_permalink(),
						'imagem' => wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0],
						'categoria' => get_the_category()[0],
						'tags' => get_the_tags(),
					];
					break;
				}
			}

		else:

			for ($i=1; $i <= 3; $i++) {

				if(empty($slides[$i][0])) {
					$slides[$i][0] = [
						'id' => get_the_id(),
						'titulo' => get_the_title(),
						'data' => get_the_date('d') . '<br>' . get_the_date('M'),
						'permalink' => get_the_permalink(),
						'categoria' => get_the_category()[0],
						'tags' => get_the_tags(),
					];
					break;
				} else {

					if(empty($slides[$i][0]['imagem']) && empty($slides[$i][1]) ) {
						$slides[$i][] = [
							'id' => get_the_id(),
							'titulo' => get_the_title(),
							'data' => get_the_date('d') . '<br>' . get_the_date('M'),
							'permalink' => get_the_permalink(),
							'categoria' => get_the_category()[0],
							'tags' => get_the_tags(),
						];
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
		<?php seletorPosts($the_query, "noticias-seletor", 3); ?>
	</div>
	<div class="col-xs-10 titulo">
		<h1>Notícias</h1>
	</div>
</div>

	<div class="liquid-slider" id="noticias-slider">
		<?php foreach($slides as $articles) : ?>
				<div>
					<?php foreach($articles as $article) : ?>
					<article id="post-<?php echo $article['id']; ?>">
						<div class="row">
							<div class="col-xs-2 metainfo">
								<div class="data">
									<strong>
										<img src="<?php echo get_template_directory_uri(); ?>/imgs/icon-noticia.png" /><br>
										<?php echo $article['data']; ?>
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

									<p class="green-categoria">
										<?php echo $article['categoria']->name; ?>
									</p>

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