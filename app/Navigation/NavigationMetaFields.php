<?php

declare( strict_types=1 );

namespace App\Navigation;

class NavigationMetaFields {

	/**
	 * NavigationMetaFields constructor.
	 */
	public function __construct() {
		add_action( 'wp_nav_menu_item_custom_fields', [ $this, 'addCustomFields' ], 10, 2 );
		add_action( 'wp_update_nav_menu_item', [ $this, 'updateNavItems' ], 10, 2 );
	}

	/**
	 * Mapping of the meta fields to the menu item.
	 *
	 * @data-structure: 'FIELD_DESCRIPTION' => [
	 *    'meta_field' => 'META_FIELD_NAME',
	 *    'text'       => 'TEXT_SHOWN_BESIDE_CHECKBOX'
	 * ]
	 *
	 * @return array[]
	 */
	public function getFields(): array {
		return [
			'counter' => [
				'meta_field' => '_show-counter',
				'text'       => __( 'Show counter next to this item', 'owc-formulieren' ),
			],
			'spacing' => [
				'meta_field' => '_spacing-top',
				'text'       => __( 'Add spacing to the top of this item', 'owc-formulieren' ),
			],
		];
	}

	/**
	 * Add custom fields to the menu item edit screen form.
	 *
	 * @param $item_id
	 * @param $item
	 *
	 * @return void
	 */
	public function addCustomFields( $item_id, $item ): void {
		foreach ( $this->getFields() as $field_name => $meta_data ) {
			$is_current_active = get_post_meta( $item_id, $meta_data['meta_field'], true );
			?>
			<p class="owc-<?php echo $field_name; ?> description description-wide">
				<label for="owc-<?php echo $field_name; ?>-<?php echo $item_id; ?>">
					<input
						type="checkbox"
						id="<?php echo $field_name; ?>-<?php echo $item_id; ?>"
						name="<?php echo $field_name; ?>[<?php echo $item_id; ?>]"
						<?php checked( $is_current_active, true ); ?>
					/><?php echo $meta_data['text']; ?>
				</label>
			</p>
			<?php
		}
	}

	/**
	 * Update the nav menu item meta fields based on submitted data.
	 *
	 * @param $menu_id
	 * @param $menu_item_db_id
	 *
	 * @return void
	 */
	public function updateNavItems( $menu_id, $menu_item_db_id ): void {
		foreach ( $this->getFields() as $field_name => $meta_data ) {
			$value = ( $_POST[ $field_name ][ $menu_item_db_id ] ?? '' ) == 'on';
			update_post_meta( $menu_item_db_id, $meta_data['meta_field'], $value );
		}
	}
}
