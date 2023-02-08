<?php

namespace FmTod\IdeHelperActions\Service\Generator\DocBlock;

use FmTod\IdeHelperActions\Service\ActionInfo;

interface DocBlockGeneratorInterface
{
    public static function create(): self;

    /**
     * @param  \FmTod\IdeHelperActions\Service\ActionInfo  $info
     * @return \phpDocumentor\Reflection\DocBlock\Tag[]
     */
    public function generate(ActionInfo $info): array;
}
