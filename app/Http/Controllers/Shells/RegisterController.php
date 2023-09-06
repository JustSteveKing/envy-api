<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shells;

use App\Http\Requests\Shells\RegisterRequest;
use App\Jobs\Shells\RegisterNewShellForDevice;
use JustSteveKing\Tools\Http\Enums\Status;
use Treblle\ApiResponses\Responses\MessageResponse;

final class RegisterController
{
    /**
     * @param RegisterRequest $request
     * @return MessageResponse
     */
    public function __invoke(RegisterRequest $request): MessageResponse
    {
        \dispatch(new RegisterNewShellForDevice(
            device: $request->string('device')->toString(),
            shell: $request->payload(),
        ));

        return new MessageResponse(
            data: 'We are processing your request.',
            status: Status::ACCEPTED,
        );
    }
}
