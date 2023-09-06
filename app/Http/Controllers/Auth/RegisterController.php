<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\Auth\RegisterNewUser;
use JustSteveKing\Tools\Http\Enums\Status;
use Treblle\ApiResponses\Responses\MessageResponse;

final class RegisterController
{
    public function __invoke(RegisterRequest $request): MessageResponse
    {
        \dispatch(new RegisterNewUser(
            user: $request->payload(),
        ));

        return new MessageResponse(
            data: 'We are processing your request, you can authenticate now.',
            status: Status::ACCEPTED,
        );
    }
}
