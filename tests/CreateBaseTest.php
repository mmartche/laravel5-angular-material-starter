<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateBaseTest extends TestCase
{
    public function testCreatePostSuccessfully()
    {
        $base = factory(App\Base::class)->make();

        $this->base('/api/base', [
			'name' => $base->name,
			'topic' => $base->topic,
		])->seeApiSuccess()
		->seeJsonObject('base')
		->seeJson([
			'name' => $base->name,
			'topic' => $base->topic,
		]);

		$this->seeInDatabase('base',[
			'name' => $base->name,
			'topic' => $base->topic,
		]);
    }
}
