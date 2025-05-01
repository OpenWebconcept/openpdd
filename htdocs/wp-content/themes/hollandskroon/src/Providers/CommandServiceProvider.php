<?php

declare(strict_types=1);

namespace HK\Providers;

use HK\Commands\PronamicIdealCleanupCommand;

class CommandServiceProvider
{
	/**
	 * @throws \Exception
	 */
	public function boot()
	{
		if (defined('WP_CLI') && WP_CLI) {
			\WP_CLI::add_command('pronamic:cleanup', PronamicIdealCleanupCommand::class);
		}
	}
}
