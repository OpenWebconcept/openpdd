<?php

namespace GGD\AFAS;

class AfasServiceProvider
{
    public function __construct()
    {
        require_once __DIR__ . '/Helpers.php';
        $this->loadHooks();
    }

    protected function loadHooks()
    {
        add_action('gform_after_submission', [new AFAS(), 'afterFormSubmission'], 10, 2);
    }
}
