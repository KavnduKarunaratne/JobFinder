<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    // Show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))
            ->paginate(6)
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    //Show Create form
    public function create() {
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();


        Listing::create($formFields);

        return redirect('/')->with('message',
        'Job created successfully!');
    }

    //Show Edit form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    //Update listing data
    public function update(Request $request, Listing $listing) {
        // Make sure the the logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $listing->update($formFields);

        // One way to show flash card messages
        // Session::flash('message', 'Listing Created');

        return back()->with('message',
        'Job updated successfully!');
    }

    //Delete listing
    public function destroy(Listing $listing) {

        // Make sure the the logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Job deleted successfully!');
    }

    //Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

    public function bookmark(Request $request) {
//        dd($request->listing_id);
        $bookmark = new Bookmark();
        $bookmark->user_id = auth()->id();
        $bookmark->listing_id = $request->listing_id;
        $bookmark->save();
        return redirect('/')->with('message', 'Job bookmarked successfully!');
    }

}
