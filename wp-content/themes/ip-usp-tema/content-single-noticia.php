<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="header row">
				<div class="col-md-10 col-md-offset-1">
					<p class="categoria"><?php the_category(", "); ?></p>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<!-- <p class="linhafina"><?php the_excerpt(); ?></p> -->
				</div>
			</div><!--  row  -->
			<div class="row metainfo">
				<div class="col-md-2 col-md-offset-1">
					<div class="data">
						<?php if ('evento' == get_post_type() ) : ?>
							<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" />
						<?php elseif ('noticias' == get_post_type() ) : ?>
							<img src="<?php bloginfo('template_url'); ?>/imgs/icon-noticia.png" />
						<?php endif; ?>
						<?php the_date('d M Y','',''); ?>
					</div>
				</div>
				<div class="col-md-8">
					<?php if ('noticias' == get_post_type() ) : ?>
					<?php endif; ?>					
					<ul class="list-inline tags">
						<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
					</ul>
				</div>
			</div><!--  row  -->
			<div class="row content">
				<div class="col-md-10 col-md-offset-1">
					<?php the_content(); ?>
				</div>
			</div><!--  row  -->
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="redes-sociais">
						<div class="row">
							<div class="col-md-4">
							<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo urlencode(get_permalink()); ?>&layout=button_count&size=large&mobile_iframe=true&appId=106178243154175&width=154&height=28" width="154" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							</div>
							<div class="col-md-4">
								<a href="javascript:void(0);" onClick='window.print();'><i class="fa fa-2x fa-print"></i> Imprimir</a>
							</div>
							<div class="col-md-4">
								<a href="mailto:?subject=<?php the_title(); ?>&amp;body=Veja esta notícia em: <?php the_permalink(); ?>"><i class="fa fa-2x fa-envelope"></i> Enviar por e-mail</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row assinatura">
				<div class="col-md-offset-1 col-md-10">
					<strong>IP Comunica | Serviço de apoio institucional</strong> <br>
					Av. Prof. Mello Moraes, 1721 - sala 26 <br>
					Cidade Universitária - São Paulo, SP <br>
				</div>	
			</div>
		</article>
		
	<?php endwhile; // end of the loop. ?>

	<?php get_template_part( 'content', 'single-relacionados' ); ?>
	
<?php } else { ?>
	<article>
		<p>Nenhuma notícia.</p>
	</article>
<?php } ?>

<style type="text/css">
@media print {
	footer,header,.crop,.relacionados,.redes-sociais {
		display: none !important;
	}
}
</style>