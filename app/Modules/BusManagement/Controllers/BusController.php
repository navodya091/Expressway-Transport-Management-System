<?php

namespace App\Modules\BusManagement\Controllers;

use App\Modules\BusManagement\Repositories\BusRepository; // Import the BusRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusController extends Controller
{
    protected $busRepository;

    public function __construct(BusRepository $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    public function index()
    {
        // Retrieve all bus data using the repository
        $buses = $this->busRepository->getAll();

        // Pass the data to the view
        return view('BusManagement.index', ['buses' => $buses]);
    }
}
