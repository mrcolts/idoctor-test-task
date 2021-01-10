<?php


namespace App\Http\Controllers\API;


use App\Core\Services\DoctorsService;
use App\Http\Requests\DoctorsIndexRequest;
use App\Http\Requests\PaginateListRequest;
use Illuminate\Http\Request;

class DoctorsController
{
    private DoctorsService $service;

    public function __construct(DoctorsService $service)
    {
        $this->service = $service;
    }

    public function index(DoctorsIndexRequest $request, PaginateListRequest $paginate_request)
    {
        return $this->service->index($request, $paginate_request);
    }

}
