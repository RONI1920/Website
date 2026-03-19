<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Team;

class TeamController extends Controller
{

    public function UploadTeam(Request $request)
    {
        $team_id = $request->id;
        $team = Team::findOrFail($team_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(301, 400)->save(public_path('upload/ourteam/' . $name_gen));
            $save_url = 'upload/ourteam/' . $name_gen;

            if ($team->image && file_exists(public_path($team->image))) {
                @unlink(public_path($team->image));
            }

            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
        } else {
            $team::find($team_id)->update([
                'name' => $request->name,
                'poition' => $request->position,
                'image' => $request->image,
            ]);
        }

        $notification = array(
            'message' => 'Our Team updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method

    public function AllTeam()
    {
        $team = Team::latest()->get();

        return view('admin.backend.team.all_team', compact('team'));
    }

    //End Method

    public function AddTeam()
    {

        return view('admin.backend.team.add_team');
    }
    // End Method
    public function StoreTeam(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .
                $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(60, 60)->save(public_path('upload/review/' . $name_gen));
            $save_url = 'upload/review/' . $name_gen;

            Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Our Team Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    //End Method

    public function EditTeam($id)
    {
        $team = Team::find($id);
        return view('admin.backend.team.edit_team', compact('team'));
    }

    //End Method


    public function UpdateTeam(Request $request)
    {
        // 1. Tangkap ID
        $team_id = $request->id;
        $team = Team::find($team_id);

        // 2. Cek apakah ada file gambar baru yang di-upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);

            // Note: Saya ganti path-nya jadi 'upload/ourteam/' agar rapi
            $img->resize(60, 60)->save(public_path('upload/ourteam/' . $name_gen));
            $save_url = 'upload/ourteam/' . $name_gen;

            // Hapus gambar lama jika ada
            if ($team->image && file_exists(public_path($team->image))) {
                @unlink(public_path($team->image));
            }

            // Update Semua Data (Termasuk Gambar)
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
        } else {
            // Update Data Tanpa Gambar (Gambar Tetap)
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
            ]);
        }

        $notification = array(
            'message' => 'Update Our Team Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function DeleteTeam($id)
    {
        Team::find($id)->delete();

        $notification = array(
            'message' => 'Delete Our Team Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //End Method
}
