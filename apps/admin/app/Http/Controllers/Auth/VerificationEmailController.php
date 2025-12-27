<?php

declare(strict_types=1);

namespace App\Admin\Http\Controllers\Auth;

use App\Common\Resources\HttpResource;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Routing\Controller;

#[Group('Authentication')]
final class VerificationEmailController extends Controller
{
    /**
     * Verify hash received
     */
    public function __invoke(EmailVerificationRequest $request, string $id, string $hash)
    {
        $request->fulfill();
        return new HttpResource(null, 'You have successfully verified your email address.');
    }
}
