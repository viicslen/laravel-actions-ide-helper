<?php

namespace FmTod\IdeHelperActions\Tests\stubs\Object;

use Lorisleiva\Actions\Concerns\AsAction;

class ObjectAction
{
    use AsAction;

    public function handle(string $string, float|int $number): int|string {
        return 0;
    }

}
