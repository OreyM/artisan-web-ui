<?php

namespace App\Http\Controllers;

use App\Http\Responses\Traits\ApiResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Artisan Web UI API Documentation",
 *      description="Artisan Web UI API Documentation",
 *      @OA\Contact(
 *          email="serhiima@develux.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Artisan Web UI API Server"
 * )
 */
class ApiController extends BaseController
{
    use ApiResponse;
}
