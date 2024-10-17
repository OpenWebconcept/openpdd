<?php declare(strict_types=1);

$taak = get_query_var('taak');
$formID = get_query_var('formID');

/**
 * Template name: Mijn Taken Single
 */
get_template_part('templates/mijn-zaken/header');

?>
    <main class="container page-main page-main--mijn-zaken" id="readspeaker">
        <aside class="page-main__aside">
            <?php get_template_part('templates/mijn-zaken/sidebar'); ?>
        </aside>
        <article class="page-main__content">
			<?php if ($taak) : ?>
			<div class="zaak-header">
				<img src="<?php echo get_template_directory_uri() . "/assets/img/zaak-header.jpg"; ?>" alt="" class="zaak-header-image" />
				<h1 class="zaak-header-title"><?php echo $taak->title(); ?></h1>
			</div>
			<div class="zaak-details">
				<h2>Details</h2>
				<table class="zaak-details-table">
					<?php if (! empty($taak->identification())) : ?>
						<tr>
							<th>Identificatie</th>
							<td><?php echo $taak->identification(); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($taak->expirationDate('j F Y'))) : ?>
						<tr>
							<th>Verloopdatum</th>
							<td><?php echo $taak->expirationDate('j F Y'); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($taak->dueDate())) : ?>
						<tr>
							<th>Vervaldatum</th>
							<td><?php echo $taak->dueDate(); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($taak->clarification())) : ?>
						<tr>
							<th>Toelichting</th>
							<td><?php echo $taak->clarification(); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($taak->informationObjectURL())) : ?>
						<tr>
							<th>Informatieobject</th>
							<td><?php echo $taak->informationObjectURL(); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($taak->zaaktypeObjectURL())) : ?>
						<tr>
							<th>Zaaktype</th>
							<td><?php echo $taak->zaaktypeObjectURL(); ?></td>
						</tr>
					<?php endif; ?>
				</table>
			</div>

			<?php if ($formID) : ?>
				<div class="pt-4 pl-2">
					<h2>Actie</h2>
					<?php echo gravity_form($formID, false, false, false, null, false, false, true); ?>
				</div>
			<?php endif; ?>

			<?php else : ?>
				<div class="zaak-header">
					<h1 class="zaak-header-title">Er ging iets fout..</h1>
				</div>
				<p>Uw Taak kon niet gevonden worden.</p>
			<?php endif ?>
        </article>
    </main>
<?php

get_template_part('templates/mijn-zaken/footer');
