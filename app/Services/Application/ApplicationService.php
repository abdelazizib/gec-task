<?php


namespace App\Services\Application;

use App\Models\Application;
use App\Dtos\Application\ApplicationDto;

class ApplicationService
{
	// ---------------  \\
	public function __construct(
		private readonly Application $applicationModel
	){}
	// ---------------  \\
	public function createApplication(ApplicationDto $data)
	{
		$application = $this->applicationModel->create([
            'user_id' => auth()->id(),
            // ---------------  \\
            'contact_email' => $data->contactEmail,
            'contact_phone' => $data->contactPhone,
            // ---------------  \\
            'birth_date' => $data->birthDate,
            // ---------------  \\
            'gender' => $data->gender,
            // ---------------  \\
            'country' => $data->country,
            // ---------------  \\
            'comments' => $data->comments,
        ]);
		// ---------------  \\
		foreach ($data->files as $file) {
			$application->addMedia($file)->toMediaCollection('files');
		}
		// ---------------  \\
		return $application;
	}
}
