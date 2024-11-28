<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingReviewTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $service;
    private $booking;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user
        $this->user = User::factory()->create();

        // Create a service provider
        $provider = User::factory()->create();

        // Create a service
        $this->service = Service::factory()->create([
            'user_id' => $provider->id,
            'title' => 'Test Service',
            'price' => 100.00,
            'is_active' => true,
        ]);

        // Create a completed booking
        $this->booking = Booking::create([
            'user_id' => $this->user->id,
            'service_id' => $this->service->id,
            'booking_date' => now()->addDay(),
            'status' => 'completed',
            'notes' => 'Test booking notes'
        ]);
    }

    /** @test */
    public function user_can_view_review_form_for_completed_booking()
    {
        $response = $this->actingAs($this->user)
            ->get(route('reviews.create', $this->booking));

        $response->assertStatus(200)
            ->assertViewIs('reviews.create')
            ->assertSee('Review Your Experience')
            ->assertSee($this->service->title);
    }

    /** @test */
    public function user_can_submit_review_for_completed_booking()
    {
        $reviewData = [
            'rating' => 5,
            'comment' => 'Excellent service, very professional!'
        ];

        $response = $this->actingAs($this->user)
            ->post(route('reviews.store', $this->booking), $reviewData);

        $response->assertRedirect(route('bookings.show', $this->booking));

        $this->assertDatabaseHas('reviews', [
            'booking_id' => $this->booking->id,
            'rating' => 5,
            'comment' => 'Excellent service, very professional!'
        ]);
    }
} 
