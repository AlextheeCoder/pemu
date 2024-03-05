<?php

namespace App\Http\Controllers;

use DOMDocument;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Visit;
use GuzzleHttp\Client;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;

class BlogController extends Controller
{
    //

    public function index(Request $request){
        $ip = $request->getClientIp();
    
        if ($ip == '127.0.0.1' || $ip == '::1') {
            $ip = 'localhost';
        }
    
        $location = Location::get($ip);
        $city = $location->cityName;
        $country = $location->countryName;
        $countrycode = $location->countryCode;
    
        Visit::create([
            'visited_on' => Carbon::today(),
            'ip_address' => $ip,
            'country_name' => $country, 
            'city' => $city,
            'country_code' => $countrycode
        ]);
    
        $latestblogs = Blog::latest('created_at')->limit(3)->get();
       
        return view('index', ['latestblogs' => $latestblogs]); 
    }
    




    
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('Images', 'public');
        }

        $formFields['user_id'] = auth()->id();
        info($formFields);
        Log::info('Request data:', $request->all());
        Blog::create($formFields);

        return redirect('/pemu/admin/view/blogs')->with('message', 'Blog created successfully!');
    }
////////////////////////////////
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.pages.edit-blog', compact('blog'));
    }

    
 
            public function update(Request $request, $id){
                    $blog = Blog::findOrFail($id);

                    

                    // Validate the form data
                    $formFields = $request->validate([
                        'title' => 'required',
                        'category' => 'required',
                        'tags' => 'required',
                        'content' => 'required',
                        'status' => 'required',
                    ]);

                    // Retrieve the path of the existing image
                    $existingImagePath = $blog->image;

                    // Update the blog data
                    $blog->title = $request->title;
                    $blog->category = $request->category;
                    $blog->tags = $request->tags;
                    $blog->content = $request->content;
                    $blog->status = $request->status;

                    // Check if a new image file was uploaded
                    if ($request->hasFile('image')) {
                        // Delete the existing image
                        if ($existingImagePath) {
                            Storage::disk('public')->delete($existingImagePath);
                        }

                        // Store the new image
                        $formFields['image'] = $request->file('image')->store('Images', 'public');
                    }

                    $blog->update($formFields);

                    return redirect('/pemu-admin')->with('message', 'Blog updated successfully.');
                }



                public function delete(Blog $blog){
            
                    
                    
                    if($blog->image && Storage::disk('public')->exists($blog->image)) {
                        Storage::disk('public')->delete($blog->image);
                    }
                    $blog->delete();
                    return redirect('/pemu-admin')->with('message', 'Blog deleted successfully');
                    
                }
                
    
///////////////////////////////

    public function popularTags(){
    $popularTags = DB::table('blogs')
        ->select(DB::raw('tags, COUNT(*) as tag_count'))
        ->groupBy('tags')
        ->orderByDesc('tag_count')
        ->limit(12)
        ->get();

    return $popularTags;
}
public function popularCategories()
{
    $popularCategories = DB::table('blogs')
        ->select('category', DB::raw('COUNT(*) as category_count'))
        ->groupBy('category')
        ->orderByDesc('category_count')
        ->limit(5)
        ->get();

    return $popularCategories;
}


    public function blogs(Request $request){

        $latestblogs = Blog::latest('created_at')->limit(4)->get();
        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $blogs = Blog::where('tags', 'like', '%' . $tag . '%')->paginate(10);
        }
        elseif ($request->has('category')) {
            $category = $request->input('category');
            $blogs = Blog::where('category', $category)->paginate(10);
        } 
        elseif ($request->has('search')) {
            $search = $request->input('search');
            $blogs = Blog::where('title', 'like', '%' . $search . '%')
                                ->orWhere('content', 'like', '%' . $search . '%')
                                ->orWhere('category', 'like', '%' . $search . '%')
                                ->paginate(10);
        } 
        else {
            $blogs = Blog::paginate(10);
        }
        $popularTags = $this->popularTags();
        $popularCategories = $this->popularCategories(); 

        return view('pages.blogs', [
            'blogs' => $blogs,
            'latestblogs' => $latestblogs,
            'popularTags' => $popularTags,
            'popularCategories' => $popularCategories,
            'selectedTag' => $request->input('tag'),
            'selectedCategory' => $request->input('category'),
        ]);
    }











    /////////////////////
    public function blogdetail(Request $request, $id){
        // Load comments for the campaign
        


        $latestblogs = Blog::latest('created_at')->limit(4)->get();
        $blog = Blog::find($id);
        $comments = $blog->comments()->whereNull('parent_id')->latest()->get();
    
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); 
        $dom->loadHTML($blog->content);
    
        // Update class attribute for images
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $image->setAttribute('class', 'custom-img');
        }
    
        // Update class attribute for iframe video elements
        $videos = $dom->getElementsByTagName('iframe');
        foreach ($videos as $video) {
            $video->setAttribute('class', 'custom-video');
        }

        $texts =$dom->getElementsByTagName('p');
        foreach ($texts as $text) {
            $text->setAttribute('class', 'custom-text');
        }
    
        $updatedBlogContent = $dom->saveHTML();
        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $blogs = Blog::where('tags', 'like', '%' . $tag . '%')->paginate(10);
        }
        elseif ($request->has('category')) {
            $category = $request->input('category');
            $blogs = Blog::where('category', $category)->paginate(10);
        }  
        else {
            $blogs = Blog::paginate(10);
        }
        $popularTags = $this->popularTags();
        $popularCategories = $this->popularCategories();
        $blog->increment('views');
        return view('pages.blog-detail', [
            'blog' => $blog, 
            'latestblogs'=>$latestblogs, 
            'updatedBlogContent'=>$updatedBlogContent,
            'popularTags'=>$popularTags,
            'comments' => $comments,
            'popularCategories' => $popularCategories,
            'selectedTag' => $request->input('tag'),
            'selectedCategory' => $request->input('category'),
        ]);
    }
    
    ///////////////////////////


    public function storeComment(Request $request, Blog $blog)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website'=>'nullable',
            'body' => 'required|max:1000',
          
        ]);
    
        $comment = new Comment;
        $comment->fill($formFields); 
    
        // Check if a parent_id (indicating a reply) was provided and set it
        if ($request->filled('parent_id')) {
            $comment->parent_id = $request->parent_id;
        } 
    
        // Save the comment to the blog
        $comment->blog_id = $blog->id; 
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    
}


