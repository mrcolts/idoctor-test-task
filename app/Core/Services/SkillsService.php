<?php


namespace App\Core\Services;


use App\Core\Facades\IDoctorFacade;
use App\Http\Controllers\API\BaseService;
use App\Http\Requests\DoctorsIndexRequest;
use App\Http\Requests\PaginateListRequest;
use App\Http\Requests\SkillsIndexRequest;
use App\Http\Resources\DoctorsIndexResource;
use App\Http\Resources\SkillsIndexResource;
use App\Models\Doctor;
use App\Models\Skill;
use Illuminate\Http\Request;


final class SkillsService extends BaseService
{
    public function index(SkillsIndexRequest $request,
                          PaginateListRequest $paginate_request)
    {
        $skills = Skill::filter($request->all())
            ->paginateFilter(15, ['*'], $paginate_request['page']);

        return $this->sentPaginatedResponse(
            resource: SkillsIndexResource::class,
            result: $skills,
            message: 'Skills retrieved successfully.'
        );
    }
}
