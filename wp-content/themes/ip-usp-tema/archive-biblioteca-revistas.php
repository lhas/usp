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
							<p class="categoria"><a href="#">A Biblioteca</a></p>
							<h1><a href="#">Revistas Eletrônicas</a></h1>

							<nav id="letras">
								<a href="#" class="atual">Todas</a>
								<?php foreach(range('A', 'Z') as $letra) { ?>
								<a href="#"><?php echo $letra; ?></a>
								<?php } ?>
							</nav> <!-- #letras -->

						</div>
					</div>
				</article>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				
					<div id="alfabeto">
						<div class="row">
							<?php
							$args = array( 'post_type' => 'biblioteca-revistas', 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
							$glossaryposts = get_posts( $args ); 
							?>
							<?php foreach( $glossaryposts as $post ) :	setup_postdata($post); ?>
							<div class="revista col-xs-6" data-letra="<?php $tmp = str_split(get_the_title()); echo $tmp[0]; ?>">
								<strong style="font-size: 16px;"><?php the_title(); ?></strong>
								<?php the_content(); ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div> <!-- #alfabeto -->

				</div>
			</div>

	</div>

<?php get_footer(); ?>