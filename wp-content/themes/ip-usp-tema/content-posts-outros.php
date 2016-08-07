<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="#mais-recentes" id="mais-recentes-tab" role="tab" data-toggle="tab" aria-controls="mais-recentes" aria-expanded="true">Mais recentes</a></li>
			<li role="presentation"><a href="#mais-acessadas" id="mais-acessadas-tab" role="tab" data-toggle="tab" aria-controls="mais-recentes" aria-expanded="true">Mais acessadas</a></li>
		</ul>
		<div class="tab-content">
			<div aria-labelledby="mais-recentes-tab" class="tab-pane fade active in" id="mais-recentes" role="tabpanel">
				<?php 
					wp_reset_query();
					
					$args = array (
						'offset'				 => '3',
						'posts_per_page'         => '5',
						'order'                  => 'DESC',
						'orderby'                => 'date',
						'post_type' 			 => array( 'noticia' )
					);
					
					$the_query = new WP_Query( $args ); 
				?>

				<?php if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( array("row") ); ?>>
						<div class="resumo <?php if (has_post_thumbnail()): ?> col-md-9 <?php else: ?> col-md-12 <?php endif; ?>">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="linhafina"><?php the_excerpt(); ?></p>
						</div>
						<?php if ( get_field( 'imagem_de_busca') ): ?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
							</a>
						<?php endif; ?>
					</article>
						
					<?php endwhile; // end of the loop. ?>
					<div id="mais-recentes-load"></div>
					<br style="clear:both;">
					<div class="text-center ver-mais">
						<a href="http://143.107.57.235/site/?page_id=6892" class="post-link btn btn-primary btn-laranja" data-load="#mais-recentes-load" data-offset="1">Ver Mais</a>
					</div>
				<?php } else { ?>
					<article>
						<p>Nenhum resultado.</p>
					</article>
				<?php }
					/* Restore original Post Data */
					wp_reset_query();
				?>
				
			</div>
			<div aria-labelledby="mais-acessadas-tab" class="tab-pane fade in" id="mais-acessadas" role="tabpanel">
				
				<?php 
					wp_reset_query();
					
					$args = array( 
						'posts_per_page' => 5, 
						'meta_key' => 'wpb_post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => 'DESC'  
					);

					if (in_array ('noticia', array_keys($wp_query->query) ) ){
						$args['post_type'] = array( 'noticia' );
					} elseif (in_array ('evento', array_keys($wp_query->query) ) ){
						$args['post_type'] = array( 'evento' );
					}

					$the_query = new WP_Query( $args ); 				
				?>

				<?php if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<article class="row">
						<div class="resumo <?php if (has_post_thumbnail()): ?> col-md-9 <?php else: ?> col-md-12 <?php endif; ?>">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="linhafina"><?php the_excerpt(); ?></p>
						</div>
						<?php if ( get_field( 'imagem_de_busca') ): ?>
							<div class="col-md-3">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
								</a>
							</div>
						<?php endif; ?>
					</article>
						
					<?php endwhile; // end of the loop. ?>			
				<?php } else { ?>
					<article>
						<p>Nenhum resultado.</p>
					</article>
				<?php }
					/* Restore original Post Data */
					wp_reset_query();
				?>

			</div>
		</div>
	</div>
</div>