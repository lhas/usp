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
$faq = [];

while ( $topicos->have_posts() ) : $topicos->the_post();
	$item = [
		'titulo' => get_the_title(),
		'subitens' => []
	];

	while(have_rows('perguntas_respostas')) : the_row();
		$item['subitens'][] = [
			'pergunta' => get_sub_field('pergunta'),
			'resposta' => get_sub_field('resposta')
		];
	endwhile;

	$faq[] = $item;

endwhile;
?>

<div id="faq-list" ng-app="usp" ng-init='faq = <?php echo json_encode($faq); ?>' class="green-espacamento container conteudo conteudo-archive">


    <article class="row">
      <div class="resumo col-md-10 col-md-offset-1">
        <p class="data">A Biblioteca</p>
        <h2>Perguntas frequentes</h2>
      </div>

		<div class="col-md-6 col-md-offset-1">

	        <div class="well" style="border: none; background: rgba(0, 0, 0, 0.05); box-shadow: none;">

	          <div class="input-group">
	            <input type="text" ng-model="search.$" class="form-control search" name="q" placeholder="Buscar em Perguntas Frequentes">
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

						<li ng-repeat="topico in faq | filter:search:strict" style="margin-bottom: 40px; margin-top: 20px;">

							<div class="row">
								
								<div class="col-xs-5">
									<h2 class="titulo">{{topico.titulo}}</h2>
								</div>

								<div class="col-xs-7">

										<div ng-repeat="resposta in topico.subitens | filter:search:strict">
											<a href="javascript:void(0);" class="pergunta">{{resposta.pergunta}}</a>

											<div class="resposta" style="display: none;" ng-bind-html="resposta.resposta | unsafe">
											</div>
										</div>
									
								</div>

							</div>

						</li>

			</ul>
			
			
			<div class="alert alert-danger" ng-show="(faq | filter:search).length == 0">
				<strong>Ops!</strong> Não foi encontrada nenhuma informação no FAQ referente aos termos buscados.
			</div>
			
		</div> <!-- .col -->

	</div> <!-- .row -->

</div>

<?php get_footer(); ?>