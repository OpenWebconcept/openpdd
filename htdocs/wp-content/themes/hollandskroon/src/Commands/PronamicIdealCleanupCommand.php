<?php

namespace HK\Commands;

use \WP_CLI;
use \WP_CLI\ExitException;

class PronamicIdealCleanupCommand
{
	/**
	 * @throws \JsonException
	 * @throws ExitException
	 */
	public function __invoke($args, $assoc_args)
	{
		$postsPerPage = 100;
		$deletionCount = 0;

		do {
			// Get fulfilled payments older than 5 days in batches of 100
			$payments = new \WP_Query([
				'post_type'      => 'pronamic_payment',
				'post_status'    => 'payment_completed',
				'posts_per_page' => $postsPerPage,
				'paged'          => 1,
				'date_query'     => [
					'before' => '5 days ago',
				],
			]);

			foreach ($payments->posts as $payment) {
				if (!wp_delete_post($payment->ID, true)) {
					WP_CLI::warning('Failed to delete post with ID: ' . $payment->ID);
					throw new \Exception('Failed to delete post with ID: ' . $payment->ID);
				}
				$deletionCount++;
			}
		} while ($payments->have_posts());

		WP_CLI::success('Pronamic fulfilled payments cleaned up successfully.');
		WP_CLI::line('Deleted ' . $deletionCount . ' payments.');
	}
}