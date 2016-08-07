<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => 'biblioteca',
		'posts_per_page'         => '3',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	$the_query = new WP_Query( $args ); 
?>
<div id="destaque-biblioteca">	
	<?php if ( $the_query->have_posts() ) { ?>
		<div id="destaque-biblioteca-slider" class="liquid-slider">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if ($the_query->current_post != 0) { ?> style="display:none;" <?php } ?> >
						<div class="row header">
							<div class="col-md-10 col-md-offset-1 ">
								<p class="categoria"><?php the_category(", "); ?></p>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
			<?php seletorPosts($the_query); ?>
		</div>
	</div>
</div>

<div class="row content biblioteca">
	<div class="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 busca-integrada box-cinza">
					<div class="row">
						<h2 class="col-md-12">
							Portal de Busca Integrada
						</h2>
					</div>
					<div class="row">
						<div class="col-md-6">
							<form action="http://www.buscaintegrada.usp.br/primo_library/libweb/action/search.do?fn=go&ct=search" method="post" target="_blank">
								<input id="mode" name="mode" type="hidden" value="Basic">
								<input id="tab" name="tab" type="hidden" value="default_tab">
								<input id="indx" name="indx" type="hidden" value="1">
								<input id="dum" name="dum" type="hidden" value="true">
								<input id="str" name="srt" type="hidden" value="rank">
								<input id="vid" name="vid" type="hidden" value="USP">
								<input id="frbg" name="frbg" type="hidden" value="">

								<div class="input-group">
									<input type="text" class="form-control" placeholder="" name="">
									<span class="input-group-btn">
										<input type="submit" class="btn btn-default btn-laranja" type="button">Buscar</<input type="text">>
									</span>
								</div><!-- /input-group -->
							</form>
						</div>
						<div class="col-md-3 col-md-offset-3 text-center" id="appstore">
							<a href="#"><img src="<?= bloginfo('template_url'); ?>/imgs/google-play-btn.png" alt=""></a>
							<a href="#"><img src="<?= bloginfo('template_url'); ?>/imgs/app-store-btn.png" alt=""></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 search-options">
							<a href="http://primofs1.sibi.usp.br:8991/pds?func=load-login&institute=USP&calling_system=primo&lang=por&url=http://buscaintegrada.usp.br:80/primo_library/libweb/action/login.do?targetURL=http%3a%2f%2fbuscaintegrada.usp.br%2fprimo_library%2flibweb%2faction%2fsearch.do%3fdscnt%3d0%26amp%3bfromLogin%3dtrue%26amp%3bdstmp%3d1415804230939%26amp%3bvid%3dUSP%26amp%3bct%3dAdvancedSearch%26amp%3bmode%3dAdvanced">Identificação</a> |
							<a href="http://buscaintegrada.usp.br/primo_library/libweb/action/search.do?dscnt=1&fromLogin=true&dstmp=1416078464304&vid=USP&ct=AdvancedSearch&mode=Advanced&fromLogin=true">Busca avançada</a> |
							<a href="http://buscaintegrada.usp.br/primo_library/libweb/action/search.do?vid=USP&pagina=azlist">Revistas eletrônicas</a> |
							<a href="http://buscaintegrada.usp.br/primo_library/libweb/action/search.do?vid=USP&pagina=azbooks">Livros eletrônicos (e-books )</a> |
							<a href="http://buscaintegrada.usp.br/primo_library/libweb/action/search.do?vid=USP&pagina=azbase">Bases de dados A-Z</a> |
							<a href="http://143.107.154.62/Vocab/">Vocabulário Controlado da USP</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row boxes-links">
			<div class="col-md-4">
				<div class="col-md-12 box-cinza">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-logo-museu.png" alt="">
							</a>
						</div>
						<div class="media-body media-middle">
							<h4 class="media-heading">Museu de Psicologia do IP USP</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 box-cinza">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-logo-bvs.png" alt="">
							</a>
						</div>
						<div class="media-body media-middle">
							<h4 class="media-heading">Biblioteca Virtual em Saúde – Psicologia Brasil</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 box-cinza">
					<div class="media media-half">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-logo-faq.png" alt="">
							</a>
						</div>
						<div class="media-body media-middle">
							<h4 class="media-heading">Dúvidas frequentes</h4>
						</div>
					</div>
					<div class="media media-half">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-logo-livro.png" alt="">
							</a>
						</div>
						<div class="media-body media-middle">
							<h4 class="media-heading">Sugestões de livros para adquirir</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row boxes-links">
			<?php if ( is_active_sidebar( 'biblioteca_01' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_01' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'biblioteca_02' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_02' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'biblioteca_03' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_03' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div><!--  row  -->
