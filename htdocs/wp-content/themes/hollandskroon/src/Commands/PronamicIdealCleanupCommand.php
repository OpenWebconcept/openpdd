<?php

namespace HK\Commands;

use WP_CLI;
use WP_Query;

class PronamicIdealCleanupCommand
{
	public function __invoke($args, $assoc_args): void
	{
		$postsPerPage = 100;
		$deletionCount = 0;
		$paged = 1;

		do {
			// Fetch fulfilled payments older than 5 days in batches
			$payments = new WP_Query([
				'post_type'      => 'pronamic_payment',
				'post_status'    => 'payment_completed',
				'posts_per_page' => $postsPerPage,
				'paged'          => $paged,
				'date_query'     => [
					'before' => '5 days ago',
				],
				'fields'         => 'ids', // Fetch only IDs to reduce memory usage
			]);

			foreach ($payments->posts as $paymentId) {
				if ($this->deletePayment((int) $paymentId)) {
					$deletionCount++;
				}
			}

			$paged++;
		} while ($paged <= $payments->max_num_pages);

		WP_CLI::success('Pronamic fulfilled payments cleaned up successfully.');
		WP_CLI::line('Deleted ' . $deletionCount . ' payments.');
	}

	/**
	 * Delete a payment and log a warning if deletion fails.
	 */
	private function deletePayment(int $paymentId): bool
	{
		if (!wp_delete_post($paymentId, true)) {
			WP_CLI::warning('Failed to delete post with ID: ' . $paymentId);

			return false;
		}

		return true;
	}
}