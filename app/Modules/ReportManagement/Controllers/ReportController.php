<?php

namespace App\Modules\ReportManagement\Controllers;

use App\Modules\ReportManagement\Repositories\ReportRepository; // Import the ReportRepository
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BusCreateRequest;


class ReportController extends Controller
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
       
        $buses = $this->reportRepository->getAll();
        return view('ReportManagement.index', ['buses' => $buses]);
    }
}

