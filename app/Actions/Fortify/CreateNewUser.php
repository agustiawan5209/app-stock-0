<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'alamat' => ['required', 'string'],
            'no_telpon' => ['required', 'numeric', 'digits:12'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => $input['role_id'],
                'alamat' => $input['alamat'],
                'no_telpon' => $input['no_telpon'],
            ]), function (User $user) {
                $this->createTeam($user);
                if ($user->role_id == 2) {
                    Supplier::create([
                        'supplier' => $user->name,
                        'user_id' => $user->id,
                    ]);
                } elseif ($user->role_id == 3) {
                    Customer::create([
                        'customer' => $user->name,
                        'user_id' => $user->id,
                    ]);
                }
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
