<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Feature;
use App\Models\Clarifi;
use App\Models\GetAll;

class HomeController extends Controller
{
    public function AllFeature()
    {
        $feature = Feature::latest()->get();

        return view('admin.backend.feature.all_feature', compact('feature'));
    }

    // End Method

    public function AddFeature()
    {

        return view('admin.backend.feature.add_feature');
    }
    // End Method

    public function StoreFeature(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);


        Feature::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);



        $notification = array(
            'message' => 'Add Feature Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }

    //End Method

    public function EditFeature($id)
    {
        $feature = Feature::find($id);
        return view('admin.backend.feature.edit_feature', compact('feature'));
    }

    //End Method


    public function UpdateFeature(Request $request)
    {

        $fea_id = $request->id;
        Feature::find($fea_id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Update Feature Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }

    //End Method

    public function DeleteFeature($id)
    {
        Feature::find($id)->delete();

        $notification = array(
            'message' => 'Delete Feature Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //End Method

    public function GetClarifies()
    {
        $clarifi = Clarifi::find(1);
        return view('admin.backend.clarifi.get_clarifi', compact('clarifi'));
    }
    //End Method

    public function UpdateClarifies(Request $request)
    {
        $clar_id = $request->id;
        $clarifi = Clarifi::findOrFail($clar_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(302, 618)->save(public_path('upload/clarifi/' . $name_gen));
            $save_url = 'upload/clarifi/' . $name_gen;

            if ($clarifi->image && file_exists(public_path($clarifi->image))) {
                @unlink(public_path($clarifi->image));
            }

            $clarifi->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);
        } else {
            $clarifi::find($clar_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        $notification = array(
            'message' => 'Clarifies updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method

    public function GetAll()
    {
        $getall = GetAll::find(1);
        return view('admin.backend.getaLL.get_all', compact('getall'));
    }
    //End Method

    public function UpdateGetAll(Request $request)
    {
        $getall_id = $request->id;
        $getall = GetAll::findOrFail($getall_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(302, 618)->save(public_path('upload/getall/' . $name_gen));
            $save_url = 'upload/getall/' . $name_gen;

            if ($getall->image && file_exists(public_path($getall->image))) {
                @unlink(public_path($getall->image));
            }

            $getall->update([
                'title' => $request->title,
                'description' => $request->description,
                'feature_title1' => $request->feature_title1,
                'feature_title2' => $request->feature_title2,
                'feature_detail1' => $request->feature_detail1,
                'feature_detail2' => $request->feature_detail2,
                'image' => $save_url,
            ]);
        } else {
            $getall::find($getall_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'feature_title1' => $request->feature_title1,
                'feature_title2' => $request->feature_title2,
                'feature_detail1' => $request->feature_detail1,
                'feature_detail2' => $request->feature_detail2,
            ]);
        }

        $notification = array(
            'message' => 'Feature Get All updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method



}
