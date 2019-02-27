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

    public function getBadges(BadgeCreateRequest $request)
    {
        $pdf =  $this->service->getBadges($request->all());
        return $pdf->download('badges.pdf');
    }
}
