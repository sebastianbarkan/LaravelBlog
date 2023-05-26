<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Blade;

class CommunityController extends Controller
{
    // //store listing data
    public function store(Request $request) {

        $privacy_types = $request->input('privacy');
        $selected_privacy;

        foreach ($privacy_types as $privacy_type) {
             $selected_privacy = $privacy_type;
        }

        $formFields = $request->validate([
            'community-title' => ["required", Rule::unique('communities', 'community-title')],
        ]);

        $formFields["privacy"] = $selected_privacy;
        $formFields["memberCount"] = 1;
        Community::create($formFields);


        return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    //Show single listing
    public function show(Community $community, Post $post ) {
        return view("communities.show", [
            "community" => $community,
            "posts" => Post::latest()->where("listing_id", $listing->id),
        ]);
    }

    //Get all communities
    public function index() {
        return Blade::render('<standard_layout />', [
            "communities" => Community::latest()
        ]);
    }

}
