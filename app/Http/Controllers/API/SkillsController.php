<?php


namespace App\Http\Controllers\API;


use App\Core\Services\SkillsService;
use App\Http\Requests\PaginateListRequest;
use App\Http\Requests\SkillsIndexRequest;

class SkillsController
{
    private SkillsService $service;

    public function __construct(SkillsService $service)
    {
        $this->service = $service;
    }

    public function index(SkillsIndexRequest $request, PaginateListRequest $paginate_request)
    {
        return $this->service->index($request, $paginate_request);
    }
}
