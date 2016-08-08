<?php 
/**
 * @package unite
 * Template Name: FAQ da Biblioteca
 */
 get_header();
?>

	<div class="container conteudo">

    <article class="row">
      <div class="resumo col-md-12">
        <p class="data">A Biblioteca</p>
        <h2>Perguntas frequentes</h2>

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

    <?php
    $args = array (
    'posts_per_page'         => '9999',
    'post_type' 			 => 'biblioteca-faq'
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <article class="row">
      <div class="resumo col-md-12">
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
  
  </div> <!-- .container -->

<?php get_footer(); ?>