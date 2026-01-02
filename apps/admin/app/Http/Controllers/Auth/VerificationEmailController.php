<?php

declare(strict_types=1);

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Requests\Auth\EmailNotificationRequest;
use App\Common\Resources\HttpResource;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Routing\Controller;

#[Group('Authentication')]
final class VerificationEmailController extends Controller
{
    /**
     * Re-send email verification
     */
    public function create(EmailNotificationRequest $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return new HttpResource(null, 'EmailVerificationNotification');
    }

    /**
     * Verify hash received
     */
    public function store(\App\Admin\Http\Requests\Auth\EmailVerificationRequest $request, string $id, string $hash)
    {
        $request->fulfill();

        return new HttpResource(null, 'You have successfully verified your email address.');
    }
}
