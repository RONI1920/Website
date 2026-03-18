<?php

namespace App\Http\Controllers;



class FrontendController extends Controller
{
    public function OurTeam()
    {
        return view('home.team.team_page');
    }

    // End Method
}
