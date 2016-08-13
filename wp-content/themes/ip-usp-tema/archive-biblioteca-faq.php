<?php get_header(); ?>

<?php
/* Buscar topicos */
$args = array(
	'post_type' => array('biblioteca-faq'),
	'posts_per_page' => 999999
);
$topicos = new WP_Query($args);
$tmp = [];
?>

<?php while ( $topicos->have_posts() ) : $topicos->the_post();?>
	<?php 
		$tmp[] = [
			'titulo' => get_the_title(),
			'tema' => get_field('tema'),
			'ordem_de_apresentação' => get_field('ordem_de_apresentação'),
			'conteudo' => get_the_content()
		];
	 ?>
<?php endwhile; ?>

<div class="green-espacamento container conteudo conteudo-archive">

    <article class="row">
      <div class="resumo col-md-10 col-md-offset-1">
        <p class="data">A Biblioteca</p>
        <h2>Perguntas frequentes</h2>
      </div>

		<div class="col-md-6 col-md-offset-1">

	        <div class="well">
	          
	          <div class="input-group">
	            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Pesquisar">
	            <span class="input-group-btn">
	              <button type="button" class="btn btn-warning">Buscar</button>
	            </span>
	          </div>
	          
	        </div>
	        
		</div>

    </article>

	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			
			<ul>
				<?php while ( $topicos->have_posts() ) : $topicos->the_post();?>
						<li>
							<h2><?php echo get_the_title(); ?></h2>

							<?php while(have_rows('perguntas_respostas')) : the_row(); ?>
								<h4><?php echo get_sub_field('pergunta'); ?></h4>

								<p><?php echo get_sub_field('resposta'); ?></p>
							<?php endwhile; ?>
						</li>
				<?php endwhile; ?>
			</ul>	
		</div> <!-- .col -->

	</div> <!-- .row -->

</div>

<?php get_footer(); ?>