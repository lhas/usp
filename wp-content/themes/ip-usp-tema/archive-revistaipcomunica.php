<?php
/**
 * The template for displaying Archive Results pages.
 *
 * @package unite
 */

get_header(); ?>
	
	<div class="green-espacamento container conteudo conteudo-archive">
	
			<div>
				<article id="post-">
					<div class="row header">
						<div class="col-md-10 col-md-offset-1 ">
							<p class="categoria"><a href="#">IP Comunica</a></p>
							<h1><a href="#">Revistas psico.USP</a></h1>

						</div>
					</div>
				</article>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				
						<div class="row">
							<?php
							$args = array( 'post_type' => 'revistaipcomunica', 'posts_per_page' => -1 );
							$glossaryposts = get_posts( $args ); 
							?>
							<?php foreach( $glossaryposts as $post ) :	setup_postdata($post); ?>
							<div class="revista col-xs-3">

                <div class="imagem imgLiquid imgLiquidFill" style="display: inline-block; width: 100%; height: 250px; background: #CCC;">
                  <?php the_post_thumbnail('medium'); ?>
                </div>
								<strong style="font-size: 16px;"><?php the_title(); ?></strong>
								<p>Edição: <strong><?php the_field('ano_e_numero'); ?></strong></p>

                <div class="clearfix"></div>
                <a href="<?php the_permalink(); ?>" class="btn btn-default" style="background: orange; margin-top: 10px; border: none; color: #FFF; font-weight: bold;">Leia a revista</a>
							</div>
							<?php endforeach; ?>
						</div>

				</div>
			</div>

	</div>

<?php get_footer(); ?>