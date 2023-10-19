<?php

namespace App\Modules\RouteManagement\Controllers;

use App\Modules\RouteManagement\Repositories\RouteRepository; // Import the RouteRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RouteCreateRequest;
use App\Http\Requests\RouteUpdateRequest;


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

    public function show($id)
    {
        $route = $this->routeRepository->getById($id);
        $cities = $this->routeRepository->getAllCities();
        return view('RouteManagement.show', ['cities' => $cities, 'route'=>$route]);
    }

    public function create()
    {
        $cities = $this->routeRepository->getAllCities();
        return view('RouteManagement.create', ['cities' => $cities]);
    }

    public function edit($id)
    {
        $route = $this->routeRepository->getById($id);
        $cities = $this->routeRepository->getAllCities();
        return view('RouteManagement.edit', ['cities' => $cities, 'route'=>$route]);
    }

    public function store(RouteCreateRequest $request)
    {
        $data = $this->routeRepository->createData($request->all());

        if ($data['success']) {
            
            return redirect()->route('trip.create', ['id' => $data['route']['id'], 'route' => $data['route']]);

        } else {
            return redirect()->back()->with('error', 'Failed to create a new route. Please try again.');
        }
    }

    public function update(RouteUpdateRequest $request, $id)
    {
        $data = $this->routeRepository->updateData($request->all(), $id);

        if ($data['success']) {
            return redirect()->route('route.index')->with('success', 'Route update successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update route. Please try again.');
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

    public function delete($id)
    {
        $data = $this->routeRepository->deleteData($id);

        if ($data['success']) {
            return response()->json(['success' => 'Route deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete. Please try again.']);
        }
    }



}

