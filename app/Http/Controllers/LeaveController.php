<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){

            $user = Auth::user();
    
            if ($user->role == 'admin') {
                
                $leaves = Leave::orderBy('id', 'desc')->get();
            } else {
            
                $leaves = Leave::where('user_id', $user->id)
                                         ->orderBy('id', 'desc')
                                         ->get();
            }              
        
            return view('leave.index', ['leaves' => $leaves]);
          
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_day' => 'required|integer',
            'reason' => 'required|string|max:255',
            'start_date' => 'required|date',
            'type' => 'required|string|max:255',
        ]);

        $leave = new Leave([
            'user_id' => Auth::id(),
            'no_day' => $request->get('no_day'),
            'reason' => $request->get('reason'),
            'start_date' => $request->get('start_date'),
            'type' => $request->get('type'),
            'status' => 0, 
        ]);

        $leave->save();

        return redirect()->route('leave')->with('success', 'Leave request submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
        $leave = Leave::find($id); 
        return view('leave.edit',compact('leave'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
{
   
    $validatedData = $request->validate([
        'no_day' => 'required|integer',
        'reason' => 'required|string',
        'start_date' => 'required|date',
        'type' => 'required|string',
        'status' => 'required|in:0,1,2', 
    ]);
   
    $leave->update($validatedData);
    
    return redirect()->route('leave')->with('success', 'Leave record updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        
        $leave->delete();   
        return redirect()->route('leave')->with('success', 'Leave record deleted successfully.');
    }

}
