<?php
namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($booking->status !== 'completed') {
            abort(403, 'Can only review completed bookings.');
        }

        if ($booking->review) {
            return redirect()->route('reviews.edit', $booking->review);
        }

        return view('reviews.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        Review::create([
            'booking_id' => $booking->id,
            'user_id' => auth()->id(),
            'service_id' => $booking->service_id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->route('bookings.show', $booking);
    }

    public function update(Request $request, Review $review)
    {
        if ($review->booking->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        $review->update($validated);

        return redirect()
            ->route('bookings.show', $review->booking)
            ->with('success', 'Review updated successfully!');
    }
}
