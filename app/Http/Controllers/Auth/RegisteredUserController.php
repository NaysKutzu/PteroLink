<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Settings;
use App\Classes\Pterodactyl;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'USER',
            'coins' => Settings::getSetting('def_coins'),
            'memory' => Settings::getSetting('def_memory'),
            'disk' => Settings::getSetting('def_disk_space'),
            'cpu' => Settings::getSetting('def_cpu'),
            'servers' => Settings::getSetting('def_server_limit'),
            'backups' => Settings::getSetting('def_backups'),
            'datbases' => Settings::getSetting('def_db'),
            'ptero_id' => 2,
        ]);

        $response = Pterodactyl::client()->post('/application/users', [
            'username' => $user->name,
            'email' => $user->email,
            'first_name' => $user->name,
            'last_name' => $user->name,
            'password' => $request->password,
            'root_admin' => false,
            'language' => 'en',
        ]);

        if ($response->failed()) {
            $user->delete();
            Log::error('Pterodactyl Registration Error: ' . $response->json()['errors'][0]['detail']);
            throw ValidationException::withMessages([
                'ptero_registration_error' => [__('Account already exists on Pterodactyl. Please contact the Support!')],
            ]);
        }


        $user->update([
            'ptero_id' => $response->json()['attributes']['id'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
