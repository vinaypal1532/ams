<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payslip;
use App\Services\SmsService;
use App\Models\Attendance; 
use App\Models\Leave;
use App\Models\Holiday;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $smsService;
    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
      if( $user->role=='user')  {
            return redirect('employee-dashboard');
        }
        $smsResult = $this->smsService->checkBalance();     
    
        if ($smsResult['status'] != 1) {
            return response([
                'message' => 'Failed to check balance',
                'error_details' => $smsResult['error_message'] ?? 'Unknown error',
            ]);
        }
    
        $balance = $smsResult['balance'];
        $balance = str_replace('trans1:', '', $balance);

        $user = User::count();
        $attendance = Attendance::count();   
        $leave = Leave::count();   
        $payslip = Payslip::count();   
        $leave_approve = Leave::where('status',1)
        ->count();   
        $leave_rejected = Leave::where('status',2)
        ->count();   
        return view('home',  
        [
        'attendance' => $attendance,
        'user' => $user,
        'leave' => $leave,
        'payslip' => $payslip,     
        'leave_approve' => $leave_approve,     
        'leave_rejected' => $leave_rejected,     
    ]);
    }


    function test_balance()
    {
        
        $smsResult = $this->smsService->checkBalance();     
    
        if ($smsResult['status'] != 1) {
            return response([
                'message' => 'Failed to check balance',
                'error_details' => $smsResult['error_message'] ?? 'Unknown error',
            ]);
        }
    
        $balance = $smsResult['balance'];
    
        return response([
            'message' => 'Balance checked successfully',
            'status' => $smsResult['status'],
            'balance' => $balance,
        ]);
    }


    public function profile()
    {    
      
        $teacher = Auth::user();
      
        return view('profile', compact('teacher'));
    }

    public function teacher_index()
    {
        $userId = Auth::id();
        $attendance = Attendance::where('user_id', $userId)->count(); 
        $leave = Leave::where('user_id', $userId)->count();
        $payslip = Payslip::where('user_id', $userId)->count();     
    
        // Fetch holidays using the correct model
        $holidays = Holiday::all()->map(function($holiday) {
            return [
                'title' => $holiday->name,
                'start' => $holiday->date->format('Y-m-d'),
                'backgroundColor' => $holiday->status === 'Active' ? 'rgba(255, 99, 132, 0.5)' : 'rgba(201, 203, 207, 0.5)',
                'borderColor' => $holiday->status === 'Active' ? 'rgba(255, 99, 132, 1)' : 'rgba(201, 203, 207, 1)',
            ];
        });
    
        return view('teacher_dashboard', [
            'attendance' => $attendance,
            'payslip' => $payslip,
            'leave' => $leave,
            'events' => $holidays,
        ]);
    }
    
    
   
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Hash the new password
        $user->password = Hash::make($request->new_password);

        // Save the updated user model
        if ($user->save()) {
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->withErrors(['general' => 'There was a problem saving your new password.']);
        }
    }
        
}
