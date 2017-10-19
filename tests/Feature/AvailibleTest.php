<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class AvailibleTest extends TestCase
{

    public function setUp(){
        parent::setUp();
        $this->seed('TicketTableSeeder');
    }

    public function tearDown(){
        parent::tearDown();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/seats/byseance/1');
        $response->assertSeeText('Свободно');;
        $response->assertStatus(200);
    }
}
