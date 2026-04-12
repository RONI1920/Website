<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FrontendController extends Controller
{
    public function OurTeam()
    {
        return view('home.team.team_page');
    }

    // End Method

    public function AboutUs()
    {
        return view('home.about.about_us');
    }

    // End Method

    public function GetAboutUs()
    {
        $about = About::find(1);
        return view('admin.backend.about.get_about', compact('about'));
    }
    // End Method

    // Update Slider Manual (Via Form)
    public function UpdateAboutUs(Request $request)
    {
        $about_id = $request->id;
        $about = About::findOrFail($about_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(526, 550)->save(public_path('upload/about/' . $name_gen));
            $save_url = 'upload/about/' . $name_gen;

            if ($about->image && file_exists(public_path($about->image))) {
                @unlink(public_path($about->image));
            }

            $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);
        } else {
            $about->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        $notification = array(
            'message' => 'About updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method
}
