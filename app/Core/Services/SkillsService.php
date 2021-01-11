<?php


namespace App\Core\Services;


use App\Http\Requests\PaginateListRequest;
use App\Http\Requests\SkillsIndexRequest;
use App\Http\Resources\SkillsIndexResource;
use App\Models\Skill;


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
