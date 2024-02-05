<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $response['banners']=BannerFacade::all();
        return view('pagers.banners.index')->with($response);
    }

    public function store(Request $request)
    {
        // return $request;
        if ($request->File('image')) {
            $post_image = $request->file('image');
          
            // Check if the file is valid
            if ($post_image->isValid()) {
                $name_gen = hexdec(uniqid());
                $img_extention = strtolower($post_image->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_extention;                                  
                $upload_location = 'image/post/'; //automatically creating the path 
                $url = $upload_location . $img_name;
    
                // Move the uploaded file
                $post_image->move(public_path($upload_location), $img_name);
    
                $title = $request->input('title');
    
                // Validate data
                $validatedData = $request->validate([
                    'title' => 'required',
                ]);
    
                // Create a new banner
                Banner::create([
                    'title' => $validatedData['title'],
                    'url' => 'http://127.0.0.1:8000/' . $url,
                ]);
    
                return redirect()->back()->with('success', 'Banner created successfully.');
            } else {
                return redirect()->back()->with('error', 'Invalid file.');
            }
        } else {
            return redirect()->back()->with('error', 'No file uploaded.');
        }
    }

    public function delete($banner_id){
        BannerFacade::delete($banner_id);
        return redirect()->back();
    }

    public function status($banner_id){
        BannerFacade::status($banner_id);
        return redirect()->back();
    }
}
