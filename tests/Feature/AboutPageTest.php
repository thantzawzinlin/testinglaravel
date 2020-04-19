<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
   public function testCanViewAboutPage(){
       $response = $this->get('/about');
       $response ->assertStatus(200);
        $response->assertSee("About me");
   }
}
