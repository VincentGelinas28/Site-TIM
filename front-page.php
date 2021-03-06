<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
	


		<?php if ( have_posts() ) : ?>

			<header class="page-header">

			<section id="annonce"></section>

				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			//global $tProprieté;
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);
				//print_r($tPropriété);
				if ($tPropriété['typeCours'] != $precedent): 
					if ("XXXXXX" != $precedent)	: ?>
						</section>
						<?php if (in_array($precedent, ['Web', 'Jeu', 'Spécifique','Image 2d/3d'])) : ?>
							<section class="ctrl-carrousel">
								<?php echo $chaine_bouton_radio;
								$chaine_bouton_radio = '';
								 ?>		
							</section>
						<?php endif; ?>
					<?php endif; ?>	
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					<section <?php echo (in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique','Image 2d/3d']) ? 'class="carrousel-2"':'class="bloc"'); ?>>
				<?php endif ?>	

				<?php if (in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique','Image 2d/3d']) ) :
				        get_the_post_thumbnail('thumbnail'); 
						get_template_part( 'template-parts/content', 'cours-carrousel' ); 
						$chaine_bouton_radio .= '<input class="rad-carrousel"  type="radio" name="rad-'.$tPropriété['typeCours'].'">';
				else :		
						get_template_part( 'template-parts/content', 'cours-article' ); 
				endif;	
				$precedent = $tPropriété['typeCours'];
			endwhile;?>
			</section> <!-- fin section cours -->
			<!-- --------------------Mes projet----------------- -->
			<section class="mes_projet">
				<h2>Mes Projets</h2>
			<div>
				
			    <div><img src="http://localhost/4w4-3/wp-content/uploads/2021/05/arnold_tp.jpg" alt=""></div>
				<div><img src="http://localhost/4w4-3/wp-content/uploads/2021/05/exercice-1.jpg" alt=""></div>
				<div><img src="http://localhost/4w4-3/wp-content/uploads/2021/05/Gelinas_Vincent_tp_IMG.jpg" alt=""></div>
				<div><img src="http://localhost/4w4-3/wp-content/uploads/2021/05/lilbo.jpg" alt=""></div>
				<div><img src="http://localhost/4w4-3/wp-content/uploads/2021/05/gelinas_Vincent_moto.jpg" alt=""></div>
			</div>
			</section>

			<?PHP if (current_user_can('administrator')) : ?>
			<!-- formulaire d'ajout d'un acrticle de categorie nouvelles -->
			<sction class="admin-rapid">
				<section>
			    <h3>Ajouter une Annonce</h3>
				<input type="text" name="title" placeholder="Titre">
				<textarea name="content" placeholder="Contenue"></textarea>
				<button id='bout-rapide'>Créer une Annonce</button>
               </section>
			</sction>

			<sction class="admin-rapid_nouvelle">
				<section>
			    <h3>Ajouter une Nouvelle</h3>
				<input type="text" name="title" placeholder="Titre">
				<textarea name="content" placeholder="Contenue"></textarea>
				<button id='bout-rapide_nouvelle'>Créer une Nouvelle</button>
               </section>
			</sction>
            <?php endif?>

			<section class="nouvelles">
			    
				<section></section>	
						
			</section>



		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{
	

	$tPropriété['titre'] = get_the_title(); 
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'],-4,3);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4,1);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}


