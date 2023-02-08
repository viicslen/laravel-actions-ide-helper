<?php


namespace FmTod\IdeHelperActions\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsListener;

class AsListenerGenerator extends DocBlockGeneratorBase
{
    protected string $context = AsListener::class;
}
