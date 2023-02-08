<?php

namespace FmTod\IdeHelperActions\Tests\stubs;
use Lorisleiva\Actions\Concerns\AsAction;


class TestAction
{
    use AsAction;


    /**
     * @returns int
     */
    public function handle(...$someArguments)
    {
        // Your action logic here...
    }
}
