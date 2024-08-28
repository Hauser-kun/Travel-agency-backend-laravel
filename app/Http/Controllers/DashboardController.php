<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\artical;
use App\Models\TourPackage;
use App\Models\TourPlace;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DashboardController extends Controller
{
    // This will redirect us to blog page 
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(6);

        return view('front.dashboard.blog', [
            'blogs' => $blogs
        ]);
    }
    public function news()
    {

        $News = artical::orderBy('created_at', 'DESC')->paginate(6);
        return view('front.dashboard.news', [
            'News' => $News
        ]);
    }
    public function packages()
    {
        $package = TourPackage::orderBy('created_at', 'DESC')->paginate(6);
        return view('front.dashboard.Tour_package', [
            'packages' => $package
        ]);
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
                File::delete(public_path('uploads/artical/' . $News->image));

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

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

    public function deleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        File::delete(public_path('uploads/blogs/' . $blogs->image));

        $blogs->delete();

        return redirect()->route('account.blogs')->with('success', "The Blog is Deleted Succesfully");
    }

    public function deleteNews($id)
    {
        $News = artical::findOrFail($id);

        File::delete('uploads/artical/' . $News->image);

        $News->delete();

        return redirect()->route('account.news')->with('success', "The News is Deleted Successfully");
    }


    public function createPackage()
    {

        return view('front.dashboard.createPackages');
    }

    // For storing the add packages 

    public function addPackages(Request $request)
    {

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpge,webp',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
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
        } else {
            return redirect()->route('account.createPackage')->withInput()->withErrors($validator);
        }
    }

    public function editPackages($id)
    {
        $packages = TourPackage::findOrFail($id);

        return view('front.dashboard.editPackages', [
            'packages' => $packages
        ]);
    }

    public function updatePackages(Request $request, $id)
    {

        $packages = TourPackage::findOrFail($id);


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

            // Updating the data on the database 
            $packages->title = $request->title;
            $packages->location = $request->location;
            $packages->period = $request->period;
            $packages->details = $request->details;
            $packages->description = $request->description;
            $packages->price = $request->price;
            $packages->slug = $request->slug;

            $packages->video = $request->video;
            $packages->status = $request->status;
            $packages->save();

            if ($request->image != "") {
                File::delete(public_path('uploads/tour/' . $packages->image));

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                $path = 'uploads/tour/';
                $file->move($path, $filename);
                $packages->image = $filename;
                $packages->save();
            }

            if ($request->video != "") {

                file::delete(public_path('uploads/tour_video' . $packages->video));

                $file = $request->file('video');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                $path = 'uploads/tour_video';
                $file->move($path, $filename);
                $packages->video = $filename;
                $packages->save();
            }

            return redirect()->route('account.packages')->with('success', 'The updation was succcessfull');
        } else {
            return redirect()->route('account.editPackages')->withInput()->withErrors($validator);
        }
    }

    public function deletepackage($id)
    {

        $package = TourPackage::findOrFail($id);

        File::delete('uploads/tour/' . $package->image);
        if ($package->video) {

            File::delete('uploads/tour_video/' . $package->video);
        }

        $package->delete();

        return redirect()->route('account.packages')->with('success', "The Package is Deleted Successfully");
    }

    public function places(){
        $places = TourPlace::orderBy('created_at', 'desc')->paginate(6);
        return view('front.dashboard.places',[
            'places'=> $places
        ]);
    }

    public function createPlaces(){
        return view('front.dashboard.createPlaces');
    }

    public function addPlaces(Request $request){

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpge,webp',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $Places = new TourPlace();
            $Places->title = $request->title;
            $Places->location = $request->location;
            $Places->period = $request->period;
            $Places->details = $request->details;
            $Places->description = $request->description;
            $Places->price = $request->price;
            $Places->slug = $request->slug;
            $Places->image = $request->image;
            $Places->video = $request->video;
            $Places->status = $request->status;

            if ($request->has('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/places/';
                $file->move($path, $filename);
                $Places->image =  $filename;
            } else {
                return redirect()->route('account.createPlaces')->withInput()->with('error', "Image is Either blank or Not Supported");
            }


            if ($request->has('video')) {
                $file = $request->file('video');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = 'uploads/places_video/';
                $file->move($path, $filename);
                $Places->video =  $filename;
            }


            $Places->save();

            session()->flash('success', "News Places Inserted Successfully");
            return redirect()->route('account.places');

        } else {
            return redirect()->route('account.createPlaces')->withInput()->withErrors($validator);
        }

    }

    public function editPlaces($id){
        $places = TourPlace::findOrFail($id);

        return view('front.dashboard.editPlaces',[
            'places' => $places
        ]);
    }

    public function updatePlaces(Request $request, $id){

        $places = TourPlace::findOrFail($id);


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

            // Updating the data on the database 
            $places->title = $request->title;
            $places->location = $request->location;
            $places->period = $request->period;
            $places->details = $request->details;
            $places->description = $request->description;
            $places->price = $request->price;
            $places->slug = $request->slug;

            $places->video = $request->video;
            $places->status = $request->status;
            $places->save();

            if ($request->image != "") {
                File::delete(public_path('uploads/places/' . $places->image));

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                $path = 'uploads/places/';
                $file->move($path, $filename);
                $places->image = $filename;
                $places->save();
            }

            if ($request->video != "") {

                file::delete(public_path('uploads/places_video' . $places->video));

                $file = $request->file('video');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                $path = 'uploads/places_video';
                $file->move($path, $filename);
                $places->video = $filename;
                $places->save();
            }

            return redirect()->route('account.places')->with('success', 'The updation was succcessfull');
        } else {
            return redirect()->route('account.editPlaces')->withInput()->withErrors($validator);
        }

    }

    public function deleteplaces($id){

        $places = TourPlace::findOrFail($id);

        File::delete('uploads/places/' . $places->image);
        if ($places->video) {

            File::delete('uploads/places_video/' . $places->video);
        }

        $places->delete();

        return redirect()->route('account.places')->with('success', "The Package is Deleted Successfully");

    }

    public function users(){

        $users = User::orderBy('created_at','desc')->paginate(6);
        return view('front.dashboard.users',[
            'users' => $users
        ]
    );
    }

    public function createUsers(){
        return view('front.dashboard.createUsers');
    }

    public function addUsers(Request $request){

        $rules=[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){

            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->role = $request->role;
            $users->save();


            return redirect()->route('account.users')->with('success', "Registration Successfull!!");


        }
        else
        {
            return redirect()->route('account.createUsers')->withInput()->withErrors($validator);
        }
        
    }

    public function editUsers($id){

        $users= User::findOrFail($id);

        return view('front.dashboard.editUsers',[
            'users' => $users
        ]);
    }

    public function updateUser(Request $request,$id){
        $users = User::findOrFail($id);

        $rules=[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->passes()){
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->role = $request->role;
            $users->save();

            return redirect()->route('account.users')->with('success', "User Updation Successfull !!");

        }
        else{
            return redirect()->route('account.editUsers')->withInput()->withErrors($validator);
           
        }
    }



    public function deleteUsers($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('account.users')->with('success', " User Deleted!!");

    }

   
}
