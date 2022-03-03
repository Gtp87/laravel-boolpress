<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(5);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $slug = Str::slug($data['name'], '-');

        $categorySlugControl = Category::where('slug', $slug)->first();


        $counter = 0;
        while ($categorySlugControl) {
            $newSlug = $slug . '-' . $counter;
            $categorySlugControl = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        $category = new Category();
        $category->name = $data['name'];
        if ($categorySlugControl) {
            $category->slug = $newSlug;
        } else {
            $category->slug = $slug;
        }


        $save = $category->save();

        if (!$save) {
            dd('Save failed...');
        }

        return redirect()->route('admin.categories.show', $category->id);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $slug = Str::slug($data['name'], '-');


        $categorySlugControl = Category::where('slug', $slug)->first();

        $counter = 0;
        while ($categorySlugControl) {
            $newSlug = $slug . '-' . $counter;
            $categorySlugControl = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        $category->name = $data['name'];
        if ($categorySlugControl) {
            $category->slug = $newSlug;
        } else {
            $category->slug = $slug;
        }


        $save = $category->update();

        if (!$save) {
            dd('Update failed...');
        }

        return redirect()->route('admin.categories.show', $category->id);
    }

    public function destroy(Category $category, Post $posts)
    {
        $category->delete();
        $postsNull = Post::whereNull('category_id')->get();

        foreach ($postsNull as $post) {
            $post->category_id = 1;
            $post->update();
        }

        return redirect()->route('admin.categories.index')->with('status', "Category $category->name deleted");
    }
}
