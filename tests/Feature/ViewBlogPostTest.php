<?php

namespace Tests\Feature;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewBlogPostTest extends TestCase
{
     use DatabaseMigrations;
    public function testCanViewBlogPost(){

        //Arrangement
        //creating a blog post
        $post=Post::create([
            'title'=>'A simple title',
            'body'=>'Some Text'
        ]);

    //Action
    //visiting a route
    $response= $this->get("/post/{$post->id}");
    
    //Assert
    //assert status code 200
    $response->assertStatus(200);
    //assert that we see post title
    $response->assertSee($post->title);
    
    //assert that we see post body
    $response->assertSee($post->body);
    //assert that we see published date
    $response->assertSee($post->created_at->toFormattedDateString());

    }
    /**
     * @group post-not-found
     * @return[type][description]
     * 
     */
    public function testPage404(){
        //action
        $resp=$this->get('/post/INVALID_ID');

        //assert

        $resp->assertStatus(404);
        $resp->assertSee('The page can not be found');
    }
    

}
