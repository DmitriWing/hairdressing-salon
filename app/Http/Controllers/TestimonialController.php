<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;       // authentication service


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $testimonials = Testimonial::orderBy('created_at')->get();
        
        return response()->view('dashboard.testimonials.listTestimonials', compact('testimonials'));
    }

    /**
     * Display a listing of the resource on public site.
     */
    public function testimonialList(): Response
    {
        $testimonials = Testimonial::orderBy('created_at')->get();

        return response()->view('publicsite.home', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'testimonial' => ['required'],
        ]);

        
        Testimonial::create([
            'body' => $request->testimonial,
            'user_id' => Auth::id(),
            ]);

        return Redirect::route('home');
        // return response()->view('publicsite.createtestimonial');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();
        // return Redirect::route('profile.edit')->with('status', 'avatar-updated');
        return redirect('/listtestimonials')->with('status', 'Отзыв удален');
    }
}
