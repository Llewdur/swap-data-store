<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
        @OA\Get(
            path="/users",
            operationId="index",
            tags={"User"},
            summary="Get collection of Users",
            description="Returns list of users",
            @OA\Response(
                response=200,
                description="In a GET request, the response will contain an entity corresponding to the requested resource in this instance Bankaccount",
                @OA\MediaType(
                    mediaType="application/json",
                    @OA\Property(
                        property="data",
                        type="array",
                        @OA\Items(
                            type="array",
                            description="Successfully registered please confirm your email address.",
                            @OA\Items(),
                            example={"data":{}, "links":{"first":"/users?page=1","last":"/users?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":null,"last_page":1,"path":"/users","per_page":15,"to":null,"total":0}}
                        )
                    )
                )
            ),
            @OA\Response(
                response=404,
                description="The requested resource could not be found but may be available in the future, or the route might be wrong. Subsequent requests by the client are permissible."
            ),
            @OA\Response(
                response=405,
                description="The resource method is not allowed. i.e post without payload",
                @OA\MediaType(
                    mediaType="application/json",
                    @OA\Property(
                        property="error",
                        type="array",
                        @OA\Items(),
                        example="MethodNotAllowedHttpException"
                    )
                )
            ),
            security={{"bearer_token":{}}}
            )

        Returns list of users
     */
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    /**
    @OA\Post(
    path="/users",
    operationId="store",
    tags={"User"},
    summary="Register a new user on the system.",
    description="Creates user, then kicks off the registration process.",
    @OA\RequestBody(
    required=true,
    @OA\MediaType(
    mediaType="application/json",
    @OA\Schema(
    @OA\Property(
    property="email",
    description="Email address of the user",
    type="email",
    example="bane@gothamcity.com"
    ),
    @OA\Property(
    property="name",
    description="The user's name",
    type="string",
    example="Llewellyn"
    ),
    @OA\Property(
    property="password",
    description="Password of the user",
    type="password",
    example="ban3@Batman"
    )
    )
    )
    ),
    @OA\Response(
    response=201,
    description="The request has been fulfilled, resulting in the creation of a new User resource.",
    @OA\MediaType(
    mediaType="application/json",
    @OA\Property(
    property="data",
    description="Successfully registered please confirm your email address.",
    @OA\Items(),
    example={"data": {"":{"id","created_at"}}}
    )
    )
    ),
    @OA\Response(
    response=304,
    description="The resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. In such case, there is no need to retransmit the resource since the client still has a previously-downloaded copy.",
    @OA\MediaType(
    mediaType="application/json",
    @OA\Property(
    property="message",
    description="Could not register user.",
    type="array",
    @OA\Items(
    type="array",
    description="Could not register user.",
    @OA\Items(),
    example={"message": "Could not register user."}
    )
    )
    )
    )
    ),
    security={{"bearer_token":{}}}
    )

    Returns success message
     */
    public function store(UserRequest $request): UserResource
    {
        $request['password'] = Hash::make($request['password']);

        $user = (new UserRepository(new User()))->create($request->all());

        return new UserResource($user);
    }
}
