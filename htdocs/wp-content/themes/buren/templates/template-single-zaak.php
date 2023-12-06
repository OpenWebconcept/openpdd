<?php declare(strict_types=1);

$zaak = get_query_var('zaak');

/**
 * Template name: Mijn Zaken Single
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
				<img src="<?php echo get_template_directory_uri() . "/assets/img/zaak-header.jpg"; ?>" alt="" class="zaak-header-image" />
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
			<div class="zaak-process">
				<h2>Status</h2>
				<?php if (empty($zaak->steps()) || $zaak->hasNoStatus()) : ?>
					<p>Momenteel is er geen status beschikbaar.</p>
				<?php else : ?>
					<ol class="zaak-process-steps">
						<?php foreach ($zaak->steps() as $step) : ?>
							<?php
                            if (! empty($zaak->statusHistory())) {
                                $statusUpdate = $zaak->statusHistory()->filter(function ($status) use ($step) {
                                    return $status->statustype->url === $step->url;
                                })->first();
                            }
                            $isPastIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M435.848 83.466L172.804 346.51l-96.652-96.652c-4.686-4.686-12.284-4.686-16.971 0l-28.284 28.284c-4.686 4.686-4.686 12.284 0 16.971l133.421 133.421c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-28.284-28.284c-4.686-4.686-12.284-4.686-16.97 0z"/></svg>';
						    ?>

							<li class="zaak-process-steps__step <?= $step->isEndStatus() ? 'zaak-process-steps__step--current' : ''; ?><?= ! $step->isEndStatus() ? 'zaak-process-steps__step--past' : ''; ?>" aria-current="">
								<span class="zaak-process-steps__step-marker">
									<?= ! $step->isEndStatus() ? $isPastIcon : $step->volgnummer; ?>
								</span>
								<span class="zaak-process-steps__step-heading-label">
									<?php echo $step->omschrijving ?>
									<?php if ($statusUpdate) : ?>
										<small>(<?= $statusUpdate->datumStatusGezet->format('d-m-Y'); ?>)</small>
									<?php endif; ?>
								</span>
								<?php if (false) : ?>
									<ol class="zaak-process-steps__substeps">
										<li class="zaak-process-steps__substep">
											<div class="zaak-process-steps__substep-marker">
											</div>
											<div class="zaak-process-steps__substep-heading-label">
												<?php echo $substep->data['omschrijving'] ?>
											</div>
										</li>
									</ol>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ol>
			</div>
			<?php if ($zaak->informationObjects() && $zaak->informationObjects()->count() > 0): ?>
				<div class="zaak-documents">
					<h3>Documenten</h3>
					<ul>
						<?php foreach ($zaak->informationObjects() as $document) : ?>
							<?php if (! empty($document->informatieobject->downloadUrl())) : ?>
								<li>
									<a href="<?= $document->informatieobject->downloadUrl(); ?>">
										<?= $document->informatieobject->fileName(); ?> <?php if ($document->informatieobject->sizeFormatted()): ?>(<?= $document->informatieobject->sizeFormatted(); ?>) <?php endif ?>
									</a>
								</li>
							<?php endif ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif ?>
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
