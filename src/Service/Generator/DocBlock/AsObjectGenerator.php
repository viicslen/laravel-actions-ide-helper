<?php


namespace FmTod\IdeHelperActions\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsObject;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use FmTod\IdeHelperActions\Service\ActionInfo;

class AsObjectGenerator extends DocBlockGeneratorBase
{
    protected string $context = AsObject::class;

    /**
     * @param  \FmTod\IdeHelperActions\Service\ActionInfo  $info
     * @return \phpDocumentor\Reflection\DocBlock\Tag[]
     */
    public function generate(ActionInfo $info): array
    {
        /** @var Method $method */
        $method = $this->findMethod($info, 'handle');
        return $method === null ? [] : [new Custom\Method('run', $method->getArguments(), $method->getReturnType(), true)];
    }
}
