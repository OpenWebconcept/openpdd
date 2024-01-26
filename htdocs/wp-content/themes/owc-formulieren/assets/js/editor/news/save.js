const Save = ( { attributes } ) => {

	/**
	 * This data will be fetched from the OpenPUB API. The function for this can be found in
	 * /assets/js/frontend/components/FetchOpenPubData.js.
	 */
	return (
		<ul
			className="openpdd-news"
			data-news-api-url={attributes.apiUrl}
			data-amount-of-posts={attributes.amountOfPosts}
			data-detail-page-url={attributes.detailPageUrl}>
		</ul>
	);
};

export default Save;
