<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    public function GetSlider()
    {
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }

    // End Method

    public function UpdateSlider(Request $request)
    {

        $slider_id = $request->id;

        $slider = Slider::findOrFail($slider_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .
                $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306, 618)->save(public_path('upload/slider/' . $name_gen));
            $save_url = 'upload/slider/' . $name_gen;


            if ($slider->image && file_exists(public_path($slider->image))) {
                @unlink(public_path($slider->image));
            }

            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider update With Image Successfully',
                'alert-type' => 'success'
            );
        } else {
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
            ]);

            $notification = array(
                'message' => 'Slider update With Image Successfully',
                'alert-type' => 'success'
            );
        }


        return redirect()->back()->with($notification);
    }

    //End Method
}
