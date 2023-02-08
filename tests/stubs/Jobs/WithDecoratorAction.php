<?php

namespace FmTod\IdeHelperActions\Tests\stubs\Jobs;

use Lorisleiva\Actions\Concerns\AsJob;

class WithDecoratorAction
{
    use AsJob;

    public function handle(){}

    public function asJob(int $i):void{}

}
