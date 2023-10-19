<?php

namespace App\Modules\BusManagement\Controllers;

use App\Modules\BusManagement\Repositories\BusRepository; // Import the BusRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BusCreateRequest;


class BusController extends Controller
{
    protected $busRepository;

    public function __construct(BusRepository $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    public function index()
    {
       
        $buses = $this->busRepository->getAll();
        return view('BusManagement.index', ['buses' => $buses]);
    }

    public function create()
    {
        $drivers = $this->busRepository->getAllBusDrivers();
        return view('BusManagement.create', ['drivers' => $drivers]);
    }

    public function store(BusCreateRequest $request)
    {
        $data = $this->busRepository->createDate($request->all());

        if ($data['success']) {
            return redirect()->route('bus.index')->with('success', 'Bus created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create a new bus. Please try again.');
        }
    }


    public function updateBusStatus(Request $request)
    {

        $data = $this->busRepository->updateBusStatus($request->all());

        if ($data['success']) {
            return response()->json(['success' => 'Bus status updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update the status. Please try again.']);
    
        }
        
    }



}

