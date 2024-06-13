<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('frontend.address.index', compact('addresses'));
    }

    public function create()
    {
        return view('frontend.address.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
    
        Address::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'user_id' => Auth::user()->id,
        ]);
    
        return redirect('addresses')->with('message', 'Address Added Successfully');
    }    

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('frontend.address.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $address = Address::findOrFail($id);
        $address->update($validated);
        return redirect('address')->with('message', 'Address Updated Successfully');
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect('address')->with('message', 'Address Deleted Successfully');
    }
}
