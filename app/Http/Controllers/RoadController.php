<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Road;
use Illuminate\Support\Facades\Storage;

class RoadController extends Controller
{
    public function index() {
        return view('road.index');
    }

    public function create() {
        return view('road.create');
    }

    public function store(Request $request) {
        // Step 1: Validate the input data
        $data = $request->validate([
            'roadname' => 'required',
            'segment_number' => 'required|numeric',
            'description' => 'required',
            'latitude' => 'required|numeric|between:-90,90',   // Validate latitude range
            'longitude' => 'required|numeric|between:-180,180', // Validate longitude range
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Step 2: Handle image file if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image_path'] = $imagePath;
        }
    
        // Step 3: Store data in the database
        Road::create($data);
    
        // Step 4: Redirect to the gallery
        return redirect()->route('road.gallery')->with('success', 'Road created successfully!');
    }
    
    public function gallery()
    {
        $roads = Road::all();  // Fetch all road 
        // Dump and die to see the content of $roads dd($roads); 
        return view('road.gallery', compact('roads'));  // Pass the data to the gallery view
    }

    public function adminDashboard()
    {
        return view('road.admin-dashboard');
    }

    public function edit($id)
{
    $road = Road::findOrFail($id); // Find the road by ID or fail
    return view('road.edit', compact('road')); // Pass the road to the edit view
}

    public function update(Request $request, $id)
    {
        // Step 1: Validate the input data
        $data = $request->validate([
            'roadname' => 'required',
            'segment_number' => 'required|numeric',
            'description' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $road = Road::findOrFail($id); // Find the road by ID

        // Step 2: Handle image file if present
        if ($request->hasFile('image')) {
            // Delete old image if necessary (optional)
            if ($road->image_path) {
                Storage::disk('public')->delete($road->image_path);
            }
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image_path'] = $imagePath; // Update the image path
        }

        // Step 3: Update the road entry
        $road->update($data);

        // Step 4: Redirect to the gallery
        return redirect()->route('road.gallery')->with('success', 'Road updated successfully!');
    }

    public function destroy($id)
    {
        $road = Road::findOrFail($id); // Find the road by ID or fail
        $road->delete(); // Delete the road entry

        return redirect()->route('road.gallery')->with('success', 'Roadwork entry deleted successfully.'); // Redirect back to the index with a success message
    }

}
