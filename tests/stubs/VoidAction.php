<?php

namespace FmTod\IdeHelperActions\Tests\stubs;

use Lorisleiva\Actions\Concerns\AsAction;

class VoidAction
{
    use AsAction;

    public function handle(int $i): void{}

}
