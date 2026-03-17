<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Feature;
use App\Models\Clarifi;
use App\Models\GetAll;
use App\Models\Faq;
use App\Models\Usability;
use App\Models\Connect;

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

    public function GetUsability()
    {
        $usability  = Usability::find(1);
        return view('admin.backend.usability.get_usability', compact('usability'));
    }
    //End Method

    public function UpdateUsability(Request $request)
    {
        $usability_id = $request->id;
        $usability = Usability::findOrFail($usability_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(560, 400)->save(public_path('upload/usability/' . $name_gen));
            $save_url = 'upload/usability/' . $name_gen;

            if ($usability->image && file_exists(public_path($usability->image))) {
                @unlink(public_path($usability->image));
            }

            $usability->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,
                'image' => $save_url,
            ]);
        } else {
            $usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,
            ]);
        }

        $notification = array(
            'message' => 'Usability updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method

    public function AllConnect()
    {
        $connect = Connect::latest()->get();

        return view('admin.backend.connect.all_connect', compact('connect'));
    }

    //End Method

    public function AddConnect()
    {

        return view('admin.backend.connect.add_connect');
    }
    // End Method

    public function StoreConnect(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Connect::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Add Connect Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.connect')->with($notification);
    }

    //End Method

    public function EditConnect($id)
    {
        $connect = Connect::find($id);
        return view('admin.backend.connect.edit_connect', compact('connect'));
    }

    //End Method


    public function UpdateConnect(Request $request)
    {

        $con_id = $request->id;
        Connect::find($con_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Update Connect Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }

    //End Method

    public function DeleteConnect($id)
    {
        connect::find($id)->delete();

        $notification = array(
            'message' => 'Delete Connect Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //End Method


    public function UpdateConnectTable(Request $request, $id)
    {
        $connect = Connect::findOrFail($id);
        $connect->update($request->only(['title', 'description']));

        return response()->json(['success' => true, 'message' => 'Update Succesfully']);
    }

    //End Method 

    public function AllFaq()
    {
        $faq = Faq::latest()->get();

        return view('admin.backend.faq.all_faq', compact('faq'));
    }

    //End Method

    public function AddFaq()
    {

        return view('admin.backend.faq.add_faq');
    }
    // End Method

    public function StoreFaq(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Faq::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Add FAQ Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);
    }

    //End Method

    public function EditFaq($id)
    {
        $faq = Faq::find($id);
        return view('admin.backend.faq.edit_faq', compact('faq'));
    }

    //End Method


    public function UpdateFaq(Request $request)
    {

        $faq_id = $request->id;
        faq::find($faq_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Update FAQ Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }

    //End Method

    public function DeleteFaq($id)
    {
        faq::find($id)->delete();

        $notification = array(
            'message' => 'Delete FAQ Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //End Method
}
