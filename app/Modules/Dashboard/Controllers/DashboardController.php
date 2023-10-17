<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Repositories\DashboardRepository; // Import the BusRepository
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index()
    {
        // Retrieve all data using the repository
        $data = $this->dashboardRepository->getAll();

        // Pass the data to the view
        return view('Dashboard.index', ['data' => $data]);
    }
}
