<?php

namespace App\Modules\TripManagement\Controllers;

use App\Modules\TripManagement\Repositories\TripRepository; // Import the TripRepository
use App\Modules\RouteManagement\Repositories\RouteRepository; // Import the RouteRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TripCreateRequest;


class TripController extends Controller
{
    protected $tripRepository;

    public function __construct(TripRepository $tripRepository, RouteRepository $routeRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->routeRepository = $routeRepository;
    }

    public function index()
    {
      
        $trips = $this->tripRepository->getAll();
        return view('TripManagement.index', ['trips' => $trips]);
    }

    public function create($id)
    {
        $route = $this->routeRepository->getById($id);
        $buses = $this->tripRepository->getAllBusses();
        return view('TripManagement.create', ['buses' => $buses,'route' => $route, ]);
    }

    public function store(TripCreateRequest $request)
    {
        if ($request->input('action') == 'save') {
            // Handle the "Save" button logic
            $data = $this->tripRepository->createDate($request->all());
           
            if ($data['success']) {
                return redirect()->route('trip.create', ['route_id' => $data['route']['id'], 'route' => $data['route']])
                    ->with('success', 'Trip created successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to create a new trip. Please try again.');
            }
        } elseif ($request->input('action') == 'confirm') {
            // Handle the "Confirm & Next" button logic
            $data = $this->tripRepository->createDate($request->all());

            if ($data['success']) {
                return redirect()->route('trip.index')->with('success', 'Trip created successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to create a new trip. Please try again.');
            }
        }
    }


    public function updateTripStatus(Request $request)
    {

        $result = $this->tripRepository->updateTripStatus($request->all());

        if ($result['success']) {
            return response()->json(['success' => 'Trip status updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update the status. Please try again.']);
    
        }
        
    }



}

