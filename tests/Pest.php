<?php

use FmTod\IdeHelperActions\Service\ActionInfo;
use FmTod\IdeHelperActions\Service\ActionInfoFactory;

uses(\FmTod\IdeHelperActions\Tests\TestCase::class)->in(__DIR__);

/** @param  class-string  $class */
function getActionInfo(string $class): ActionInfo {
    $actionInfos = collect(ActionInfoFactory::create(__DIR__ . '/stubs'));
    return $actionInfos->filter(fn(ActionInfo $ai) => $ai->fqsen == $class)->firstOrFail();
}
