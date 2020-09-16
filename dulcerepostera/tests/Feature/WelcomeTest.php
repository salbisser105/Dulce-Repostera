<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_create_new_()
    {
        $this->assertDatabaseHas('posts',[
            'name' => 'El pan de canela es bueno',
        ]);
    }

    public function test_list_page_show()
    {
        $this->get('/product/create')
            ->assertSee('Create Product');
    }
}
