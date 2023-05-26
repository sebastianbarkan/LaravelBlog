<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    // //store listing data
    public function store(Request $request) {

        $formFields = $request->validate([
            'title' => ["required", Rule::unique('communities', 'title')],
        ]);

        if($request->hasFile("logo")) {
            $formFields['logo'] = $request->file('logo')->store("logos", "public");
        }

        $formFields["user_id"] = auth()->id();

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

}
