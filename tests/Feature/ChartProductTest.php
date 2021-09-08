<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Thread;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    // public function test_guests_cannot_store_threads(){
    //     $this->withoutExceptionHandling();
    //     $this->expectException('\Illuminate\Auth\AuthenticationException');
    //     $thread = make('App\Thread');
    //     $this->post(route('thread.store', $thread->toArray()));
    // }

    // public function test_guests_cannot_create_threads(){
    //     $response = $this->get(route('thread.create'));
    //     $response->assertRedirect('/login');
        
    // }

    // public function test_authenticated_user_can_store_thread()
    // {
    //     $this->withoutExceptionHandling();
    //     $this->signIn();
    //     $thread = make('App\Thread');
    //     $postResponse = $this->post(route('thread.store', $thread->toArray()));
    //     $getResponse = $this->get($postResponse->headers->get('Location'));
    //     $getResponse->assertSee($thread->title);
    //     $getResponse->assertSee($thread->body);

    // }

    // public function test_thread_requires_title(){
    //     $response = $this->publishThread(['title' => null]);
    //     $response->assertSessionHasErrors('title');
    // }

    // public function test_thread_requires_body(){
    //     $response = $this->publishThread(['body' => null]);
    //     $response->assertSessionHasErrors('body');
    // }

    // public function test_thread_requires_channel_id(){
    //     factory('App\Channel', 2)->create();
    //     $this->publishThread(['channel_id' => null])
    //         ->assertSessionHasErrors('channel_id');

    //     $this->publishThread(['channel_id' => 999])
    //         ->assertSessionHasErrors('channel_id');
    // }

    // public function publishThread($overrides = []){
    //     $this->signIn();

    //     $thread = make('App\Thread', $overrides);
    //     return $this->post(route('thread.store', $thread));
    // }

    public function test_guest_cannot_buy_chart(){
        $shoppingcartitem = create('App\Models\ShoppingCartItem');

        $response = $this->json('DELETE', route('shoppingcartitem.create', [$shoppingcartitem->id]));

        $response->assertStatus(401);
    }

    public function test_authenticated_can_buy_chart(){
        $this->signIn();

        $shoppingcartitem = create('App\Models\ShoppingCartItem');
        
        $response = $this->json('DELETE', route('shoppingcartitem.create', [$shoppingcartitem->id]));
        $response->assertStatus(204);

        $this->assertSoftDeleted($thread);
    }

    public function test_guest_cannot_delete_thread(){
        $thread = create('App\Thread');

        $response = $this->json('DELETE', route('thread.delete', [$thread->channel->slug, $thread->id]));

        $response->assertStatus(401);
    }

    public function test_thread_can_be_deleted(){
        $this->signIn();

        $thread = create('App\Thread');
        
        $response = $this->json('DELETE', route('thread.delete', [$thread->channel->slug, $thread->id]));
        $response->assertStatus(204);

        $this->assertSoftDeleted($thread);
    }
}
