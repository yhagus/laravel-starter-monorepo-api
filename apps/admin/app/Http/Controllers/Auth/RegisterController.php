<?php

declare(strict_types=1);

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Requests\Auth\RegisterRequest;
use App\Common\Models\User;
use App\Common\Resources\HttpResource;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Auth\Events\Registered;
use Illuminate\Routing\Controller;

#[Group('Authentication')]
final class RegisterController extends Controller
{
    /**
     * Register
     */
    public function store(RegisterRequest $request): HttpResource
    {
        $user = User::query()->create([
            'first_name' => $request->string('first_name'),
            'last_name' => $request->string('last_name'),
            'email' => $request->string('email'),
            'password' => bcrypt($request->string('password')),
        ]);

        event(new Registered($user));

        return new HttpResource(null, 'You have been registered successfully.');
    }
}
