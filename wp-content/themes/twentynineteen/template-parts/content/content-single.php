<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
        <?php
        $ClientData = new stdClass();
        $ClientData->ClientInfo = new stdClass();
        $ClientData->ClientInfo->Age = 33;
        $ClientData->ClientInfo->Gender = 'Male';
        $ClientData->ClientInfo->AnnualIncome = 55000;
        $ClientData->ClientInfo->Name = 'Sarwar';
        ?>
        <p>What goal(s) are you planning for?</p>
        <div id="client_personal">
            <?php
            if( $ClientData->ClientInfo->Gender == "Male" ) {
                $selectedMaleHtml = 'selected="selected"';
                $selectedFeMaleHtml = '';
            }
            if( $ClientData->ClientInfo->Gender == "Female" ) {
                $selectedMaleHtml = '';
                $selectedFeMaleHtml = 'selected="selected"';
            }
            echo sprintf(
                __( 'I am a %1$s year old %2$s, and my annual income is %3$s %4$s', 'twentynineteen'),
                '<input class="age_field" type="text" name="Age" value="' . $ClientData->ClientInfo->Age . '" id="Age">',
                '<select name="Gender" id="Gender"><option value="Male"' . $selectedMaleHtml . '>' . __('Male', 'twentynineteen') . '</option><option value="Female"' . $selectedFeMaleHtml . '>' . __('Female', 'twentynineteen') . '</option></select>',
                '<input class="inv_dollar" type="text" name="AnnualIncome" value=" ' . $ClientData->ClientInfo->AnnualIncome . '" id="AnnualIncome">',
                '<input type="hidden" name="Name" value=" ' . $ClientData->ClientInfo->Name . 'id="Name">'
            );
            ?>
        </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
	<?php get_template_part( 'template-parts/post/author', 'bio' ); ?>
	<?php endif; ?>

</article><!-- #post-${ID} -->
