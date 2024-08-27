<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\artical;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // This will redirect us to blog page 
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();

        return view('front.dashboard.blog', [
            'blogs' => $blogs
        ]);
    }
    public function news()
    {

        $News = artical::orderBy('created_at', 'DESC')->get();
        return view('front.dashboard.news', [
            'News' => $News
        ]);
    }
    public function packages()
    {
        return view('front.dashboard.Tour_package');
    }
    public function createBlogs()
    {
        return view('front.dashboard.createBlog');
    }

    public function addBlogs(Request $request)
    {

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpge,webp',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $blogs = new Blog();
            $blogs->title = $request->title;
            $blogs->details = $request->details;
            $blogs->description = $request->description;
            $blogs->slug = $request->slug;
            $blogs->status = $request->status;


            if ($request->has('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/blogs/';
                $file->move($path, $filename);
                $blogs->image =  $filename;
            } else {
                return redirect()->route('account.createBlogs')->with('error', "Image is either blank or not eligiable")->withInput();
            }




            $blogs->save();

            session()->flash('success', 'Blogs Details Inserted Successfully');
            return redirect()->route('account.blogs');
        } else {
            return redirect()->route('account.createBlogs')->withInput()->withErrors($validator);
        }
    }


    public function createNews()
    {
        return view('front.dashboard.createNews');
    }


    public function addNews(Request $request)
    {

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpge,webp',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $artical = new artical();
            $artical->title = $request->title;
            $artical->details = $request->details;
            $artical->description = $request->description;
            $artical->slug = $request->slug;
            $artical->status = $request->status;


            if ($request->has('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/artical/';
                $file->move($path, $filename);
                $artical->image =  $filename;
            } else {
                return redirect()->route('account.createNews')->withInput()->with('error', "Image is Either blank or Not Supported");
            }




            $artical->save();

            session()->flash('success', "News Details Inserted Successfully");
            return redirect()->route('account.news');
        } else {
            return redirect()->route('account.createNews')->withInput()->withErrors($validator);
        }
    }

    public function editBlog($id)
    {
        $blogs = Blog::findOrFail($id);

        return view('front.dashboard.editblog', [
            'blogs' => $blogs
        ]);
    }

    public function updateBlog(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);
        // dd($blogs);
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',


        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {


            if ($request->image != "") {
                $rules['image'] = 'image';
            }

            // Storing The updated data to the database 
            $blogs->title = $request->title;
            $blogs->details = $request->details;
            $blogs->description = $request->description;
            $blogs->slug = $request->slug;
            $blogs->status = $request->status;
            $blogs->save();

            if ($request->image != "") {
                // To delete the existing image 
                File::delete(public_path('uploads/blogs/' . $blogs->image));

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                // sava the image to directory 
                $path = 'uploads/blogs/';
                $file->move($path, $filename);
                $blogs->image =  $filename;
                $blogs->save();
            }

            return redirect()->route('account.blogs')->with('success', "The Blogs Details are Updated Successfully");
        } else {
            return redirect()->route('account.editBlog')->withInput()->withErrors($validator);
        }
    }

    public function editNews($id)
    {
        $News = artical::findOrFail($id);

        return view('front.dashboard.editNews', [
            'News' => $News
        ]);
    }

    public function updateNews(Request $request, $id)
    {
        $News = artical::findOrFail($id);
   

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',


        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            if ($request->image != "") {
                $rules['image'] = 'image';
            }

            // Storing The updated data to the database 
            $News->title = $request->title;
            $News->details = $request->details;
            $News->description = $request->description;
            $News->slug = $request->slug;
            $News->status = $request->status;
            $News->save();


            if ($request->image != "") {
                // To delete the existing image 
                File::delete(public_path('uploads/artical/'.$News->image));

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename=time().'.'.$ext;

                // sava the image to directory 
                $path = 'uploads/artical/';
                $file->move($path, $filename);
                $News->image =  $filename;
                $News->save();
            }

            return redirect()->route('account.news')->with('success', "The News Details are Updated Successfully");



        } else {
            return redirect()->route('account.editNews')->withInput()->withErrors($validator);


        }
    }

    public function deleteBlog($id){
        $blogs=Blog::findOrFail($id);
        File::delete(public_path('uploads/blogs/'.$blogs->image));

        $blogs->delete();
        
        return redirect()->route('account.blogs')->with('success', "The Blog is Deleted Succesfully");


    }

    public function deleteNews($id){
        $News = artical::findOrFail
        ($id);

        File::delete('uploads/artical/'. $News->image);

        $News->delete();

        return redirect()->route('account.news')->with('success', "The News is Deleted Successfully");
    }

    public function createPackage(){
        $package = TourPackage::query()->get();
        return view('front.dashboard.createPackages',[
            'packages' => $package
        ]);

    }

    // For storing the add packages 

    public function addPackages(Request $request){

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpge,webp',

        ];

        $validator=Validator::make($request->all(),$rules);

        if($validator->passes()){
            $TourPackage = new TourPackage();
            $TourPackage->title = $request->title;
            $TourPackage->location = $request->location;
            $TourPackage->period = $request->period;
            $TourPackage->details = $request->details;
            $TourPackage->description = $request->description;
            $TourPackage->price = $request->price;
            $TourPackage->slug = $request->slug;
            $TourPackage->image = $request->image;
            $TourPackage->video = $request->video;
            $TourPackage->status = $request->status;

            if ($request->has('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/tour/';
                $file->move($path, $filename);
                $TourPackage->image =  $filename;
            } else {
                return redirect()->route('account.createPackage')->withInput()->with('error', "Image is Either blank or Not Supported");
            }


            if ($request->has('video')) {
                $file = $request->file('video');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/tour_video/';
                $file->move($path, $filename);
                $TourPackage->video =  $filename;
            } 


            $TourPackage->save();

            session()->flash('success', "News Packages Inserted Successfully");
            return redirect()->route('account.packages');


        }

        else{
            return redirect()->route('account.createPackage')->withInput()->withErrors($validator);
        }


    }
}
