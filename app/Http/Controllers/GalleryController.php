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
    public function index(Request $request): Response
    {
        // $images = Gallery::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('title')->get();
        $selectedCategories = $request->input('category');
        $query = Gallery::query();
        if ($selectedCategories) {
            $query->whereIn('category_id', $selectedCategories);
        }else{
            $query->orderBy('created_at', 'desc')->get();
        }
        $images = $query->get();
        return response()->view('dashboard.gallery.listImages', compact('images', 'categories', 'selectedCategories'));
    }

    /**
     * Filtering images on he public site
     */
    public function indexPublic(Request $request): Response
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('title')->get();
        $selectedCategories = $request->input('category');
        $query = Gallery::query();

        if ($selectedCategories) {
            $query->whereIn('category_id', $selectedCategories)->where('publishing', true);
        }else{
            $query->where('publishing', true)->orderBy('created_at', 'desc')->get();
        }
        $images = $query->get();

        return response()->view('publicsite.gallery.gallery', compact('categories', 'images', 'comments', 'selectedCategories'));
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
            // Redirect back to the form with a status message
            return redirect()->back()->with('status', 'Изображения добавлены в галерею');
        }else{
            // Redirect back to the form with a error message
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
     * Update the image's category.
     */
    public function update(Request $request, Gallery $image): RedirectResponse
    {
        // dd($request->all());
        $categoryIds = $request->input('category_id');
        foreach ($categoryIds as $galleryId => $categoryId) {
            $gallery = Gallery::find($galleryId);
            $gallery->category_id = $categoryId;
            $gallery->save();
        }
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
