<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\TokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Throwable;
use Treblle\ApiResponses\Responses\ExpandedResponse;

final readonly class LoginController
{
    /**
     * @param TokenService $service
     */
    public function __construct(
        private TokenService $service,
    ) {}

    /**
     * @param LoginRequest $request
     * @return ExpandedResponse
     * @throws ValidationException|Throwable
     */
    public function __invoke(LoginRequest $request): ExpandedResponse
    {
        $request->authenticate();

        $token = $this->service->createNew(
            id: Auth::id(),
            name: $request->userAgent(),
        );

        return new ExpandedResponse(
            message: 'Authentication successful',
            data: [
                'token' => $token->plainTextToken,
            ],
        );
    }
}
