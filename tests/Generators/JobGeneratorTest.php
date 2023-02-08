<?php

use Lorisleiva\Actions\Decorators\JobDecorator;
use Lorisleiva\Actions\Decorators\UniqueJobDecorator;
use FmTod\IdeHelperActions\Service\Generator\DocBlock\AsJobGenerator;
use FmTod\IdeHelperActions\Service\Generator\DocBlock\AsObjectGenerator;
use FmTod\IdeHelperActions\Tests\stubs\Jobs\WithDecoratorAction;
use FmTod\IdeHelperActions\Tests\stubs\Jobs\WithoutDecoratorAction;

it('runs without an error', function (string $class, array $expectations) {
    $ai = getActionInfo($class);

    $docblock = collect((new AsJobGenerator())->generate($ai));

    expect($docblock->count())->toEqual(8);

    $all = $docblock->map(fn($item) => $item->render())->implode(PHP_EOL);
    foreach ($expectations as $expectation) {
        expect($all)->toContain($expectation);
    }
})->with([
    // Just one Method as an example
    'with decorator' => [
        WithDecoratorAction::class, [
            '@method static \\'.JobDecorator::class.'|\\'.UniqueJobDecorator::class.' makeJob(int $i)',
        ],
    ],
    'without decorator' => [
        WithoutDecoratorAction::class, [
            '@method static \\'.JobDecorator::class.'|\\'.UniqueJobDecorator::class.' makeJob()',
        ],
    ],

]);
