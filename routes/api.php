<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Treblle\ApiResponses\Responses\MessageResponse;

Route::get('/', static fn (): MessageResponse => new MessageResponse(
    data: 'Service Online',
));

Route::prefix('apps')->as('apps:')->group(
    base_path('routes/apps.php'),
);

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/auth.php'),
);

Route::prefix('devices')->as('devices:')->group(
    base_path('routes/devices.php'),
);

Route::prefix('packages')->as('packages:')->group(
    base_path('routes/packages.php'),
);

Route::prefix('auth')->as('shells:')->group(
    base_path('routes/shells.php'),
);
