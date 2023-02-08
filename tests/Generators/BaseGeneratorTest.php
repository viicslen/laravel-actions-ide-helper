<?php

use FmTod\IdeHelperActions\Service\Generator\DocBlock\DocBlockGeneratorBase;
use FmTod\IdeHelperActions\Tests\stubs\EmptyAction;
use FmTod\IdeHelperActions\Tests\stubs\Jobs\WithDecoratorAction;
use FmTod\IdeHelperActions\Tests\stubs\Jobs\WithoutDecoratorAction;

it('cannot find a method that is not there', function() {
    $ai = $ai = getActionInfo(EmptyAction::class);
    $method = invade(new DocBlockGeneratorBase())->findMethod($ai, 'handle');
    expect($method)->toBeNull();


});

it('can find a method in the correct precedence', function () {
    $ai = $ai = getActionInfo(WithDecoratorAction::class);
    /** @var \phpDocumentor\Reflection\Php\Method $method */
    $method = invade(new DocBlockGeneratorBase())->findMethod($ai, 'asJob', 'handle');
    expect($method->getName())->toBe('asJob');
});

it('can find a method in the correct precedence even when one is not present', function () {
    $ai = $ai = getActionInfo(WithoutDecoratorAction::class);
    /** @var \phpDocumentor\Reflection\Php\Method $method */
    $method = invade(new DocBlockGeneratorBase())->findMethod($ai, 'asJob', 'handle');
    expect($method->getName())->toBe('handle');
});
