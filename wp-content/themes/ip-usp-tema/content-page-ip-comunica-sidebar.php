<ul class="nav nav-tabs green-navtab">
	<li role="presentation" class="active"><a href="#mais-recentes" id="mais-recentes-tab" role="tab" data-toggle="tab" aria-controls="mais-recentes" aria-expanded="true">Mais recentes</a></li>
	<li role="presentation"><a href="#mais-acessadas" id="mais-acessadas-tab" role="tab" data-toggle="tab" aria-controls="mais-recentes" aria-expanded="true">Mais acessadas</a></li>
</ul>
<div class="tab-content">
	<div aria-labelledby="mais-recentes-tab" class="tab-pane fade active in" id="mais-recentes" role="tabpanel">
		<?php 
			wp_reset_query();
			
			$args = array (
				'posts_per_page' => '5',
				'order' => 'DESC',
				'orderby' => 'date',
				'post_type'	=> array('noticia'),
			);
			
			$the_query = new WP_Query( $args ); 
		?>

		<?php if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class( array("row") ); ?>>
				<div class="resumo col-md-12">
					<h2><a class="green-sidebar-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
			</article>
				
			<?php endwhile; // end of the loop. ?>
		<?php } else { ?>
			<article>
				<p>Nenhuma notícia.</p>
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
				'order' => 'DESC',
				'post_type'	=> array('noticia'),
			);

			$the_query = new WP_Query( $args ); 				
		?>

		<?php if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class( array("row") ); ?>>
				<div class="resumo col-md-12">
					<h2><a class="green-sidebar-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
			</article>
				
			<?php endwhile; // end of the loop. ?>
		<?php } else { ?>
			<article>
				<p>Nenhuma notícia.</p>
			</article>
		<?php }
			/* Restore original Post Data */
			wp_reset_query();
		?>

	</div>
	<div class="col-md-12 box-cinza" id="fale-com">
		<div class="media">
			<div class="media-left media-middle">
				<a href="#">
					<img class="media-object" src="<?= bloginfo('template_url'); ?>/imgs/ipcomunica_fale.png" alt="">
				</a>
			</div>
			<div class="media-body media-middle">
				<p>
					Fale com a<br>
				 	<strong>Assessoria de Imprensa do Instituto de Psicologia da USP</strong>
				</p>
			</div>
		</div>
	</div>
</div>