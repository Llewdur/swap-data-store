<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @OA\Info(
     *      version=L5_SWAGGER_CONST_VERSION,
     *      title="Simple User Data Store Swap Api",
     *      description="Laravel based API using L5 Swagger for documentation",
     * @OA\Contact(
     *          name="Llewellyn",
     *          email="llewellyn@zekini.com"
     *      ),
     * )
     */

    /**
     * @OA\SecurityScheme(
     *     type="oauth2",
     *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
     *     name="Password Based",
     *     in="header",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     *     securityScheme="bearer_token",
     * @OA\Flow(
     *         flow="password",
     *         authorizationUrl="/oauth/authorize",
     *         tokenUrl="/oauth/token",
     *         refreshUrl="/oauth/token/refresh",
     *         scopes={}
     *     )
     * )
     */
}
