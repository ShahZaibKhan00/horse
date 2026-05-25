<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\General;
use App\Models\SavedSearch;
use App\Models\ServiceSavedSearch;
use App\Models\RealEstateSavedSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedSearchController extends Controller
{
    /**
     * Display a listing of the saved searches.
     */
    public function index()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();

        $savedSearches = SavedSearch::where('user_id', Auth::id())
            ->latest()
            ->get();

        $serviceSearches = ServiceSavedSearch::where('user_id', Auth::id())
            ->latest()
            ->get();

        $realEstateSearches = RealEstateSavedSearch::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('admin.saved-searches', compact(
            'username', 
            'usertype', 
            'userprofile', 
            'Logo', 
            'Web_name', 
            'categories', 
            'savedSearches',
            'serviceSearches',
            'realEstateSearches'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please log in to save your search.'
            ], 401);
        }

        try {
            $filters = $request->except(['_token', 'search_name', 'type']);
            
            // Remove empty filters
            $filters = array_filter($filters, function($value) {
                return !is_null($value) && $value !== '';
            });

            $type = $request->input('type', 'horse');

            if ($type === 'service') {
                $savedSearch = ServiceSavedSearch::create([
                    'user_id' => Auth::id(),
                    'search_name' => $request->input('search_name', 'Saved Service Search - ' . date('Y-m-d H:i')),
                    'location' => $request->location,
                    'distance_min' => $request->distance_min,
                    'distance_max' => $request->distance_max,
                    'hr_miles' => $request->hr_miles,
                    'name' => $request->name,
                    'health' => $request->health,
                    'holistic' => $request->holistic,
                    'breeding' => $request->breeding,
                    'leasing' => $request->leasing,
                    'transport' => $request->transport,
                    'grooming' => $request->grooming,
                    'recreational' => $request->recreational,
                    'performance' => $request->performance,
                    'property' => $request->property,
                    'boarding' => $request->boarding,
                    'farrier' => $request->farrier,
                    'consulting' => $request->consulting,
                    'retail' => $request->retail,
                    'promotion' => $request->promotion,
                    'filters' => $filters,
                ]);
            } elseif ($type === 'realestate') {
                $savedSearch = RealEstateSavedSearch::create([
                    'user_id' => Auth::id(),
                    'search_name' => $request->input('search_name', 'Saved Property Search - ' . date('Y-m-d H:i')),
                    'location' => $request->location,
                    'distance_min' => $request->distance_min,
                    'distance_max' => $request->distance_max,
                    'hr_miles' => $request->hr_miles,
                    'price_min' => $request->price_min,
                    'price_max' => $request->price_max,
                    'acre_min' => $request->acre_min,
                    'acre_max' => $request->acre_max,
                    'bedrooms_min' => $request->bedrooms_min,
                    'bedrooms_max' => $request->bedrooms_max,
                    'bathrooms_min' => $request->bathrooms_min,
                    'bathrooms_max' => $request->bathrooms_max,
                    'heated_barn' => $request->heated_barn,
                    'stall_min' => $request->stall_min,
                    'stall_max' => $request->stall_max,
                    'has_indoor_ring' => $request->has_indoor_ring,
                    'has_outdoor_ring' => $request->has_outdoor_ring,
                    'fenced_grass' => $request->fenced_grass,
                    'fencing' => is_array($request->fencing) ? implode(',', $request->fencing) : $request->fencing,
                    'amenitie' => is_array($request->amenitie) ? implode(',', $request->amenitie) : $request->amenitie,
                    'filters' => $filters,
                ]);
            } else {
                $savedSearch = SavedSearch::create([
                    'user_id' => Auth::id(),
                    'search_name' => $request->input('search_name', 'Saved Search - ' . date('Y-m-d H:i')),
                    'breed' => is_array($request->breed) ? implode(',', $request->breed) : $request->breed,
                    'color' => is_array($request->selectedColor) ? implode(',', $request->selectedColor) : $request->selectedColor,
                    'gender' => is_array($request->selectedGender) ? implode(',', $request->selectedGender) : $request->selectedGender,
                    'min_price' => $request->from,
                    'max_price' => $request->to,
                    'min_age' => $request->age_min,
                    'max_age' => $request->age_max,
                    'min_height' => $request->height_min,
                    'max_height' => $request->height_max,
                    'rider_level' => is_array($request->skill) ? implode(',', $request->skill) : $request->skill,
                    'skill_disciplines' => is_array($request->rider) ? implode(',', $request->rider) : $request->rider,
                    'ad_type' => $request->type_filter ?? $request->type, // type_filter if exists, else type
                    'filters' => $filters,
                    'type' => $type,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Search criteria saved successfully!',
                'data' => $savedSearch
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save search: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $type = $request->input('type', 'horse');

        if ($type === 'service') {
            $savedSearch = ServiceSavedSearch::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        } elseif ($type === 'realestate') {
            $savedSearch = RealEstateSavedSearch::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        } else {
            $savedSearch = SavedSearch::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        $savedSearch->delete();

        $messages = [
            'title' => 'Search Deleted!',
            'detail' => 'The saved search has been removed successfully.'
        ];
        session()->flash('alert-success', $messages);

        return redirect()->back();
    }
}
