<?php

namespace App\Modules\ReportManagement\Controllers;

use App\Modules\ReportManagement\Repositories\ReportRepository; // Import the ReportRepository
use App\Modules\RouteManagement\Repositories\RouteRepository; // Import the RouteRepository
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;



class ReportController extends Controller
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository, RouteRepository $routeRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->routeRepository = $routeRepository;
    }

    public function index(Request $request)
    {
        
        $data = $this->reportRepository->getAll($request);
        $cities = $this->routeRepository->getAllCities();
        return view('ReportManagement.index', ['data' => $data, 'cities' =>$cities ]);
    }

    public function generateReport(Request $request)
    {
        // Retrieve the filtered data based on the request
        $data = $this->reportRepository->getAll($request, $paginate=false);

        // Define the CSV file name
        $fileName = 'report.csv';

        // Generate CSV content
        $csvData = [];
        // Add headers
        $csvData[] = [
            'ID',
            'Bus Number',
            'Route Number',
            'Start Outbound',
            'End Outbound',
            'Start Inbound',
            'End Inbound',
            'Driver Name',
            'Arrival Time',
            'Departure Time',
        ];

        // Add data rows
        foreach ($data as $trip) {
            $csvData[] = [
                $trip->id,
                $trip->bus->bus_number,
                $trip->route->route_number,
                $trip->route->start_point_outbound,
                $trip->route->end_point_outbound,
                $trip->route->start_point_inbound,
                $trip->route->end_point_inbound,
                $trip->bus->user->first_name . ' ' . $trip->bus->user->last_name,
                $trip->arrival_time,
                $trip->departure_time,
            ];
        }

        // Create a stream to generate CSV
        $output = fopen('php://output', 'w');

        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }

        // Set the HTTP response headers for CSV download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ];

        return Response::stream(function () use ($output) {
            fclose($output);
        }, 200, $headers);
    }
}

