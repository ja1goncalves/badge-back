<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Http\Requests\BadgeCreateRequest;
use App\Services\BadgeService;
use App\Validators\BadgeValidator;

/**
 * Class BadgesController.
 *
 * @package namespace App\Http\Controllers;
 */
class BadgesController extends Controller
{
    use CrudMethods;
    /**
     * @var BadgeService
     */
    protected $service;

    /**
     * @var BadgeValidator
     */
    protected $validator;

    /**
     * BadgesController constructor.
     *
     * @param BadgeService $service
     * @param BadgeValidator $validator
     */
    public function __construct(BadgeService $service, BadgeValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

    /**
     * @param BadgeCreateRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function getBadges(BadgeCreateRequest $request)
    {
        try{
            $pdf = $this->service->getBadges($request->all());
        }catch (\Exception $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }

        return $pdf->download('badges.pdf');
    }
}
