<?php

namespace App\Http\Controllers\Application;

use App\Events\ApplicationSubmitted;
use App\Http\Controllers\Controller;
use App\Dtos\Application\ApplicationDto;
use App\Services\Application\ApplicationService;
use App\Http\Requests\EndUser\Application\ApplicationRequest;

class ApplicationController extends Controller
{
    // ---------------  \\
    public function __construct(
        private readonly ApplicationService $applicationService
    ) {
    }
    // ---------------  \\
    public function create()
    {
        return view('enduser.pages.application.create');
    }
    // ---------------  \\
    public function store(ApplicationRequest $request)
    {
        // ------------------- \\
        $dto = ApplicationDto::fromRequest($request);
        // ------------------- \\
        $application = $this->applicationService->createApplication($dto);
        // ------------------- \\
        event(new ApplicationSubmitted($application));
        // ------------------- \\
        return response()->json([
            'message' => 'Submitted successfully. We will review it and get back to you soon.'
        ]);
    }
}


