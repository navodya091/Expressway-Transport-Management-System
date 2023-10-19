<?php

namespace App\Modules\RouteManagement\Controllers;

use App\Modules\RouteManagement\Repositories\RouteRepository; // Import the RouteRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RouteCreateRequest;


class RouteController extends Controller
{
    protected $routeRepository;

    public function __construct(RouteRepository $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function index()
    {
      
        $routes = $this->routeRepository->getAll();
        return view('RouteManagement.index', ['routes' => $routes]);
    }

    public function create()
    {
        $cities = $this->routeRepository->getAllCities();
        return view('RouteManagement.create', ['cities' => $cities]);
    }

    public function store(RouteCreateRequest $request)
    {
        $data = $this->routeRepository->createDate($request->all());

        if ($data['success']) {
            return redirect()->route('trip.create', ['route_id' => $data['route']['id'],'route' => $data['route'],])->with('success', 'Route created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create a new route. Please try again.');
        }
    }


    public function updateRouteStatus(Request $request)
    {

        $result = $this->routeRepository->updateRouteStatus($request->all());

        if ($result['success']) {
            return response()->json(['success' => 'Route status updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update the status. Please try again.']);
    
        }
        
    }



}

