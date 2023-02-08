<?php

use Lorisleiva\Actions\Concerns\AsJob;
use Lorisleiva\Actions\Concerns\AsObject;
use phpDocumentor\Reflection\Php\Class_;
use FmTod\IdeHelperActions\Service\ActionInfo;
use FmTod\IdeHelperActions\Service\ActionInfoFactory;
use FmTod\IdeHelperActions\Tests\stubs\BaseAction;
use FmTod\IdeHelperActions\Tests\stubs\NewAction;
use FmTod\IdeHelperActions\Tests\stubs\NotAnAction;
use FmTod\IdeHelperActions\Tests\stubs\TestAction;

it('creates a correct trait lookup', function() {
    $result = invade(new ActionInfoFactory())->loadFromPath(__DIR__ . '/stubs');

    expect($result)->toBeArray()->toMatchArray([
        BaseAction::class => [AsObject::class],
        NewAction::class => [AsObject::class, AsJob::class],
        TestAction::class => ActionInfo::ALL_TRAITS,
    ]);

    expect(collect($result)->keys()->toArray())->not()->toContain(NotAnAction::class);
});

it('creates correct ActionInfos', function (){
    $ai = getActionInfo(BaseAction::class);

    expect($ai->asObject)->toBeTrue();
    expect($ai->asCommand)->toBeFalse();

    expect($ai->classInfo instanceof  Class_)->toBeTrue();
    expect($ai->classInfo)->not()->toBeNull();
});

it('parses the classes correctly', function() {
    $result = invade(new ActionInfoFactory())->loadPhpDocumentorReflectionClassMap(__DIR__ . '/stubs');

    $keys = collect($result)->keys()->toArray();
    expect($keys)->toContain(NotAnAction::class, BaseAction::class, NotAnAction::class, TestAction::class);
});
