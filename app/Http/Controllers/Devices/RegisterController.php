<?php

declare(strict_types=1);

namespace App\Http\Controllers\Devices;

use App\Http\Requests\Devices\RegisterRequest;
use App\Jobs\Devices\RegisterNewDeviceForUser;
use Illuminate\Contracts\Auth\Authenticatable;
use JustSteveKing\Tools\Http\Enums\Status;
use Treblle\ApiResponses\Responses\MessageResponse;

final readonly class RegisterController
{
    public function __construct(
        private Authenticatable $auth,
    ) {}

    public function __invoke(RegisterRequest $request): MessageResponse
    {
        \dispatch(new RegisterNewDeviceForUser(
            user: $this->auth->getAuthIdentifier(),
            device: $request->payload(),
        ));

        return new MessageResponse(
            data: 'We are processing your request.',
            status: Status::ACCEPTED,
        );
    }
}
