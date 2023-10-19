<?php

namespace App\Modules\UserManagement\Controllers;

use App\Modules\UserManagement\Repositories\UserRepository; // Import the UserRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
       
        $users = $this->userRepository->getAll();
        return view('UserManagement.index', ['users' => $users]);
    }

    public function create()
    {
        $userTypes = $this->userRepository->getAllUserTypes();
        return view('UserManagement.create', ['userTypes' => $userTypes]);
    }

    public function store(UserCreateRequest $request)
    {
        $data = $this->userRepository->createDate($request->all());

        if ($data['success']) {
            return redirect()->route('user.index')->with('success', 'User created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create a new user. Please try again.');
        }
    }


    public function updateUserStatus(Request $request)
    {

        $data = $this->userRepository->updateUserStatus($request->all());

        if ($data['success']) {
            return response()->json(['success' => 'User status updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update the status. Please try again.']);
    
        }
        
    }



}

