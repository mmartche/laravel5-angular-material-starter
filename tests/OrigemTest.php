<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrigemTest extends TestCase
{
    public function testCreateOrigemSuccessfully()
    {
        $origem = factory(App\Origem::class)->make();

        $this->origem('/api/origem', [
			'name' => $origem->name
		])->seeApiSuccess()
		->seeJsonObject('origem')
		->seeJson([
			'name' => $origem->name
		]);

		$this->seeInDatabase('origem',[
			'name' => $origem->name
		]);
    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
