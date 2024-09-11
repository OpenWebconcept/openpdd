<?php
$eherkenning_is_active = $args['eherkenning_is_active'] ?? false;
$eherkenning_provider = $args['eherkenning_provider'] ?? 'owc-signicat-openid';
?>

<?php if ($eherkenning_is_active): ?>
	<div class="col-md-6">
		<div class="h-100 border p-3 p-md-4">
			<h3>Inloggen als organisatie</h3>
			<div class="d-flex pb-4 mb-4 border-bottom">
				<svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 96" width="80px" height="80px"><g id="b"><path d="m159.94,92.97c0,.49.07,1-.02,1.48-.1.61.62,1.77-.98,1.51-.81-.13-1.65-.02-2.48-.02H3.53c-.83,0-1.66-.07-2.48.02-.87.1-1.13-.15-1.01-1.01.09-.65.02-1.32.02-1.97C.05,62.66.07,32.34,0,2.03,0,.31.32,0,2.04,0c43.86.06,87.72.05,131.59.05,8.44,0,16.88.02,25.32-.03.86,0,1.19.16.99,1.01-4.3,0-8.61-.03-12.91.01-2.15.02-2.94.76-2.96,2.83-.06,4.12-.02,8.24-.02,12.35,0,6.59.02,13.18,0,19.77-.02,3.18-.41,3.52-3.71,3.58-.99.02-1.99,0-2.98,0-8.27,0-16.55.09-24.82-.08-1.73-.04-2.13.69-2.64,1.93-1.22,2.95-2.58,5.85-3.82,8.8-.35.84-.56,1.76-.73,2.66-.17.92.05,1.59,1.23,1.53,1.16-.06,2.32-.01,3.47-.01,10.1,0,20.19,0,30.29,0,3.71,0,3.72.01,3.72,3.5,0,10.38-.01,20.76.02,31.13,0,1.27-.23,3.11.47,3.66,1.1.87,2.89.9,4.4,1.22.47.1.99-.03,1.49.02,3.25.35,6.37-.47,9.52-1ZM1.04,47.55c0,7.41-.02,14.82,0,22.23.01,4.8,1.78,9.23,4.38,12.97,2.41,3.48,5.75,6.44,9.86,8.27,2.63,1.17,9.02,2.93,11.68,2.94,4.96,0,9.93,0,14.89,0,9.43,0,18.86.02,28.29-.01,2.78,0,3.36-.61,3.39-3.4.04-3.29.02-6.59,0-9.88,0-1.98-.92-3.2-2.81-3.48-1.13-.17-2.31-.03-3.47-.03-13.57,0-27.13.01-40.7-.02-1.25,0-2.55-.17-3.73-.57-4.42-1.51-5.67-5.56-5.77-9.31-.34-13.17-.21-26.35-.06-39.52.02-2.07.64-4.42,1.77-6.13,2.23-3.39,5.69-4.81,9.87-4.78,11.08.1,22.17.03,33.25.03,2.98,0,5.96.05,8.93-.02,1.77-.04,2.66-.88,2.69-2.6.06-3.62.09-7.25-.02-10.87-.04-1.39-.88-2.36-2.47-2.33-.5,0-.99,0-1.49,0-15.22,0-30.44.02-45.66-.02-1.48,0-2.72.58-4.07.95C9.04,4.94.8,15.6,1.02,26.8c.14,6.91.03,13.83.03,20.75Zm102.29,26.11c0-2.46.04-4.92,0-7.38-.07-3.89-.21-7.79-.32-11.68-3.93-.06-7.87-.11-11.8-.17-.33,0-.66-.02-.99,0-1.99.13-2.76.89-2.76,3.02-.03,11.32,0,22.65-.02,33.97,0,.88.17,1.23,1.18,1.64,2.73,1.09,10.3,1.06,13.14.14,1.5-.49,1.6-1.11,1.59-2.31-.03-5.74-.01-11.49-.01-17.23Zm0-53.39c0-2.46.04-4.93,0-7.39-.08-3.9-.22-7.79-.33-11.68-4.1-.05-8.21-.15-12.31-.14-2.49,0-3.21.69-3.22,3.05-.03,10.84-.03,21.68,0,32.52,0,2.13.76,2.92,2.83,2.95,3.79.06,7.59-.02,11.38.04,1.24.02,1.71-.28,1.69-1.61-.07-5.91-.03-11.82-.03-17.74Zm-55.08,19.33h-12.37c-2.14,0-4.29.06-6.43-.02-1.39-.06-2.45.78-2.5,1.78-.16,3.58-.15,7.2.22,10.75.08.77.47,2.51,2.77,2.44,10.06-.28,20.12-.18,30.19-.06,1.73.02,2.78-.67,3.71-1.81.58-.7,1.07-1.53,1.4-2.37,1.15-2.97,3.26-5.59,3.35-8.97.03-1.11-.05-1.79-1.53-1.77-6.27.08-12.54.04-18.81.04Z" fill="#fcfcfd" stroke-width="0"/><path d="m159.94,92.97c-3.15.53-6.27,1.35-9.52,1-.49-.05-1.01.08-1.49-.02-1.51-.33-3.3-.35-4.4-1.22-.7-.55-.46-2.4-.47-3.66-.03-10.38-.01-20.76-.02-31.13,0-3.49-.01-3.5-3.72-3.5-10.1,0-20.19,0-30.29,0-1.16,0-2.32-.05-3.47.01-1.18.06-1.41-.61-1.23-1.53.17-.9.37-1.82.73-2.66,1.24-2.95,2.6-5.85,3.82-8.8.51-1.24.91-1.96,2.64-1.93,8.27.17,16.55.08,24.82.08.99,0,1.99.02,2.98,0,3.3-.06,3.7-.41,3.71-3.58.03-6.59,0-13.18,0-19.77,0-4.12-.04-8.24.02-12.35.03-2.07.82-2.81,2.96-2.83,4.3-.04,8.61-.01,12.91-.01v91.94Z" fill="#f30275" stroke-width="0"/><path d="m1.04,47.55c0-6.92.11-13.84-.03-20.75C.8,15.6,9.04,4.94,19.81,1.97c1.36-.37,2.59-.96,4.07-.95,15.22.04,30.44.02,45.66.02.5,0,.99,0,1.49,0,1.59-.03,2.43.94,2.47,2.33.11,3.62.08,7.25.02,10.87-.03,1.72-.91,2.57-2.69,2.6-2.98.07-5.96.02-8.93.02-11.08,0-22.17.06-33.25-.03-4.18-.04-7.64,1.38-9.87,4.78-1.13,1.71-1.74,4.06-1.77,6.13-.15,13.17-.29,26.35.06,39.52.1,3.76,1.34,7.8,5.77,9.31,1.17.4,2.48.57,3.73.57,13.57.04,27.13.02,40.7.02,1.16,0,2.34-.14,3.47.03,1.89.28,2.8,1.49,2.81,3.48.01,3.29.03,6.59,0,9.88-.03,2.79-.6,3.4-3.39,3.4-9.43.03-18.86.01-28.29.01-4.96,0-9.93,0-14.89,0-2.66,0-9.05-1.77-11.68-2.94-4.11-1.83-7.44-4.79-9.86-8.27-2.6-3.74-4.36-8.18-4.38-12.97-.02-7.41,0-14.82,0-22.23Z" fill="#054080" stroke-width="0"/><path d="m103.33,73.66c0,5.74-.02,11.49.01,17.23,0,1.2-.09,1.82-1.59,2.31-2.84.92-10.41.95-13.14-.14-1.01-.4-1.18-.75-1.18-1.64.01-11.32,0-22.65.02-33.97,0-2.13.77-2.89,2.76-3.02.33-.02.66,0,.99,0,3.93.06,7.87.11,11.8.17.11,3.89.24,7.79.32,11.68.05,2.46,0,4.92,0,7.38Z" fill="#f30275" stroke-width="0"/><path d="m103.33,20.27c0,5.91-.04,11.83.03,17.74.02,1.34-.46,1.64-1.69,1.61-3.79-.07-7.59.02-11.38-.04-2.06-.03-2.82-.82-2.83-2.95-.03-10.84-.03-21.68,0-32.52,0-2.36.73-3.04,3.22-3.05,4.1-.01,8.21.08,12.31.14.11,3.89.25,7.79.33,11.68.05,2.46,0,4.93,0,7.39Z" fill="#f30275" stroke-width="0"/><path d="m48.25,39.59c6.27,0,12.54.05,18.81-.04,1.48-.02,1.56.66,1.53,1.77-.09,3.38-2.19,6-3.35,8.97-.33.85-.82,1.67-1.4,2.37-.93,1.14-1.98,1.83-3.71,1.81-10.06-.13-20.13-.22-30.19.06-2.31.06-2.69-1.68-2.77-2.44-.38-3.56-.38-7.17-.22-10.75.04-.99,1.11-1.83,2.5-1.78,2.14.09,4.29.02,6.43.02h12.37Z" fill="#054080" stroke-width="0"/></g></svg>
				<div class="pl-4">
					<div class="muted mb-1">Met eHerkenning</div>
					<?php if('owc-signicat-openid' === $eherkenning_provider && WP_Block_Type_Registry::get_instance()->is_registered('owc-signicat-openid/openid')) : ?>
						<?php echo do_blocks('<!-- wp:owc-signicat-openid/openid {"redirectUrl":"/overzicht","idp":"eherkenning"} /-->'); ?>
					<?php else : ?>
						<a href="<?php echo home_url('inloggen-eherkenning') ?>" class="wp-block-button__link">
							Inloggen
						</a>
					<?php endif; ?>
				</div>
			</div>

			<div>Geen eHerkenning? <a href="https://eherkenning.nl/nl/eherkenning-aanvragen" class="d-inline-block pl-1" target="_blank">Vraag eHerkenning aan <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i><span class="sr-only">, opent in een nieuw tabblad</span></a></div>
		</div>
	</div>
<?php endif; ?>