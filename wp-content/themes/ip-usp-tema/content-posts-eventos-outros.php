<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="#eventos-futuros" id="eventos-futuros-tab" role="tab" data-toggle="tab" aria-controls="eventos-futuros" aria-expanded="true">Próximos eventos</a></li>
			<li role="presentation"><a href="#eventos-passados" id="eventos-passados-tab" role="tab" data-toggle="tab" aria-controls="eventos-passados" aria-expanded="true">Eventos passados</a></li>
		</ul>
		<div class="tab-content">
			<div aria-labelledby="eventos-futuros-tab" class="tab-pane fade active in" id="eventos-futuros" role="tabpanel">
				<?php 
					wp_reset_query();
					
					$args = array (
						'offset'				 => '3',
						'posts_per_page'         => '5',
						'order'                  => 'ASC',
						'orderby'                => 'date',
						'post_type' 			 => 'evento',
						'post_status' 			 => 'future',
					);
					
					$the_query = new WP_Query( $args ); 
				?>

				<?php if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( array("row") ); ?>>
						<div class="resumo <?php if (has_post_thumbnail()): ?> col-md-9 <?php else: ?> col-md-12 <?php endif; ?>">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="data">
								<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><?php the_date('d M Y','',''); ?>
							</div>
						</div>
						<?php if ( get_field( 'imagem_de_busca') ): ?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
							</a>
						<?php endif; ?>
					</article>						
					<?php endwhile; // end of the loop. ?>
				<?php } else { ?>
					<article>
						<p>Nenhum resultado.</p>
					</article>
				<?php } ?>
					<div id="eventos-futuros-load"></div>
					<br style="clear:both;">
					<div class="text-center ver-mais" <?php if( $the_query->post_count < 5): ?> style="display:none;"<?php endif; ?>>
						<a href="http://143.107.57.235/site/?page_id=6884" class="post-link btn btn-primary btn-laranja" data-load="#eventos-futuros-load" data-offset="1" data-status="future">Ver Mais</a>
					</div>
				<?php
					/* Restore original Post Data */
					wp_reset_query();
				?>
				
			</div>
			<div aria-labelledby="eventos-passados-tab" class="tab-pane fade in" id="eventos-passados" role="tabpanel">
				
				<?php 
					wp_reset_query();
					
					$args = array(
						'posts_per_page' => 5, 
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_type' 	 => 'evento',
					);

					$the_query = new WP_Query( $args ); 				
				?>

				<?php if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<article class="row">
						<div class="resumo <?php if (has_post_thumbnail()): ?> col-md-9 <?php else: ?> col-md-12 <?php endif; ?>">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="data">
								<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><?php the_date('d M Y','',''); ?>
							</div>
						</div>
					</article>
						
					<?php endwhile; // end of the loop. ?>
				<?php } else { ?>
					<article>
						<p>Nenhum resultado.</p>
					</article>
				<?php } ?>
					<div id="eventos-passados-load"></div>
					<br style="clear:both;">
					<div class="text-center ver-mais" <?php if( $the_query->post_count < 5): ?> style="display:none;"<?php endif; ?>>
						<a href="http://143.107.57.235/site/?page_id=6884" class="post-link btn btn-primary btn-laranja" data-load="#eventos-passados-load" data-offset="1">Ver Mais</a>
					</div>
				<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>