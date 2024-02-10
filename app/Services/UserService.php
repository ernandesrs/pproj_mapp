<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\Rule;
use \App\Models\User;

class UserService
{
    /**
     * Create a user
     *
     * @param array $validated
     * @return null|User
     */
    public static function create(array $validated)
    {
        return User::create([
            ...$validated,
            'password' => \Hash::make($validated['password'])
        ]);
    }

    /**
     * Update
     *
     * @param Authenticatable|User $user
     * @param array $validated
     * @return null|User null on fail, User on success
     */
    public static function update(Authenticatable|User $user, array $validated)
    {
        return $user->update($validated) ? $user->fresh() : null;
    }

    /**
     * Update password
     *
     * @param Authenticatable|User $user
     * @param array $validated
     * @return null|User null on fail, User on success
     */
    public static function updatePassword(Authenticatable|User $user, array $validated)
    {
        return $user->update(['password' => \Hash::make($validated['password'])]) ? $user : null;
    }

    /**
     * Update photo
     *
     * @param Authenticatable|User $user
     * @param mixed $photo
     * @return null|User null on fail, User on success
     */
    public static function updatePhoto(Authenticatable|User $user, mixed $photo)
    {
        if ($oldPhoto = $user->avatar) {
            \Storage::disk('public')->delete($oldPhoto);
        }

        $newPhoto = $photo->store('users/avatars', 'public');

        return $user->update(['avatar' => $newPhoto]) ? $user->fresh() : null;
    }

    /**
     * Delete photo
     *
     * @param Authenticatable|User $user
     * @return null|User null on fail, User on success
     */
    public static function deletePhoto(Authenticatable|User $user)
    {
        if ($oldPhoto = $user->avatar) {
            \Storage::disk('public')->delete($oldPhoto);
        }

        return $user->update(['avatar' => null]) ? $user->fresh() : null;
    }

    /**
     *
     *
     * =================================
     *
     * FIELDS AND RULES DEFINITION
     *
     * =================================
     *
     *
     */

    /**
     *
     *
     * FIELDS
     *
     *
     */

    /**
     * Get Basic user data fields
     *
     * @return array
     */
    public static function getBasicDataFields()
    {
        return [
            'first_name' => null,
            'last_name' => null,
            'username' => null,
            'gender' => 'n'
        ];
    }

    /**
     * Get password data fields
     *
     * @return array
     */
    public static function getPasswordDataFields()
    {
        return [
            'password' => null,
            'password_confirmation' => null
        ];
    }

    /**
     * Get create data fields
     *
     * @return array
     */
    public static function getCreateDataFields()
    {
        return array_merge(
            self::getBasicDataFields(),
            [
                'email' => null,
            ],
            self::getPasswordDataFields()
        );
    }

    /**
     *
     *
     * RULES
     *
     *
     */

    /**
     * Get Basic data rules
     *
     * @return array
     */
    public static function getBasicDataRules()
    {
        return [
            'data' => ['array'],
            'data.first_name' => ['required', 'string', 'max:25'],
            'data.last_name' => ['required', 'string', 'max:50'],
            'data.username' => ['required', 'string', 'max:25'],
            'data.gender' => ['nullable', 'string', Rule::in('n', 'm', 'f')]
        ];
    }

    /**
     * Get password data rules
     *
     * @return array
     */
    public static function getPasswordDataRules()
    {
        return [
            'data' => ['array'],
            'data.password' => ['required', 'confirmed'],
        ];
    }

    /**
     * Get photo data rules
     *
     * @return array
     */
    public static function getPhotoDataRules()
    {
        return [
            'data' => ['array'],
            'data.avatar' => ['required', 'file', 'mimes:jpeg,jpg,png', 'max:1024', 'dimensions:min_width=250,min_height=250']
        ];
    }

    /**
     * Get create data Rules
     *
     * @return array
     */
    public static function getCreateDataRules()
    {
        return array_merge(
            self::getBasicDataRules(),
            [
                'data.email' => ['required', 'email', 'unique:users,email'],
            ],
            self::getPasswordDataRules()
        );
    }
}
