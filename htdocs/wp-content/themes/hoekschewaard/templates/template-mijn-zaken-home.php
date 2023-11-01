<?php declare(strict_types=1);
/**
 * Template name: Mijn Zaken Home
 */
get_template_part('mijn-zaken/header');

?>
    <main class="page-main page-main--mijn-zaken-main" id="readspeaker">
		<div class="container | mb-5 pb-5">
			<h1 class="mb-4"><?php the_title(); ?></h1>

			<h2 class="mb-4">Inloggen</h2>

			<div class="row">
				<div class="col-md-6 | mb-3 mb-md-0">
					<div class="h-100 border p-3 p-md-4">
						<h3>Inloggen als persoon</h3>
						<div class="d-flex pb-4 mb-4 border-bottom">
							<svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 141.73 141.73" width="80px" height="80px"><path d="m20,0h101.74c11.04,0,20,8.96,20,20v101.74c0,11.04-8.96,20-20,20H20c-11.04,0-20-8.96-20-20V20C0,8.96,8.96,0,20,0Z" stroke-width="0"/><path d="m15.75,108.25v-33.49h9.6c11.33,0,17.61,5.67,17.61,15.78,0,12.1-6.84,17.72-17.82,17.72h-9.39Zm6.13-5.05h3.52c6.74,0,11.13-3.62,11.13-12.36,0-7.25-4.39-11.03-11.59-11.03h-3.06v23.38Z" fill="#fff" stroke-width="0"/><path d="m51.24,72.51c2.2,0,3.42,1.38,3.42,3.32,0,1.79-1.22,3.27-3.42,3.27s-3.37-1.33-3.37-3.27c0-1.79,1.17-3.32,3.37-3.32Zm2.91,35.74h-5.77v-25.12l5.77-.26v25.37Z" fill="#fff" stroke-width="0"/><path d="m68.13,103.34h6.02c5.41,0,7.71,2.14,7.71,6.23,0,4.8-3.98,8.68-13.17,8.68-7.2,0-10.52-2.55-10.52-6.48,0-2.4,1.33-4.39,3.83-5.46v-.15c-1.17-.61-1.99-1.89-1.99-3.37,0-1.58.97-3.06,2.81-3.78v-.15c-2.3-1.28-3.62-3.42-3.62-6.69,0-6.13,4.14-9.45,10.52-9.45,1.38,0,2.6.15,3.88.51h8.17v3.83h-3.88v.15c1.07.82,1.99,2.55,1.99,4.75,0,5.57-3.78,8.48-10.72,8.48-1.12,0-2.2-.15-3.17-.41-.66.36-1.07.97-1.07,1.58,0,1.12.87,1.74,3.22,1.74Zm1.07,10.62c5.51,0,7.51-1.38,7.51-3.37,0-1.48-.92-2.3-3.42-2.35l-8.37-.25c-.97.66-1.38,1.48-1.38,2.65,0,1.99,1.74,3.32,5.67,3.32Zm5.31-22.46c0-3.06-1.69-4.7-4.9-4.7-2.86,0-4.9,1.63-4.9,5.05s1.84,4.65,4.8,4.65c3.17,0,5-1.48,5-5Z" fill="#fff" stroke-width="0"/><path d="m88.56,72.51c2.2,0,3.42,1.38,3.42,3.32,0,1.79-1.22,3.27-3.42,3.27s-3.37-1.33-3.37-3.27c0-1.79,1.17-3.32,3.37-3.32Zm2.91,35.74h-5.77v-25.12l5.77-.26v25.37Z" fill="#e17000" stroke-width="0"/><path d="m98.77,108.25v-33.49h9.6c11.34,0,17.62,5.67,17.62,15.78,0,12.1-6.84,17.72-17.82,17.72h-9.39Zm6.13-5.05h3.52c6.74,0,11.13-3.62,11.13-12.36,0-7.25-4.39-11.03-11.59-11.03h-3.06v23.38Z" fill="#e17000" stroke-width="0"/></svg>
							<div class="pl-4">
								<div class="muted mb-2">Met DigiD</div>
								<a href="/inloggen" class="wp-block-button__link d-inline-block py-2">
									Inloggen
									<i class="fa-solid fa-arrow-right pl-1"></i>
									<span class="sr-only">, opent in een nieuw tabblad</span>
								</a>
							</div>
						</div>

						<div>Geen DigiD?
							<a href="https://www.digid.nl/aanvragen-en-activeren/digid-aanvragen/" class="d-inline-block pl-1" target="_blank">Vraag DigiD aan <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i><span class="sr-only">, opent in een nieuw tabblad</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="h-100 border p-3 p-md-4">
						<h3>Inloggen als organisatie</h3>
						<div class="d-flex pb-4 mb-4 border-bottom">
							<svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 96" width="80px" height="80px"><g id="b"><path d="m159.94,92.97c0,.49.07,1-.02,1.48-.1.61.62,1.77-.98,1.51-.81-.13-1.65-.02-2.48-.02H3.53c-.83,0-1.66-.07-2.48.02-.87.1-1.13-.15-1.01-1.01.09-.65.02-1.32.02-1.97C.05,62.66.07,32.34,0,2.03,0,.31.32,0,2.04,0c43.86.06,87.72.05,131.59.05,8.44,0,16.88.02,25.32-.03.86,0,1.19.16.99,1.01-4.3,0-8.61-.03-12.91.01-2.15.02-2.94.76-2.96,2.83-.06,4.12-.02,8.24-.02,12.35,0,6.59.02,13.18,0,19.77-.02,3.18-.41,3.52-3.71,3.58-.99.02-1.99,0-2.98,0-8.27,0-16.55.09-24.82-.08-1.73-.04-2.13.69-2.64,1.93-1.22,2.95-2.58,5.85-3.82,8.8-.35.84-.56,1.76-.73,2.66-.17.92.05,1.59,1.23,1.53,1.16-.06,2.32-.01,3.47-.01,10.1,0,20.19,0,30.29,0,3.71,0,3.72.01,3.72,3.5,0,10.38-.01,20.76.02,31.13,0,1.27-.23,3.11.47,3.66,1.1.87,2.89.9,4.4,1.22.47.1.99-.03,1.49.02,3.25.35,6.37-.47,9.52-1ZM1.04,47.55c0,7.41-.02,14.82,0,22.23.01,4.8,1.78,9.23,4.38,12.97,2.41,3.48,5.75,6.44,9.86,8.27,2.63,1.17,9.02,2.93,11.68,2.94,4.96,0,9.93,0,14.89,0,9.43,0,18.86.02,28.29-.01,2.78,0,3.36-.61,3.39-3.4.04-3.29.02-6.59,0-9.88,0-1.98-.92-3.2-2.81-3.48-1.13-.17-2.31-.03-3.47-.03-13.57,0-27.13.01-40.7-.02-1.25,0-2.55-.17-3.73-.57-4.42-1.51-5.67-5.56-5.77-9.31-.34-13.17-.21-26.35-.06-39.52.02-2.07.64-4.42,1.77-6.13,2.23-3.39,5.69-4.81,9.87-4.78,11.08.1,22.17.03,33.25.03,2.98,0,5.96.05,8.93-.02,1.77-.04,2.66-.88,2.69-2.6.06-3.62.09-7.25-.02-10.87-.04-1.39-.88-2.36-2.47-2.33-.5,0-.99,0-1.49,0-15.22,0-30.44.02-45.66-.02-1.48,0-2.72.58-4.07.95C9.04,4.94.8,15.6,1.02,26.8c.14,6.91.03,13.83.03,20.75Zm102.29,26.11c0-2.46.04-4.92,0-7.38-.07-3.89-.21-7.79-.32-11.68-3.93-.06-7.87-.11-11.8-.17-.33,0-.66-.02-.99,0-1.99.13-2.76.89-2.76,3.02-.03,11.32,0,22.65-.02,33.97,0,.88.17,1.23,1.18,1.64,2.73,1.09,10.3,1.06,13.14.14,1.5-.49,1.6-1.11,1.59-2.31-.03-5.74-.01-11.49-.01-17.23Zm0-53.39c0-2.46.04-4.93,0-7.39-.08-3.9-.22-7.79-.33-11.68-4.1-.05-8.21-.15-12.31-.14-2.49,0-3.21.69-3.22,3.05-.03,10.84-.03,21.68,0,32.52,0,2.13.76,2.92,2.83,2.95,3.79.06,7.59-.02,11.38.04,1.24.02,1.71-.28,1.69-1.61-.07-5.91-.03-11.82-.03-17.74Zm-55.08,19.33h-12.37c-2.14,0-4.29.06-6.43-.02-1.39-.06-2.45.78-2.5,1.78-.16,3.58-.15,7.2.22,10.75.08.77.47,2.51,2.77,2.44,10.06-.28,20.12-.18,30.19-.06,1.73.02,2.78-.67,3.71-1.81.58-.7,1.07-1.53,1.4-2.37,1.15-2.97,3.26-5.59,3.35-8.97.03-1.11-.05-1.79-1.53-1.77-6.27.08-12.54.04-18.81.04Z" fill="#fcfcfd" stroke-width="0"/><path d="m159.94,92.97c-3.15.53-6.27,1.35-9.52,1-.49-.05-1.01.08-1.49-.02-1.51-.33-3.3-.35-4.4-1.22-.7-.55-.46-2.4-.47-3.66-.03-10.38-.01-20.76-.02-31.13,0-3.49-.01-3.5-3.72-3.5-10.1,0-20.19,0-30.29,0-1.16,0-2.32-.05-3.47.01-1.18.06-1.41-.61-1.23-1.53.17-.9.37-1.82.73-2.66,1.24-2.95,2.6-5.85,3.82-8.8.51-1.24.91-1.96,2.64-1.93,8.27.17,16.55.08,24.82.08.99,0,1.99.02,2.98,0,3.3-.06,3.7-.41,3.71-3.58.03-6.59,0-13.18,0-19.77,0-4.12-.04-8.24.02-12.35.03-2.07.82-2.81,2.96-2.83,4.3-.04,8.61-.01,12.91-.01v91.94Z" fill="#f30275" stroke-width="0"/><path d="m1.04,47.55c0-6.92.11-13.84-.03-20.75C.8,15.6,9.04,4.94,19.81,1.97c1.36-.37,2.59-.96,4.07-.95,15.22.04,30.44.02,45.66.02.5,0,.99,0,1.49,0,1.59-.03,2.43.94,2.47,2.33.11,3.62.08,7.25.02,10.87-.03,1.72-.91,2.57-2.69,2.6-2.98.07-5.96.02-8.93.02-11.08,0-22.17.06-33.25-.03-4.18-.04-7.64,1.38-9.87,4.78-1.13,1.71-1.74,4.06-1.77,6.13-.15,13.17-.29,26.35.06,39.52.1,3.76,1.34,7.8,5.77,9.31,1.17.4,2.48.57,3.73.57,13.57.04,27.13.02,40.7.02,1.16,0,2.34-.14,3.47.03,1.89.28,2.8,1.49,2.81,3.48.01,3.29.03,6.59,0,9.88-.03,2.79-.6,3.4-3.39,3.4-9.43.03-18.86.01-28.29.01-4.96,0-9.93,0-14.89,0-2.66,0-9.05-1.77-11.68-2.94-4.11-1.83-7.44-4.79-9.86-8.27-2.6-3.74-4.36-8.18-4.38-12.97-.02-7.41,0-14.82,0-22.23Z" fill="#054080" stroke-width="0"/><path d="m103.33,73.66c0,5.74-.02,11.49.01,17.23,0,1.2-.09,1.82-1.59,2.31-2.84.92-10.41.95-13.14-.14-1.01-.4-1.18-.75-1.18-1.64.01-11.32,0-22.65.02-33.97,0-2.13.77-2.89,2.76-3.02.33-.02.66,0,.99,0,3.93.06,7.87.11,11.8.17.11,3.89.24,7.79.32,11.68.05,2.46,0,4.92,0,7.38Z" fill="#f30275" stroke-width="0"/><path d="m103.33,20.27c0,5.91-.04,11.83.03,17.74.02,1.34-.46,1.64-1.69,1.61-3.79-.07-7.59.02-11.38-.04-2.06-.03-2.82-.82-2.83-2.95-.03-10.84-.03-21.68,0-32.52,0-2.36.73-3.04,3.22-3.05,4.1-.01,8.21.08,12.31.14.11,3.89.25,7.79.33,11.68.05,2.46,0,4.93,0,7.39Z" fill="#f30275" stroke-width="0"/><path d="m48.25,39.59c6.27,0,12.54.05,18.81-.04,1.48-.02,1.56.66,1.53,1.77-.09,3.38-2.19,6-3.35,8.97-.33.85-.82,1.67-1.4,2.37-.93,1.14-1.98,1.83-3.71,1.81-10.06-.13-20.13-.22-30.19.06-2.31.06-2.69-1.68-2.77-2.44-.38-3.56-.38-7.17-.22-10.75.04-.99,1.11-1.83,2.5-1.78,2.14.09,4.29.02,6.43.02h12.37Z" fill="#054080" stroke-width="0"/></g></svg>
							<div class="pl-4">
								<div class="muted mb-2">Met eHerkenning</div>
								<a href="/inloggen-eherkenning" class="wp-block-button__link d-inline-block py-2">
									Inloggen
									<i class="fa-solid fa-arrow-right pl-1"></i>
									<span class="sr-only">, opent in een nieuw tabblad</span>
								</a>
							</div>
						</div>

						<div>Geen eHerkenning? <a href="https://eherkenning.nl/nl/eherkenning-aanvragen" class="d-inline-block pl-1" target="_blank">Vraag eHerkenning aan <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i><span class="sr-only">, opent in een nieuw tabblad</span></a></div>
					</div>
				</div>

				<div class="col-12 mt-3">
					<div class="border p-3 p-md-4">
						<div class="d-flex align-items-center">
							<svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 301.61 301.01" width="30px"><path d="m235.04,25.46c-1.91.02-3.27,1.44-3.23,3.39.04,1.78,1.58,3.28,3.33,3.23,1.76-.05,3.36-1.71,3.31-3.44-.06-1.75-1.6-3.2-3.4-3.18Zm-79.77,272.23c.02-1.9-1.3-3.28-3.18-3.32-1.88-.04-3.37,1.38-3.42,3.26-.05,1.72,1.61,3.39,3.37,3.38,1.73,0,3.22-1.53,3.24-3.32Zm-35.95-24.73c.02-1.89-1.33-3.29-3.19-3.31-1.9-.02-3.28,1.3-3.33,3.17-.04,1.88,1.42,3.42,3.25,3.43,1.78,0,3.25-1.48,3.27-3.29Z" fill="#fefefe" stroke-width="0"/><path d="m149.58,226.89c-42.37.08-77.56-34.46-77.05-77.97.49-41.74,34.37-75.96,77.09-76.03,42.56-.07,77.16,34.57,77.06,77.15-.09,42.67-34.75,76.9-77.1,76.84Zm11.43-82.17c0-2.05.04-4.01,0-5.96-.13-5.59-4.28-10.25-9.61-10.84-5.8-.64-10.85,2.85-12.18,8.47-.56,2.4-.19,4.86-.24,7.29-.01.73-.12,1.11-.96,1.29-2.08.46-3.36,2.1-3.36,4.23-.02,6.39-.03,12.78,0,19.18.01,2.46,1.88,4.34,4.35,4.35,7.35.04,14.7.04,22.05,0,2.53-.01,4.33-1.92,4.34-4.46.01-6.35,0-12.7,0-19.06,0-.6-.08-1.18-.32-1.75-.74-1.74-2.18-2.45-4.06-2.76Zm-44.7,49.22c-.68,0-1.36.01-2.04,0-.69-.02-1.28.14-1.5.89-.21.71.23,1.12.72,1.49,1.1.85,2.18,1.74,3.33,2.54.64.45.74.91.51,1.61-.45,1.32-.84,2.66-1.26,3.99-.21.67-.39,1.34.31,1.83.72.51,1.28.05,1.83-.36,1.08-.82,2.18-1.61,3.23-2.47.5-.41.85-.4,1.34,0,1.08.88,2.22,1.69,3.32,2.54.53.41,1.07.75,1.72.27.63-.47.55-1.1.35-1.73-.42-1.37-.83-2.75-1.3-4.1-.23-.67-.13-1.09.47-1.51,1.2-.85,2.35-1.78,3.5-2.7.46-.36.83-.82.59-1.44-.24-.62-.74-.88-1.42-.86-1.28.03-2.56-.06-3.83.03-.96.07-1.34-.36-1.58-1.2-.4-1.38-.89-2.72-1.34-4.09-.2-.6-.61-.98-1.23-.94-.55.04-.93.38-1.1.95-.26.84-.58,1.65-.85,2.49q-.89,2.76-3.76,2.76Zm-13.93-65.38c1.32,1.03,2.57,2.02,3.84,2.97.53.39,1.07.9,1.82.38.79-.55.52-1.26.32-1.94-.36-1.22-.71-2.45-1.17-3.64-.34-.9-.15-1.47.64-2.01,1.09-.74,2.1-1.59,3.15-2.37.57-.43.86-.95.63-1.65-.22-.65-.79-.73-1.37-.73-1.4-.01-2.8-.02-4.19,0-.56.01-.84-.15-1.01-.73-.44-1.45-1-2.86-1.46-4.3-.22-.68-.55-1.21-1.3-1.16-.72.05-1.04.6-1.24,1.27-.4,1.34-.93,2.63-1.3,3.98-.21.79-.62.98-1.37.95-1.2-.05-2.4-.02-3.59-.01-.67,0-1.43-.09-1.7.76-.27.83.2,1.33.85,1.78,1.07.76,2.1,1.59,3.15,2.38.53.39.78.76.5,1.5-.51,1.34-.83,2.75-1.28,4.11-.23.69-.38,1.3.32,1.82.68.5,1.22.11,1.73-.27,1.31-.98,2.59-1.98,4.02-3.07Zm95.89,17.86c-.68,0-1.36.02-2.04,0-.65-.02-1.22.09-1.46.77-.25.72.11,1.2.68,1.62,1.12.83,2.19,1.74,3.34,2.53.66.46.73.91.48,1.62-.48,1.39-.88,2.82-1.32,4.22-.2.62-.21,1.2.4,1.59.6.38,1.14.17,1.65-.23,1.01-.79,2.05-1.52,3.02-2.35.72-.62,1.27-.74,2.04-.03.94.86,2.01,1.57,3.02,2.36.54.42,1.12.69,1.74.22.57-.42.53-1,.33-1.62-.47-1.4-.88-2.81-1.35-4.21-.22-.65-.12-1.08.5-1.51,1.18-.81,2.29-1.74,3.42-2.62.49-.39.88-.84.64-1.53-.24-.69-.8-.81-1.44-.81-1.28,0-2.56-.04-3.83.02-.79.04-1.21-.15-1.43-1-.35-1.35-.86-2.65-1.3-3.98-.21-.63-.5-1.24-1.27-1.25-.75,0-1.1.54-1.3,1.2-.22.73-.47,1.44-.7,2.16q-.89,2.84-3.81,2.84Zm-101.68,27.81c-.68,0-1.36.02-2.04,0-.65-.02-1.2.09-1.44.79-.25.73.1,1.22.66,1.64,1.11.84,2.2,1.71,3.33,2.54.53.39.79.74.51,1.48-.51,1.34-.84,2.74-1.28,4.11-.22.69-.39,1.35.33,1.81.69.43,1.28.09,1.84-.36,1-.8,2.06-1.51,3.02-2.35.66-.57,1.13-.5,1.75.02.94.8,1.96,1.51,2.92,2.28.59.47,1.2.91,1.93.37s.45-1.29.24-1.98c-.39-1.26-.79-2.51-1.21-3.75-.23-.68-.14-1.18.51-1.63,1.11-.77,2.15-1.65,3.24-2.46.58-.44,1.02-.93.76-1.71-.26-.75-.9-.79-1.57-.79-1.32.01-2.64-.03-3.95.02-.63.02-.9-.2-1.09-.8-.46-1.48-1.03-2.93-1.5-4.41-.2-.63-.57-.95-1.21-.94-.66,0-.99.44-1.18,1.01-.28.83-.55,1.67-.83,2.49q-.92,2.64-3.72,2.64Zm73.76,30.74c-.03.71.15,1.05.52,1.28.51.31,1,.21,1.45-.13,1.18-.88,2.39-1.74,3.53-2.67.55-.45.94-.41,1.46.01,1.02.83,2.1,1.58,3.14,2.4.56.44,1.11.84,1.82.36.73-.49.53-1.18.34-1.84-.39-1.3-.75-2.61-1.25-3.87-.34-.86-.05-1.3.61-1.78,1.13-.82,2.22-1.7,3.32-2.56.47-.36.83-.81.61-1.43-.23-.65-.76-.86-1.43-.85-1.32.02-2.64-.04-3.96.02-.79.04-1.15-.28-1.37-.99-.43-1.41-.92-2.8-1.39-4.2-.19-.57-.5-1.02-1.16-1.03-.72-.01-1.04.46-1.24,1.08-.45,1.41-.94,2.8-1.38,4.21-.21.67-.56.96-1.29.93-1.32-.05-2.64,0-3.96-.02-.65,0-1.22.1-1.46.78-.24.68.1,1.14.62,1.53,1.11.84,2.18,1.75,3.33,2.54.73.5.81,1.01.53,1.8-.54,1.54-.98,3.12-1.39,4.43Zm-26.45-3.88c-.68,0-1.36,0-2.04,0-.66,0-1.31.09-1.58.82-.27.74.2,1.2.73,1.6,1.08.82,2.12,1.7,3.24,2.46.69.47.81.93.54,1.7-.49,1.35-.87,2.73-1.29,4.1-.19.6-.29,1.2.32,1.62.62.42,1.22.2,1.76-.22,1.01-.77,2.07-1.5,3.02-2.34.7-.62,1.22-.66,1.93-.04.93.82,1.95,1.51,2.92,2.29.58.46,1.2.73,1.86.31.67-.42.52-1.07.32-1.72-.43-1.37-.79-2.76-1.28-4.11-.26-.71-.07-1.1.49-1.5,1.13-.82,2.21-1.7,3.33-2.54.56-.42.9-.93.68-1.64-.21-.72-.84-.78-1.45-.79-1.2-.02-2.4-.06-3.59.01-.94.06-1.45-.18-1.7-1.18-.35-1.39-.9-2.72-1.35-4.09-.18-.56-.57-.89-1.13-.91-.57-.02-.98.29-1.17.85-.31.9-.62,1.81-.92,2.72q-.86,2.6-3.65,2.6Zm46.91-26.93c-.64,0-1.28.01-1.92,0-.71-.01-1.4.03-1.64.86-.22.75.22,1.18.77,1.59,1.15.86,2.26,1.77,3.41,2.62.51.37.59.74.39,1.32-.46,1.32-.85,2.66-1.26,3.99-.21.69-.52,1.44.27,1.95.74.48,1.35.05,1.94-.41,1-.79,2.04-1.53,3.02-2.36.58-.49,1.01-.43,1.56.02,1.05.86,2.16,1.64,3.21,2.5.56.45,1.14.64,1.74.23.59-.4.51-1.03.32-1.63-.42-1.33-.81-2.67-1.28-3.99-.28-.78-.2-1.29.56-1.79,1.16-.77,2.21-1.7,3.32-2.55.53-.4.83-.89.62-1.55-.22-.68-.8-.82-1.44-.81-1.32,0-2.64-.04-3.95.02-.72.03-1.07-.21-1.28-.9-.46-1.49-.98-2.95-1.48-4.42-.19-.55-.59-.87-1.17-.85-.58.01-.96.35-1.14.89-.27.83-.53,1.67-.8,2.51q-.87,2.76-3.76,2.76Zm0-54.64c-.68,0-1.36,0-2.04,0-.66,0-1.32.03-1.54.82-.21.74.21,1.19.76,1.6,1.12.83,2.2,1.71,3.34,2.52.58.42.71.82.45,1.51-.49,1.35-.87,2.73-1.28,4.11-.19.62-.38,1.25.3,1.72.71.5,1.29.13,1.85-.29,1.05-.8,2.1-1.59,3.11-2.43.54-.45.95-.53,1.54-.03.97.83,2.02,1.56,3.02,2.35.59.47,1.2.89,1.94.41.74-.48.5-1.17.3-1.83-.36-1.18-.64-2.4-1.12-3.53-.44-1.04-.25-1.66.69-2.27,1.07-.69,2.03-1.55,3.06-2.3.58-.43.88-.95.63-1.65-.23-.63-.8-.71-1.39-.71-1.36,0-2.72-.04-4.07.02-.69.03-.99-.22-1.18-.85-.42-1.41-.91-2.81-1.37-4.21-.21-.65-.57-1.21-1.33-1.17-.67.04-1.02.51-1.2,1.16-.22.81-.5,1.6-.76,2.39q-.88,2.66-3.71,2.66Zm-68.99-10.94c1.31,1.01,2.58,1.97,3.83,2.96.57.45,1.17.77,1.85.36.76-.45.52-1.19.34-1.83-.39-1.34-.8-2.68-1.26-3.99-.23-.66-.16-1.1.45-1.53,1.14-.81,2.21-1.71,3.33-2.54.56-.41.96-.85.75-1.59-.22-.8-.88-.84-1.53-.85-1.36-.01-2.72-.02-4.08,0-.56.01-.85-.17-1.02-.75-.42-1.42-.92-2.8-1.38-4.21-.21-.64-.5-1.2-1.28-1.22-.81-.02-1.07.58-1.29,1.2-.46,1.36-.97,2.71-1.35,4.09-.2.75-.59.91-1.28.89-1.32-.04-2.64-.01-3.96-.01-.64,0-1.21.15-1.44.83-.23.69.15,1.14.66,1.52,1.14.87,2.25,1.79,3.43,2.61.62.43.68.88.46,1.52-.43,1.28-.82,2.59-1.24,3.87-.22.69-.58,1.41.22,1.94.78.51,1.42.06,2.05-.43,1.22-.96,2.46-1.89,3.73-2.86Zm21.63-16.21c-.68,0-1.36.02-2.04,0-.65-.02-1.21.13-1.44.81-.23.69.17,1.13.67,1.52,1.17.9,2.32,1.82,3.5,2.7.48.36.64.69.42,1.3-.51,1.42-.93,2.88-1.39,4.33-.19.6-.28,1.2.31,1.63.62.45,1.19.24,1.74-.2,1.07-.84,2.17-1.63,3.21-2.49.59-.49,1.05-.52,1.65-.02,1.04.87,2.15,1.65,3.2,2.5.52.42,1.06.63,1.64.28.64-.39.65-1.03.43-1.7-.45-1.4-.82-2.84-1.34-4.22-.27-.72-.06-1.09.49-1.49,1.19-.87,2.34-1.79,3.51-2.68.49-.37.75-.84.56-1.45-.19-.63-.69-.81-1.31-.8-1.4.01-2.8-.04-4.19.02-.69.03-.99-.24-1.19-.86-.45-1.45-.95-2.88-1.42-4.31-.2-.62-.54-1.09-1.26-1.05-.64.04-.97.45-1.16,1.04-.25.8-.53,1.58-.79,2.38q-.89,2.79-3.85,2.79Zm27.22,7.15c-.68,0-1.36,0-2.04,0-.65,0-1.2.18-1.4.87-.18.62.11,1.04.62,1.42,1.19.88,2.32,1.83,3.51,2.7.53.39.68.75.45,1.4-.47,1.35-.83,2.74-1.27,4.11-.22.68-.42,1.36.29,1.83.74.49,1.35.05,1.94-.41,1.03-.81,2.11-1.57,3.12-2.41.51-.43.85-.39,1.34,0,1.05.85,2.17,1.63,3.22,2.47.57.46,1.13.79,1.83.34.75-.48.51-1.19.32-1.83-.41-1.37-.82-2.75-1.32-4.1-.24-.65-.08-1,.46-1.39,1.19-.86,2.32-1.82,3.5-2.7.54-.4.87-.87.62-1.52-.22-.59-.76-.77-1.37-.77-1.24,0-2.48-.07-3.71.02-1.03.08-1.51-.29-1.76-1.27-.32-1.23-.79-2.42-1.18-3.64-.22-.68-.49-1.31-1.34-1.29-.78.02-1.06.6-1.26,1.24-.23.72-.46,1.44-.71,2.16q-.95,2.78-3.87,2.78Zm-81.33,47c-.68,0-1.36,0-2.04,0-.63,0-1.22.04-1.46.76-.25.75.16,1.2.71,1.61,1.12.84,2.19,1.73,3.33,2.53.6.42.74.82.5,1.5-.49,1.39-.88,2.82-1.33,4.22-.21.65-.29,1.27.39,1.7.66.42,1.22.09,1.75-.32,1.07-.83,2.17-1.63,3.21-2.5.54-.45.93-.43,1.46,0,1.08.88,2.22,1.69,3.31,2.57.52.41,1.05.63,1.64.26.6-.38.59-.99.4-1.6-.44-1.45-.86-2.91-1.35-4.34-.22-.63-.15-1,.42-1.4,1.24-.87,2.42-1.83,3.61-2.76.45-.36.82-.78.55-1.43-.25-.6-.71-.8-1.34-.79-1.4.02-2.8-.02-4.2.02-.6.01-.93-.14-1.12-.77-.44-1.49-.97-2.95-1.46-4.43-.19-.58-.53-1-1.19-1.01-.64,0-1.02.37-1.22.96-.27.83-.56,1.67-.82,2.5q-.88,2.74-3.78,2.74Z" fill="#1e336a" stroke-width="0"/><path d="m151.6,263.43c-14.25.18-27.23-2.22-39.78-6.82-12.22-4.48-23.33-10.93-33.33-19.28-11.8-9.86-21.21-21.62-28.27-35.27-4.55-8.81-7.86-18.07-9.94-27.76-1.32-6.13-2.11-12.34-2.36-18.62-.13-3.31-.23-6.62.02-9.93.14-1.91,1.59-3.29,3.45-3.25,1.93.04,3.36,1.5,3.35,3.48-.02,3.76-.09,7.51.15,11.26.51,7.88,1.85,15.59,4.06,23.17,2.97,10.19,7.41,19.71,13.28,28.55,5.68,8.57,12.46,16.17,20.35,22.79,7.52,6.3,15.72,11.47,24.64,15.53,8.26,3.76,16.87,6.39,25.8,7.89,6.78,1.14,13.63,1.73,20.52,1.47,8.07-.3,16.05-1.36,23.88-3.41,12.21-3.2,23.49-8.37,33.85-15.59,13.63-9.51,24.46-21.53,32.52-36.06,5.15-9.28,8.72-19.15,10.93-29.53,1.95-9.21,2.51-18.52,1.97-27.88-.67-11.64-3.25-22.88-7.7-33.68-1.63-3.95-3.51-7.78-5.52-11.55-.66-1.24-.61-2.48.19-3.63.76-1.09,1.85-1.63,3.21-1.47,1.24.15,2.11.86,2.72,1.94,2.45,4.36,4.57,8.88,6.4,13.53,2.99,7.6,5.15,15.45,6.41,23.51,1.28,8.19,1.66,16.43,1.15,24.72-.53,8.77-2.06,17.34-4.59,25.74-2.78,9.22-6.72,17.92-11.74,26.14-5.26,8.6-11.58,16.35-18.9,23.27-7.32,6.92-15.44,12.75-24.32,17.5-7.88,4.22-16.14,7.47-24.8,9.7-6.7,1.73-13.49,2.86-20.41,3.31-2.68.18-5.35.16-7.18.21Z" fill="#61a7f2" stroke-width="0"/><path d="m301.61,150.63c-.05,10.09-.99,20.08-3.01,29.97-2.49,12.18-6.38,23.88-11.77,35.08-4.86,10.11-10.77,19.56-17.73,28.37-7.89,9.99-16.9,18.81-27.01,26.52-10.11,7.71-21.05,14.02-32.78,18.96-9.34,3.93-18.98,6.85-28.9,8.87-4.58.93-9.21,1.54-13.84,2.12-2.21.28-3.96-1.05-4.12-3.03-.17-2.19,1.19-3.64,3.47-3.87,6.64-.67,13.18-1.86,19.66-3.46,9.18-2.26,18.02-5.43,26.57-9.45,8.95-4.21,17.36-9.32,25.26-15.28,8.42-6.35,16.03-13.54,22.89-21.54,7.25-8.46,13.41-17.66,18.51-27.58,3.73-7.26,6.83-14.77,9.27-22.55,2.28-7.28,3.99-14.7,5.1-22.25,1.29-8.76,1.73-17.56,1.41-26.4-.46-12.26-2.5-24.26-6.05-36.02-4.92-16.29-12.52-31.23-22.71-44.84-5.76-7.69-12.22-14.74-19.45-21.08-.91-.8-1.81-1.58-1.88-2.93-.08-1.54.58-2.86,1.9-3.44,1.4-.62,2.74-.43,3.91.61,3.31,2.95,6.53,5.99,9.59,9.2,7.73,8.13,14.52,16.99,20.27,26.63,5.71,9.56,10.33,19.62,13.82,30.2,2.58,7.83,4.54,15.8,5.81,23.93.82,5.24,1.4,10.52,1.59,15.83.09,2.47.22,4.95.22,7.42Z" fill="#61a7f2" stroke-width="0"/><path d="m151.33,0c13.74-.07,27.78,2.01,41.56,5.96,9.86,2.83,19.29,6.69,28.38,11.41,2.58,1.34,3.22,3.91,1.47,5.78-1.14,1.22-2.66,1.41-4.38.5-4.63-2.43-9.37-4.65-14.23-6.58-9.49-3.77-19.26-6.52-29.33-8.19-7.14-1.19-14.32-1.86-21.56-2-7.68-.14-15.3.4-22.91,1.45-11.53,1.58-22.66,4.63-33.43,8.98-10.52,4.25-20.38,9.7-29.62,16.3-8.48,6.06-16.22,12.94-23.21,20.66-8.08,8.92-14.94,18.7-20.57,29.34-3.9,7.36-7.14,14.99-9.7,22.9-2.28,7.03-3.95,14.21-5.14,21.51-1.22,7.51-1.7,15.06-1.83,22.65-.03,1.8-1.3,3.21-2.96,3.34-2.01.17-3.67-.9-3.77-2.81-.15-2.94-.1-5.91.08-8.85.26-4.34.67-8.67,1.3-12.98.91-6.28,2.2-12.48,3.87-18.61,1.97-7.22,4.49-14.23,7.51-21.06,4.53-10.26,10.19-19.88,16.88-28.88,3.38-4.55,7.05-8.87,10.92-13.03,7.51-8.08,15.85-15.19,24.92-21.43,10.14-6.98,20.99-12.63,32.53-16.93,8.06-3,16.3-5.33,24.76-6.88,6.44-1.18,12.92-2.04,19.47-2.36,2.8-.14,5.59-.14,9-.21Z" fill="#61a7f2" stroke-width="0"/><path d="m63.41,61.49c0,.96-.28,1.78-.98,2.48-7.23,7.3-13.47,15.38-18.66,24.24-6.01,10.25-10.46,21.15-13.31,32.71-2.2,8.95-3.37,18.02-3.59,27.24-.25,10.52.83,20.9,3.29,31.1,4.55,18.86,13.07,35.76,25.49,50.68,9.08,10.91,19.75,19.96,31.95,27.2,5.95,3.53,12.17,6.52,18.65,8.95,2.11.79,3.07,2.67,2.36,4.56-.72,1.93-2.71,2.7-4.85,1.88-11.37-4.33-21.94-10.14-31.65-17.46-11.48-8.65-21.27-18.92-29.38-30.8-7.25-10.63-12.85-22.05-16.74-34.32-2.65-8.35-4.38-16.89-5.34-25.61-.73-6.62-.9-13.24-.59-19.86.47-10.24,2.15-20.3,5.02-30.15,2.59-8.89,6.06-17.41,10.45-25.56,4.24-7.86,9.25-15.21,15.03-22.02,2.19-2.59,4.46-5.12,6.86-7.52,1.08-1.08,2.36-1.47,3.83-.89,1.36.54,2.13,1.7,2.15,3.16Z" fill="#61a7f2" stroke-width="0"/><path d="m151.88,27.09c-14.3-.02-26.87,1.96-39.13,5.88-7.89,2.52-15.43,5.86-22.68,9.88-2.02,1.12-3.94.63-4.96-1.17-.98-1.74-.33-3.75,1.66-4.86,10.6-5.88,21.75-10.32,33.57-13.09,7.71-1.81,15.51-2.93,23.42-3.37,6.56-.37,13.08-.15,19.61.48,10.58,1.03,20.86,3.34,30.88,6.86,9.99,3.51,19.4,8.21,28.24,14.03,13.97,9.2,25.71,20.7,35.29,34.4,7.04,10.07,12.56,20.93,16.52,32.57,2.27,6.66,3.95,13.47,5.11,20.41.28,1.65-.97,3.4-2.63,3.77-1.77.39-3.63-.6-4.06-2.32-.53-2.13-.89-4.29-1.33-6.44-1.42-6.86-3.53-13.51-6.17-19.99-4.28-10.49-9.93-20.2-16.87-29.15-6.76-8.73-14.55-16.42-23.38-23.06-11.76-8.85-24.71-15.37-38.79-19.62-7.46-2.25-15.08-3.78-22.85-4.53-4.3-.41-8.59-.72-11.48-.69Z" fill="#61a7f2" stroke-width="0"/><path d="m246,149.08c-.01,12.46-1.76,23.04-5.45,33.28-.55,1.54-1.12,3.07-1.74,4.58-.81,1.97-2.66,2.82-4.45,2.09-1.9-.77-2.71-2.63-1.91-4.62,2.47-6.13,4.33-12.43,5.44-18.94,1.19-7.04,1.44-14.12.97-21.25-.46-6.88-1.78-13.59-3.85-20.17-2.31-7.36-5.57-14.27-9.72-20.76-6.98-10.93-15.95-19.91-26.85-26.92-9.89-6.36-20.64-10.57-32.24-12.61-6.04-1.06-12.12-1.54-18.24-1.33-9.48.33-18.71,2.01-27.6,5.39-1.42.54-2.84,1.06-4.24,1.65-2.01.85-4.08.28-4.86-1.4-.91-1.96-.14-3.95,2.01-4.89,5.17-2.25,10.52-3.99,16.02-5.25,7.86-1.8,15.82-2.64,23.88-2.41,8.98.26,17.77,1.7,26.35,4.42,11.33,3.59,21.62,9.09,30.86,16.52,11.8,9.49,20.87,21.15,27.16,34.95,3.18,6.97,5.5,14.22,6.88,21.74,1.06,5.77,1.74,11.61,1.6,15.92Z" fill="#61a7f2" stroke-width="0"/><path d="m150.82,37.76c15.08-.02,29.6,2.85,43.51,8.64,11.29,4.7,21.56,11.06,30.72,19.19,1.82,1.62,3.66,3.22,5.37,4.95,2.19,2.21,1.36,5.39-1.5,6.09-1.46.36-2.55-.36-3.52-1.33-4.75-4.76-9.96-8.97-15.53-12.73-7.72-5.22-16-9.31-24.81-12.3-7.31-2.48-14.81-4.12-22.5-4.97-5.25-.57-10.51-.84-15.78-.61-13.49.59-26.46,3.52-38.83,8.99-11.43,5.05-21.67,11.9-30.69,20.53-7.43,7.11-13.68,15.15-18.76,24.1-1.79,3.16-3.35,6.45-4.94,9.71-.94,1.93-3.25,2.47-4.99,1.26-1.25-.87-1.8-2.42-1.25-3.92,1.08-2.93,2.56-5.67,4.04-8.41,6.76-12.5,15.59-23.35,26.46-32.51,12.76-10.75,27.2-18.36,43.33-22.72,8.43-2.28,16.99-3.7,25.74-3.84.68-.01,1.35-.1,2.03-.13.64-.02,1.28,0,1.92,0Z" fill="#61a7f2" stroke-width="0"/><path d="m150.39,281.17c-6.86.16-14.16-.65-21.42-1.77-2.16-.33-3.48-2.07-3.15-4.05.32-1.92,2.08-3.16,4.2-2.78,8.73,1.55,17.53,1.97,26.37,1.63,6.39-.25,12.72-1.05,18.98-2.34,11.18-2.3,21.83-6.06,31.95-11.31,9.76-5.06,18.7-11.3,26.82-18.72,11.54-10.56,20.71-22.89,27.61-36.91,4.96-10.08,8.41-20.67,10.51-31.71.53-2.78.85-5.6,1.28-8.4.26-1.68,1.98-2.99,3.63-2.8,1.91.23,3.41,1.91,3.19,3.68-1.49,12.23-4.54,24.05-9.31,35.42-4.38,10.43-10.02,20.13-16.92,29.1-8.14,10.59-17.69,19.7-28.63,27.36-9.17,6.42-18.99,11.62-29.48,15.52-7.95,2.95-16.11,5.12-24.5,6.43-6.84,1.07-13.7,1.73-21.13,1.64Z" fill="#61a7f2" stroke-width="0"/><path d="m135.61,300.57c-5.21-.58-10.97-1.4-16.67-2.63-10.46-2.25-20.55-5.58-30.3-9.96-10.2-4.58-19.75-10.27-28.68-16.99-7.54-5.68-14.48-12.04-20.84-19.03-7.45-8.18-13.88-17.09-19.39-26.67-2.78-4.85-5.29-9.84-7.45-14.99-.77-1.84-.02-3.77,1.69-4.55,1.79-.81,3.74-.1,4.59,1.8,2.1,4.7,4.35,9.33,6.89,13.81,5.24,9.24,11.39,17.81,18.53,25.68,8.06,8.89,17.05,16.7,27.05,23.33,8.21,5.44,16.88,10,26.02,13.69,9.89,3.99,20.11,6.74,30.6,8.54,2.95.51,5.92.87,8.91,1.09,3.02.22,4.58,2.3,3.65,4.81-.55,1.51-1.85,2.18-4.59,2.07Z" fill="#61a7f2" stroke-width="0"/><path d="m150.69,245.72c-15.75.03-30.55-3.63-44.45-10.95-4.95-2.61-9.63-5.67-14.03-9.13-1.69-1.33-2.04-3.48-.84-5.07,1.14-1.52,3.3-1.72,5.02-.39,5.51,4.28,11.41,7.91,17.76,10.81,7.74,3.53,15.83,5.87,24.27,7.04,4.36.61,8.74.92,13.13.87,11.82-.16,23.2-2.48,34.09-7.16,11.23-4.83,21.02-11.71,29.42-20.58,1.24-1.3,2.41-2.67,3.58-4.03,1.48-1.72,3.56-2.1,5.05-.9,1.68,1.36,1.81,3.46.27,5.3-5.99,7.15-12.86,13.32-20.63,18.47-9.31,6.17-19.42,10.54-30.26,13.16-4.92,1.19-9.92,2-15,2.31-2.48.15-4.95.17-7.38.26Z" fill="#61a7f2" stroke-width="0"/><path d="m55.5,150.74c.18-13.01,2.55-25.42,7.63-37.29,3.99-9.33,9.29-17.81,15.99-25.44,3.36-3.82,6.99-7.34,10.89-10.6,1.58-1.32,3.75-1.27,4.95.14,1.38,1.62,1.13,3.78-.57,5.19-10.95,9.08-19.24,20.18-24.87,33.24-3.15,7.29-5.26,14.91-6.28,22.78-2.07,15.98-.08,31.45,6.2,46.31,2.18,5.16,4.86,10.06,7.98,14.71,1.46,2.17.53,4.76-1.91,5.45-1.46.42-2.9-.24-3.95-1.81-2.18-3.25-4.15-6.63-5.91-10.13-3.89-7.75-6.67-15.88-8.33-24.39-1.18-6.05-1.74-12.16-1.82-18.18Z" fill="#61a7f2" stroke-width="0"/><path d="m235.04,25.46c1.8-.01,3.34,1.43,3.4,3.18.06,1.73-1.54,3.39-3.31,3.44-1.75.05-3.29-1.45-3.33-3.23-.04-1.95,1.32-3.38,3.23-3.39Z" fill="#61a7f2" stroke-width="0"/><path d="m86.64,212.33c-.02,1.76-1.53,3.25-3.32,3.26-1.83.01-3.35-1.53-3.33-3.37.02-1.84,1.54-3.27,3.43-3.22,1.78.05,3.24,1.56,3.22,3.33Z" fill="#61a7f2" stroke-width="0"/><path d="m232.76,197.89c.01,1.78-1.46,3.33-3.19,3.36-1.84.03-3.48-1.6-3.44-3.43.04-1.73,1.61-3.22,3.4-3.21,1.81,0,3.22,1.44,3.23,3.29Z" fill="#61a7f2" stroke-width="0"/><path d="m238.17,87.84c-1.84-.02-3.25-1.45-3.22-3.27.03-1.89,1.48-3.26,3.41-3.23,1.85.03,3.26,1.46,3.23,3.29-.03,1.85-1.51,3.24-3.42,3.21Z" fill="#61a7f2" stroke-width="0"/><path d="m102.48,75.1c-1.91.01-3.31-1.4-3.29-3.33.01-1.8,1.51-3.29,3.28-3.26,1.85.03,3.36,1.55,3.34,3.37-.02,1.8-1.47,3.21-3.32,3.22Z" fill="#61a7f2" stroke-width="0"/><path d="m72.19,45.39c1.88.02,3.26,1.5,3.21,3.43-.04,1.75-1.48,3.18-3.22,3.2-1.81.02-3.43-1.56-3.41-3.33.02-1.83,1.56-3.32,3.41-3.3Z" fill="#61a7f2" stroke-width="0"/><path d="m155.27,297.69c-.02,1.79-1.5,3.32-3.24,3.32-1.75,0-3.41-1.66-3.37-3.38.05-1.88,1.55-3.3,3.42-3.26,1.87.04,3.2,1.42,3.18,3.32Z" fill="#61a7f2" stroke-width="0"/><path d="m6.65,185.21c-1.85,0-3.41-1.52-3.38-3.29.03-1.75,1.54-3.2,3.34-3.21,1.9,0,3.27,1.31,3.3,3.16.03,1.94-1.34,3.33-3.26,3.34Z" fill="#61a7f2" stroke-width="0"/><path d="m46.64,125.27c0,1.93-1.37,3.3-3.31,3.3-1.84,0-3.2-1.38-3.21-3.26,0-1.84,1.51-3.39,3.29-3.36,1.75.03,3.22,1.54,3.22,3.31Z" fill="#61a7f2" stroke-width="0"/><path d="m281.47,147.61c0,1.93-1.4,3.33-3.3,3.31-1.85-.02-3.2-1.4-3.21-3.28,0-1.83,1.48-3.35,3.3-3.37,1.7-.02,3.2,1.55,3.2,3.34Z" fill="#61a7f2" stroke-width="0"/><path d="m119.32,272.96c-.02,1.81-1.49,3.3-3.27,3.29-1.83,0-3.29-1.55-3.25-3.43.04-1.87,1.43-3.19,3.33-3.17,1.86.02,3.21,1.42,3.19,3.31Z" fill="#61a7f2" stroke-width="0"/><path d="m161.01,144.73c1.89.3,3.32,1.02,4.06,2.76.24.57.33,1.14.32,1.75,0,6.35,0,12.7,0,19.06,0,2.54-1.81,4.44-4.34,4.46-7.35.04-14.7.04-22.05,0-2.47-.01-4.33-1.89-4.35-4.35-.04-6.39-.03-12.78,0-19.18,0-2.13,1.29-3.77,3.36-4.23.84-.19.95-.56.96-1.29.05-2.43-.32-4.89.24-7.29,1.33-5.63,6.38-9.11,12.18-8.47,5.33.59,9.48,5.25,9.61,10.84.04,1.95,0,3.91,0,5.96Zm-4.9-.03c0-2.44.18-4.85-.04-7.21-.29-3.07-2.85-5.26-5.82-5.33-3.25-.08-5.91,1.95-6.4,5.11-.38,2.44-.12,4.92-.11,7.43h12.37Zm-10.65,11.66c0,1.2.38,2.47,1.38,3.17,1.12.78,1.35,1.73,1.21,2.93-.05.43-.01.88,0,1.31.02,1.35.77,2.2,1.96,2.22,1.16.02,2.04-.84,2.1-2.14.04-.83.04-1.67,0-2.51-.03-.6.13-.99.66-1.38,1.79-1.3,2.34-3.6,1.42-5.54-.91-1.92-3.08-3.03-5.03-2.59-2.19.5-3.71,2.35-3.71,4.52Z" fill="#fefefe" stroke-width="0"/><path d="m116.31,193.94q2.87,0,3.76-2.76c.27-.83.59-1.65.85-2.49.18-.57.55-.91,1.1-.95.62-.04,1.03.34,1.23.94.45,1.36.94,2.71,1.34,4.09.24.84.62,1.26,1.58,1.2,1.27-.09,2.55,0,3.83-.03.68-.02,1.19.24,1.42.86.24.62-.13,1.08-.59,1.44-1.16.91-2.3,1.85-3.5,2.7-.6.43-.7.85-.47,1.51.47,1.36.87,2.73,1.3,4.1.2.64.28,1.27-.35,1.73-.66.48-1.19.14-1.72-.27-1.1-.85-2.24-1.66-3.32-2.54-.49-.4-.84-.41-1.34,0-1.05.86-2.14,1.65-3.23,2.47-.55.41-1.11.87-1.83.36-.7-.5-.53-1.16-.31-1.83.42-1.33.81-2.67,1.26-3.99.24-.7.13-1.17-.51-1.61-1.14-.8-2.22-1.69-3.33-2.54-.49-.38-.93-.79-.72-1.49.22-.75.81-.91,1.5-.89.68.02,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m102.38,128.56c-1.42,1.09-2.71,2.1-4.02,3.07-.51.38-1.05.77-1.73.27-.7-.51-.54-1.13-.32-1.82.45-1.36.77-2.77,1.28-4.11.28-.74.03-1.11-.5-1.5-1.06-.79-2.08-1.61-3.15-2.38-.64-.45-1.11-.96-.85-1.78.27-.84,1.03-.75,1.7-.76,1.2,0,2.4-.04,3.59.01.74.03,1.15-.16,1.37-.95.36-1.34.9-2.64,1.3-3.98.2-.68.52-1.22,1.24-1.27.75-.05,1.08.48,1.3,1.16.46,1.44,1.02,2.85,1.46,4.3.18.58.45.74,1.01.73,1.4-.03,2.8-.02,4.19,0,.57,0,1.15.08,1.37.73.23.7-.06,1.23-.63,1.65-1.06.78-2.07,1.64-3.15,2.37-.79.54-.99,1.11-.64,2.01.45,1.19.81,2.42,1.17,3.64.2.68.47,1.39-.32,1.94-.76.52-1.3.01-1.82-.38-1.28-.95-2.52-1.95-3.84-2.97Z" fill="#ecc849" stroke-width="0"/><path d="m198.27,146.42q2.93,0,3.81-2.84c.23-.72.48-1.44.7-2.16.2-.66.55-1.21,1.3-1.2.76,0,1.05.62,1.27,1.25.44,1.32.95,2.63,1.3,3.98.22.84.64,1.04,1.43,1,1.27-.06,2.56-.01,3.83-.02.64,0,1.2.11,1.44.81.24.7-.14,1.14-.64,1.53-1.13.88-2.24,1.81-3.42,2.62-.62.43-.72.85-.5,1.51.47,1.4.88,2.81,1.35,4.21.21.62.24,1.2-.33,1.62-.63.47-1.2.2-1.74-.22-1.01-.79-2.08-1.49-3.02-2.36-.77-.71-1.33-.58-2.04.03-.97.83-2.01,1.57-3.02,2.35-.51.4-1.05.61-1.65.23-.62-.39-.6-.97-.4-1.59.44-1.41.83-2.83,1.32-4.22.25-.71.18-1.16-.48-1.62-1.15-.79-2.21-1.7-3.34-2.53-.57-.42-.93-.9-.68-1.62.24-.68.81-.79,1.46-.77.68.03,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m96.59,174.23q2.79,0,3.72-2.64c.29-.83.56-1.66.83-2.49.19-.57.51-1.01,1.18-1.01.64,0,1,.31,1.21.94.48,1.48,1.05,2.93,1.5,4.41.19.61.46.82,1.09.8,1.32-.04,2.63,0,3.95-.02.67,0,1.32.03,1.57.79.27.78-.18,1.28-.76,1.71-1.08.82-2.12,1.69-3.24,2.46-.65.45-.74.94-.51,1.63.42,1.25.82,2.5,1.21,3.75.21.69.49,1.44-.24,1.98s-1.34.09-1.93-.37c-.97-.77-1.98-1.48-2.92-2.28-.62-.52-1.09-.6-1.75-.02-.96.84-2.02,1.55-3.02,2.35-.57.45-1.15.79-1.84.36-.73-.45-.56-1.12-.33-1.81.44-1.36.77-2.77,1.28-4.11.28-.74.03-1.09-.51-1.48-1.12-.83-2.21-1.7-3.33-2.54-.56-.42-.9-.91-.66-1.64.24-.7.79-.81,1.44-.79.68.02,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m170.35,204.97c.41-1.31.84-2.89,1.39-4.43.28-.79.2-1.3-.53-1.8-1.15-.79-2.22-1.69-3.33-2.54-.52-.39-.86-.86-.62-1.53.24-.68.81-.79,1.46-.78,1.32.02,2.64-.03,3.96.02.73.03,1.09-.26,1.29-.93.43-1.41.93-2.8,1.38-4.21.2-.63.52-1.09,1.24-1.08.66.01.97.46,1.16,1.03.46,1.4.95,2.79,1.39,4.2.22.71.58,1.03,1.37.99,1.32-.07,2.64,0,3.96-.02.67,0,1.2.2,1.43.85.22.63-.14,1.07-.61,1.43-1.1.86-2.19,1.74-3.32,2.56-.66.47-.96.92-.61,1.78.5,1.26.86,2.57,1.25,3.87.2.65.39,1.35-.34,1.84-.72.48-1.26.09-1.82-.36-1.03-.81-2.11-1.57-3.14-2.4-.52-.42-.9-.46-1.46-.01-1.14.93-2.35,1.79-3.53,2.67-.45.34-.94.44-1.45.13-.37-.22-.55-.57-.52-1.28Z" fill="#ecc849" stroke-width="0"/><path d="m143.9,201.09q2.79,0,3.65-2.6c.3-.91.6-1.81.92-2.72.19-.55.61-.87,1.17-.85.56.02.95.35,1.13.91.45,1.36,1,2.7,1.35,4.09.25,1,.77,1.24,1.7,1.18,1.19-.07,2.39-.03,3.59-.01.61,0,1.24.07,1.45.79.21.71-.12,1.22-.68,1.64-1.12.84-2.2,1.72-3.33,2.54-.55.4-.75.79-.49,1.5.49,1.34.85,2.74,1.28,4.11.2.64.36,1.29-.32,1.72-.67.42-1.29.15-1.86-.31-.96-.77-1.99-1.47-2.92-2.29-.71-.63-1.23-.58-1.93.04-.95.84-2.01,1.57-3.02,2.34-.55.42-1.14.64-1.76.22-.61-.41-.51-1.02-.32-1.62.42-1.37.81-2.76,1.29-4.1.28-.77.15-1.23-.54-1.7-1.12-.76-2.16-1.64-3.24-2.46-.53-.41-1-.86-.73-1.6.26-.73.91-.82,1.58-.82.68,0,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m190.81,174.16q2.89,0,3.76-2.76c.27-.84.52-1.67.8-2.51.18-.55.57-.88,1.14-.89.58-.01.98.3,1.17.85.5,1.47,1.03,2.94,1.48,4.42.21.69.56.93,1.28.9,1.32-.06,2.64,0,3.95-.02.65,0,1.22.13,1.44.81.21.65-.08,1.14-.62,1.55-1.11.84-2.16,1.78-3.32,2.55-.76.5-.83,1.01-.56,1.79.47,1.31.86,2.66,1.28,3.99.19.6.27,1.23-.32,1.63-.6.41-1.18.23-1.74-.23-1.05-.85-2.16-1.64-3.21-2.5-.55-.45-.98-.51-1.56-.02-.97.82-2.02,1.56-3.02,2.36-.59.47-1.2.9-1.94.41-.79-.52-.48-1.27-.27-1.95.4-1.34.8-2.68,1.26-3.99.2-.58.12-.95-.39-1.32-1.16-.85-2.26-1.76-3.41-2.62-.55-.41-.99-.84-.77-1.59.25-.83.93-.88,1.64-.86.64.01,1.28,0,1.92,0Z" fill="#ecc849" stroke-width="0"/><path d="m190.81,119.52q2.83,0,3.71-2.66c.26-.79.54-1.59.76-2.39.18-.64.53-1.12,1.2-1.16.76-.04,1.11.52,1.33,1.17.46,1.4.95,2.79,1.37,4.21.19.64.49.88,1.18.85,1.36-.06,2.71-.02,4.07-.02.59,0,1.16.08,1.39.71.25.69-.05,1.22-.63,1.65-1.03.76-1.99,1.62-3.06,2.3-.95.61-1.13,1.23-.69,2.27.48,1.13.76,2.35,1.12,3.53.2.66.44,1.36-.3,1.83-.75.48-1.35.06-1.94-.41-1-.79-2.06-1.52-3.02-2.35-.58-.5-.99-.42-1.54.03-1.01.84-2.07,1.63-3.11,2.43-.55.42-1.13.79-1.85.29-.68-.48-.49-1.1-.3-1.72.42-1.37.79-2.76,1.28-4.11.25-.69.13-1.1-.45-1.51-1.13-.81-2.21-1.7-3.34-2.52-.56-.41-.97-.86-.76-1.6.22-.79.88-.82,1.54-.82.68,0,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m121.82,108.58c-1.28.98-2.51,1.91-3.73,2.86-.62.49-1.27.94-2.05.43-.8-.53-.44-1.25-.22-1.94.42-1.29.81-2.59,1.24-3.87.22-.64.15-1.09-.46-1.52-1.18-.82-2.29-1.74-3.43-2.61-.51-.39-.89-.84-.66-1.52.23-.68.8-.83,1.44-.83,1.32,0,2.64-.03,3.96.01.69.02,1.08-.14,1.28-.89.38-1.38.89-2.73,1.35-4.09.21-.63.48-1.22,1.29-1.2.78.02,1.07.58,1.28,1.22.46,1.4.97,2.79,1.38,4.21.17.58.45.76,1.02.75,1.36-.03,2.72-.01,4.08,0,.65,0,1.31.05,1.53.85.21.75-.2,1.18-.75,1.59-1.12.83-2.19,1.73-3.33,2.54-.61.43-.68.87-.45,1.53.46,1.32.87,2.65,1.26,3.99.19.64.42,1.38-.34,1.83-.69.41-1.28.09-1.85-.36-1.25-.99-2.52-1.95-3.83-2.96Z" fill="#ecc849" stroke-width="0"/><path d="m143.45,92.37q2.96,0,3.85-2.79c.25-.8.54-1.58.79-2.38.18-.58.51-1,1.16-1.04.72-.04,1.06.43,1.26,1.05.47,1.44.98,2.87,1.42,4.31.19.62.49.89,1.19.86,1.39-.06,2.79,0,4.19-.02.62,0,1.12.17,1.31.8.19.61-.07,1.08-.56,1.45-1.17.89-2.32,1.81-3.51,2.68-.55.4-.76.77-.49,1.49.51,1.38.88,2.81,1.34,4.22.22.67.21,1.3-.43,1.7-.58.35-1.12.14-1.64-.28-1.05-.85-2.16-1.63-3.2-2.5-.6-.5-1.06-.47-1.65.02-1.04.86-2.15,1.65-3.21,2.49-.55.43-1.12.64-1.74.2-.59-.43-.51-1.02-.31-1.63.46-1.44.87-2.9,1.39-4.33.22-.62.06-.95-.42-1.3-1.19-.88-2.34-1.8-3.5-2.7-.5-.39-.91-.83-.67-1.52.23-.68.79-.83,1.44-.81.68.02,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m170.67,99.52q2.93,0,3.87-2.78c.24-.72.48-1.44.71-2.16.2-.64.47-1.23,1.26-1.24.85-.02,1.12.61,1.34,1.29.39,1.21.86,2.4,1.18,3.64.25.99.73,1.36,1.76,1.27,1.23-.1,2.47-.02,3.71-.02.61,0,1.14.18,1.37.77.25.65-.08,1.12-.62,1.52-1.18.88-2.31,1.84-3.5,2.7-.54.39-.7.74-.46,1.39.49,1.35.91,2.72,1.32,4.1.19.64.43,1.35-.32,1.83-.7.45-1.26.12-1.83-.34-1.06-.85-2.17-1.62-3.22-2.47-.49-.39-.83-.43-1.34,0-1,.85-2.09,1.6-3.12,2.41-.59.46-1.2.9-1.94.41-.71-.47-.51-1.15-.29-1.83.44-1.36.8-2.75,1.27-4.11.23-.65.08-1.01-.45-1.4-1.19-.87-2.32-1.82-3.51-2.7-.51-.37-.8-.8-.62-1.42.2-.69.75-.87,1.4-.87.68,0,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m89.34,146.52q2.9,0,3.78-2.74c.27-.84.55-1.67.82-2.5.19-.59.57-.97,1.22-.96.65,0,1,.43,1.19,1.01.49,1.48,1.02,2.94,1.46,4.43.19.63.52.79,1.12.77,1.4-.03,2.8,0,4.2-.02.62,0,1.09.19,1.34.79.27.65-.1,1.08-.55,1.43-1.19.94-2.37,1.89-3.61,2.76-.57.4-.64.77-.42,1.4.5,1.43.91,2.89,1.35,4.34.19.61.2,1.22-.4,1.6-.59.37-1.12.15-1.64-.26-1.09-.87-2.23-1.69-3.31-2.57-.53-.43-.92-.44-1.46,0-1.04.87-2.14,1.67-3.21,2.5-.53.41-1.08.74-1.75.32-.68-.42-.6-1.05-.39-1.7.45-1.41.85-2.83,1.33-4.22.24-.69.09-1.09-.5-1.5-1.14-.8-2.22-1.69-3.33-2.53-.55-.41-.96-.86-.71-1.61.24-.72.83-.77,1.46-.76.68,0,1.36,0,2.04,0Z" fill="#ecc849" stroke-width="0"/><path d="m156.11,144.7h-12.37c0-2.52-.26-4.99.11-7.43.49-3.16,3.15-5.19,6.4-5.11,2.96.07,5.52,2.26,5.82,5.33.22,2.36.04,4.77.04,7.21Z" fill="#1e336a" stroke-width="0"/><path d="m145.46,156.36c0-2.17,1.52-4.02,3.71-4.52,1.95-.44,4.12.68,5.03,2.59.92,1.94.37,4.24-1.42,5.54-.53.38-.69.77-.66,1.38.04.83.04,1.68,0,2.51-.07,1.3-.95,2.16-2.1,2.14-1.19-.02-1.94-.87-1.96-2.22,0-.44-.04-.88,0-1.31.13-1.21-.09-2.16-1.21-2.93-1-.69-1.38-1.97-1.38-3.17Z" fill="#1e336a" stroke-width="0"/></svg>
						<a href="https://eherkenning.nl/nl/eherkenning-aanvragen" class="d-inline-block pl-3" target="_blank">Login with your European Approved Identity <i class="fa-solid fa-arrow-right pl-1"></i><span class="sr-only">, opent in een nieuw tabblad</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container pt-md-5">
			<div class="row">
				<div class="col-lg-7">
					<div class="page-main__content | shadow bg-white border p-3 p-md-4 normalize-child-margin">
					<?php the_content(); ?>
					</div>
				</div>
			</div>

		</div>

		<?php if(has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full', ['class' => 'w-100 h-400px object-fit-cover']); ?>
		<?php endif; ?>
    </main>
<?php

get_template_part('mijn-zaken/footer');
