<?php declare(strict_types=1);

$zaak = get_query_var('zaak');

/**
 * Template name: Mijn Zaak
 */
get_template_part('mijn-zaken/header');

?>
    <main class="page-main page-main--mijn-zaken container" id="readspeaker">
        <aside class="page-main__aside">
            <?php get_template_part('templates/mijn-zaken/sidebar'); ?>
        </aside>
        <article class="page-main__content">
			<?php if ($zaak) : ?>
			<div class="zaak-header">
				<h1 class="zaak-header-title">Zaak: <?php echo $zaak->title(); ?></h1>
			</div>
			<div class="zaak-details">
				<h2>Details</h2>
				<table class="zaak-details-table">
					<tr>
						<th>Registratiedatum</th>
						<td><?php echo $zaak->registerDate('j F Y'); ?> </td>
						<td><a href="#">Bekijk originele aanvraag</a></td>
					</tr>
					<tr>
						<th>Startdatum</th>
						<td><?php echo $zaak->startDate('j F Y'); ?></td>
					</tr>
					<tr>
						<th>Zaaknummer</th>
						<td><?php echo $zaak->identificatie; ?></td>
					</tr>
					<tr>
						<th>Status</th>
						<td><?php echo $zaak->statusExplanation() ?: 'Onbekend'; ?></td>
					</tr>
				</table>
			</div>
			<?php else : ?>
				<div class="zaak-header">
					<h1 class="zaak-header-title">Er ging iets fout..</h1>
				</div>
				<p>Uw zaak kon niet gevonden worden.</p>
			<?php endif ?>
        </article>
    </main>
<?php

get_template_part('mijn-zaken/footer');
