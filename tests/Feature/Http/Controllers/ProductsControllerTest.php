<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use DatabaseTransactions;

    function testIndexShouldNotFail(): void
    {
        $this->getJson(route('products.index'))
            ->assertSuccessful();
    }
}
