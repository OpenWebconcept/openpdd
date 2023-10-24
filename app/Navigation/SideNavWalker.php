<?php

namespace App\Navigation;

class SideNavWalker extends \Walker_Nav_Menu {

	/**
	 * Manipulate the list item (start element).
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $data_object The data object (WP_Post).
	 * @param int $depth Depth of the item.
	 * @param array $args An array of additional arguments.
	 * @param int $current_object_id Optional. ID of the current item. Default 0.
	 *
	 * @return string
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$current_class = $item->current ? 'denhaag-sidenav__link--current' : '';
		$svg           = $this->getSvgByClassName( $item );
		$counter       = get_post_meta( $item->ID, '_show-counter', true )
			? '<div class="denhaag-badge-counter">
					<span class="denhaag-dot-indicator denhaag-dot-indicator--overlap-rectangle">
						<div
							id="badge-counter--' . sanitize_title( $item->title ) . '"
							class="denhaag-badge-counter__counter">
							0
						</div>
						<span class="denhaag-dot-indicator__dot"></span>
					</span>
				</div>'
			: '';

		$output .= '
			<li class="denhaag-sidenav__item">
				<a class="denhaag-sidenav__link ' . esc_attr( $current_class ) . '" href="' . esc_url( $item->url ) . '">
					' . $svg . '
					' . esc_html( $item->title ) . '
					' . $counter . '
				</a>';

		return $output;
	}

	/**
	 * Closes the list item.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $data_object The data object.
	 * @param int $depth Depth of the item.
	 * @param array $args An array of additional arguments.
	 *
	 * @return string
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= '</li>';

		return $output;
	}

	/**
	 * Returns an inline SVG based on a class name. The class name has to be identical to the file name.
	 *
	 * @path The path of the SVGs is WP_THEMES_FOLDER/PARENT_THEME/assets/img/icons
	 *
	 * @param $item
	 *
	 * @return false|string
	 */
	public function getSvgByClassName( $item ) {
		$first_class = $item->classes[0] ?? '';

		if ( ! $first_class ) {
			return '';
		}

		$path = '/assets/img/icons/' . esc_html( $first_class ) . '.svg';

		if ( ! is_file( get_template_directory() . $path ) ) {
			return '';
		}

		return file_get_contents( get_template_directory() . $path );
	}
}

