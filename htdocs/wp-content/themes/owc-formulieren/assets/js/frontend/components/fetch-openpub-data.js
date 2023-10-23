async function fetchFromOpenPub(zipcode, selector) {
    try {
        const response = await fetch( `https://openpub.gemeentehw.nl/wp-json/owc/openpub/v1/items?zipcode=${zipcode}` );
        const responseData = await response.json();

        if (responseData && responseData.data) {
            const list = document.querySelector( selector );
            list.innerHTML = responseData.data.map( listItem ).join( '' );
        } else {
            console.warn( 'API Call to OpenPub was successful, but no data was returned.' );
        }
    } catch (error) {
        console.error( "Error while fetching data from OpenPub:", error );
    }
}

const listItem = (item) => {
    const dateOptions = {year: 'numeric', month: 'long', day: 'numeric'};

    return `
        <li class="openpdd-news__item">
            <div class="denhaag-card-news">
                <div class="denhaag-card-news__content">
                    <h4 class="utrecht-heading-4 denhaag-card-news__heading">
                        <a
                            class="denhaag-card-news__link"
                            href="${item.slug}">
                            ${item.title}
                        </a>
                    </h4>
                    <time
                        class="denhaag-card-news__date"
                        dateTime="2022-02-15">
                        ${new Date( item.date ).toLocaleDateString( 'nl-NL', dateOptions )}
                    </time>
                    ${item.excerpt !== '' ? `<p class="utrecht-paragraph denhaag-card-news__paragraph">${item.excerpt}</p>` : ''}
                    <div class="denhaag-card-news__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"><path d="M10.2428 4.91058C10.5682 4.58514 11.0958 4.58514 11.4213 4.91058L16.4213 9.91058C16.5776 10.0669 16.6654 10.2788 16.6654 10.4998C16.6654 10.7209 16.5776 10.9328 16.4213 11.0891L11.4213 16.0891C11.0958 16.4145 10.5682 16.4145 10.2428 16.0891C9.91734 15.7637 9.91734 15.236 10.2428 14.9106L13.8202 11.3332L4.16536 11.3332C3.70513 11.3332 3.33203 10.9601 3.33203 10.4998C3.33203 10.0396 3.70513 9.6665 4.16536 9.6665L13.8202 9.6665L10.2428 6.08909C9.91734 5.76366 9.91734 5.23602 10.2428 4.91058Z" style="fill: var(--icon-arrow-right-color, #4D6EB9);" /></svg>
                    </div>
                </div>
                <div class="denhaag-card-news__image-container">
                      ${addClassToImage( item.image.rendered )}
                </div>
            </div>
        </li>
    `;
};

function addClassToImage(renderedHTML) {
    return renderedHTML.replace( /class="/g, 'class="denhaag-card-news__image ' );
}

export default fetchFromOpenPub;
