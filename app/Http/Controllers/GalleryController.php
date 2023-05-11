<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $images = Gallery::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('title')->get();
        return response()->view('dashboard.gallery.listImages', compact('images', 'categories'));
    }

    /**
     * Display a listing of the resource on public site.
     */
    public function indexPublic(): Response
    {
        $images = Gallery::where('publishing', true)
        ->orderBy('created_at', 'desc')
        ->get();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return response()->view('publicsite.gallery', compact('images', 'comments'));
    }

    /**
     * Publishing of checked images
     */
    public function publishImage(Request $request, $imageId): RedirectResponse
    {
        $image = Gallery::find($imageId);
        // Retrieve the value of the checkbox
        $publishing = $request->has('image_'.$imageId);
        // Update the publishing column of the image
        $image->publishing = $publishing;
        $image->save();
        return back();
    }

    /**
     * Show the form for creating a new images.
     */
    public function create(): Response
    {
        $categories = Category::orderBy('title')->get();
        return response()->view('dashboard.gallery.addImages', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $validatedData = $request->validate([
            'category' => 'required|exists:categories,id',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Adjust max file size as needed
        ]);

        if (null !== $request->file('image')) {
            foreach ($request->file('image') as $file) {
                // Generate a unique filename for each image
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
                // Save the image to the "uploads" folder
                $file->move(public_path('/images/gallery'), $filename);
        
                // Save the image data to the database
                $gallery = new Gallery;
                $gallery->category_id = $validatedData['category'];
                $gallery->image = $filename;
                if ($request->has('publishing')) {
                    $gallery->publishing = true;
                }
                $gallery->save();
            }
            // Redirect back to the form with a success message
            return redirect()->back()->with('status', 'Изображения добавлены в галерею');
        }else{
            // Redirect back to the form with a success message
            return redirect()->back()->withErrors('Ошибка добавления фото');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery): Response
    {
        $categories = Category::orderBy('title')->get();
        return response()->view('dashboard.gallery.editImages', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $image): RedirectResponse
    {
        $image->update([
            'category_id' => $request->category,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $image): RedirectResponse
    {
        // Delete the image file from the "uploads" folder
        unlink(public_path('images/gallery/' . $image->image));
        // Delete the image from the database
        $image->delete();

        // Redirect the user back to the gallery page with a success message
        return redirect()->back()->with('success', 'Фото успешно удалено.');
    }
}
