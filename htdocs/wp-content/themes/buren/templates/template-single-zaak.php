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
					<?php if (! empty($zaak->registerDate('j F Y'))) : ?>
						<tr>
							<th>Registratiedatum</th>
							<td><?php echo $zaak->registerDate('j F Y'); ?> </td>
							<td><a href="#">Bekijk originele aanvraag</a></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($zaak->startDate('j F Y'))) : ?>
						<tr>
							<th>Startdatum</th>
							<td><?php echo $zaak->startDate('j F Y'); ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($zaak->identificatie)) : ?>
						<tr>
							<th>Zaaknummer</th>
							<td><?php echo $zaak->identificatie; ?></td>
						</tr>
					<?php endif; ?>

					<?php if (! empty($zaak->statusExplanation())) : ?>
						<tr>
							<th>Status</th>
							<td><?php echo $zaak->statusExplanation(); ?></td>
						</tr>
					<?php endif; ?>
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
				<ul class="zaak-documents">
					<?php foreach ($zaak->informationObjects() as $document) : ?>
						<?php if (! empty($document->informatieobject->downloadUrl($zaak->getValue('identificatie', '')))) : ?>
							<li class="zaak-documents-item">
								<svg class="zaak-documents-item-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9l-7-7Z"/>
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 2v7h7"/>
								</svg>

								<a class="zaak-documents-item-link" href="<?= $document->informatieobject->downloadUrl($zaak->getValue('identificatie', '')); ?>">
									<span>
										<?= $document->informatieobject->fileName(); ?>
										<?php if ($document->informatieobject->sizeFormatted()): ?>
											<div class="zaak-documents-item-download-size">(<?= $document->informatieobject->sizeFormatted(); ?>)</div>
										<?php endif ?>
									</span>
									<div class="zaak-documents-item-download-button">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="20" height="20">
											<path fill="currentColor" fill-rule="evenodd" d="M2.5013 11.6665a.8333.8333 0 0 1 .8333.8333v3.3334a.8333.8333 0 0 0 .8334.8333h11.6666a.8334.8334 0 0 0 .8334-.8333v-3.3334a.8333.8333 0 0 1 1.6666 0v3.3334a2.5 2.5 0 0 1-2.5 2.5H4.168a2.4998 2.4998 0 0 1-2.5-2.5v-3.3334c0-.4602.373-.8333.8333-.8333Z" clip-rule="evenodd"/>
											<path fill="currentColor" fill-rule="evenodd" d="M5.244 7.744a.8333.8333 0 0 1 1.1786 0L10 11.3216l3.5774-3.5774a.8333.8333 0 0 1 1.1785 0 .8332.8332 0 0 1 0 1.1785l-4.1666 4.1667a.8335.8335 0 0 1-1.1786 0L5.2441 8.9226a.8333.8333 0 0 1 0-1.1785Z" clip-rule="evenodd"/>
											<path fill="currentColor" fill-rule="evenodd" d="M10.0013 1.6665a.8333.8333 0 0 1 .8333.8333v10a.8333.8333 0 1 1-1.6666 0v-10c0-.4602.373-.8333.8333-.8333Z" clip-rule="evenodd"/>
										</svg>
										Download
									</div>
								</a>
							</li>
						<?php endif ?>
					<?php endforeach; ?>
				</ul>
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
