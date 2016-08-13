<?php get_header(); ?>

<?php
/* Buscar topicos */
$args = array(
	'post_type' => array('biblioteca-faq'),
	'posts_per_page' => 999999,
);

if(!empty($_GET['q'])) {
	$args['meta_key'] = 'perguntas_respostas';
	$args['meta_value'] = $_GET['q'];
}
$topicos = new WP_Query($args);
?>

<div id="faq-list" class="green-espacamento container conteudo conteudo-archive">


    <article class="row">
      <div class="resumo col-md-10 col-md-offset-1">
        <p class="data">A Biblioteca</p>
        <h2>Perguntas frequentes</h2>
      </div>

		<div class="col-md-6 col-md-offset-1">

	        <div class="well" style="border: none; background: rgba(0, 0, 0, 0.05); box-shadow: none;">

	          <div class="input-group">
	            <input type="text" class="form-control search" name="q" placeholder="Buscar em Perguntas Frequentes">
	            <span class="input-group-btn">
	              <button type="submit" class="btn btn-warning" style="background: #ff8400;">Buscar</button>
	            </span>
	          </div>
	          
	        </div>

		</div>

    </article>

	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			
			<ul class="list">
				<?php while ( $topicos->have_posts() ) : $topicos->the_post();?>
						<li style="margin-bottom: 40px; margin-top: 20px;">

							<div class="row">
								
								<div class="col-xs-5">
									<h2 class="titulo"><?php echo get_the_title(); ?></h2>
								</div>

								<div class="col-xs-7">

									<?php while(have_rows('perguntas_respostas')) : the_row(); ?>
										<div>
											<a href="javascript:void(0);" class="pergunta"><?php echo get_sub_field('pergunta'); ?></a>

											<div class="resposta" style="display: none;">
												<p><?php echo get_sub_field('resposta'); ?></p>
											</div>
										</div>
									<?php endwhile; ?>
									
								</div>

							</div>

						</li>
				<?php endwhile; ?>
			</ul>	
		</div> <!-- .col -->

	</div> <!-- .row -->

</div>

<?php get_footer(); ?>