<?php

namespace GGD\AFAS\Helpers;

function resolve($container, $arguments = [])
{
    return \GGD\AFAS\SOAP\SOAPContainer::getInstance()->getContainer()->get($container, $arguments);
}

function view(string $template, array $vars = []): string
{
    return resolve(\GGD\AFAS\SOAP\View::class)->render($template, $vars);
}
