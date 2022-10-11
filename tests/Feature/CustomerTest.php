<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // To fake events (not fire any Events)
        Event::fake();
    }

    /** @test */
    public function only_logged_in_user_can_see_customer_list()
    {
        $response = $this->get('/customers')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_see_customer_list()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/customers')->assertOk();
    }

    /** @test */
    public function customer_can_be_added_through_form()
    {
        // To view full error msg
        // $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $response = $this->post('/customers', $this->data());

        $this->assertCount(1, Customer::all());
    }

    /** @test */
    public function name_is_required()
    {
        $this->actingAsAdmin();

        $response = $this->post('/customers', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function name_is_at_least_3_chars()
    {
        $this->actingAsAdmin();

        $response = $this->post('/customers', array_merge($this->data(), ['name' => 'a']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function email_is_required()
    {
        $this->actingAsAdmin();

        $response = $this->post('/customers', array_merge($this->data(), ['email' => '']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function valid_email_is_required()
    {
        $this->actingAsAdmin();

        $response = $this->post('/customers', array_merge($this->data(), ['email' => 'testtesttest']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());
    }

    private function data()
    {
        return [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'status' => 1,
            'company_id' => 1
        ];
    }

    private function actingAsAdmin()
    {
        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@email.com'
        ]));
    }
}
