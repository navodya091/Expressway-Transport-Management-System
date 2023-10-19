<?php

namespace App\Modules\BusManagement\Controllers;

use App\Modules\BusManagement\Repositories\BusRepository; // Import the BusRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BusCreateRequest;
use App\Http\Requests\BusUpdateRequest;


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

    public function show($id)
    {
        $buse = $this->busRepository->getById($id);
        $drivers = $this->busRepository->getAllBusDrivers();
        return view('BusManagement.show', ['drivers' => $drivers, 'bus' => $buse]);
    }

    public function create()
    {
        $drivers = $this->busRepository->getAllBusDrivers();
        return view('BusManagement.create', ['drivers' => $drivers]);
    }

    public function edit($id)
    {
        $buse = $this->busRepository->getById($id);
        $drivers = $this->busRepository->getAllBusDrivers();
        return view('BusManagement.edit', ['drivers' => $drivers, 'bus' => $buse]);
    }

    public function store(BusCreateRequest $request)
    {
        $data = $this->busRepository->createData($request->all());

        if ($data['success']) {
            return redirect()->route('bus.index')->with('success', 'Bus created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create a new bus. Please try again.');
        }
    }

    public function update(BusUpdateRequest $request, $id)
    {
        $data = $this->busRepository->updateData($request->all(), $id);

        if ($data['success']) {
            return redirect()->route('bus.index')->with('success', 'Bus update successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update bus. Please try again.');
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

    public function delete($id)
    {
        $data = $this->busRepository->deleteData($id);

        if ($data['success']) {
            return response()->json(['success' => 'Bus deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete. Please try again.']);
        }
    }



}

