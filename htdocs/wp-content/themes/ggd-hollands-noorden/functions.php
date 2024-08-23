<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

(new GGD\AFAS\AfasServiceProvider());
(new GGD\AFAS\SOAP\SOAPContainer());

add_filter('gform_enable_legacy_markup', '__return_true');
