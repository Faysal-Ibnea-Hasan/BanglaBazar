<?php

namespace App\Repositories\User;

use App\Enums\Users\Status;
use App\Enums\Users\VerificationStatus;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function all_users($filters)
    {
        return User::orderBy('created_at', 'DESC')
            ->with('followers', 'following')
            ->filter($filters)
            ->paginate('10')
            ->appends(request()->query()); // For not refreshing whole result in pagination
    }
    public function store_user($request)
    {
        $user = User::create(
            $request->only([
                'name',
                'email',
                'password',
                'phone_number',
                'status',
                'verification_status'
            ])
        );
        return $user->id;
    }
    public function update_user($request)
    {
        try {
            User::where('id', $request->id)->update(
                $request->only([
                    'name',
                    'email',
                    'password',
                    'phone_number',
                    'status',
                    'verification_status'
                ])
            );
            return true;
        } catch (\Exception $e) {
            // Handle or log error
            return false;
        }
    }
    public function store_user_address($request)
    {
        UserAddress::create($request->only([
            'user_id',
            'street_address',
            'city',
            'district',
            'division',
            'postal_code',
            'country'
        ]));
        return true;
    }
    public function update_user_address($request)
    {
        UserAddress::where('user_id', $request->id)
            ->update($request->only([
                'user_id',
                'street_address',
                'city',
                'district',
                'division',
                'postal_code',
                'country'
            ]));
        return true;
    }
    public function status_toogle($request)
    {
        switch ($request->type) {
            case 'status':
                $user = User::findOrFail($request->id);
                $user->status = $request->status;
                $user->save();
                break;
            case 'verification':
                $user = User::findOrFail($request->id);
                $user->verification_status = $request->verification_status;
                $user->save();
                break;
            default:

                break;
        }
        return true;
    }
    public function user_status()
    {
        $status = [];
        $status = [
            Status::active => 'Active',
            Status::in_active => 'Inactive',
            Status::banned => 'Banned',
            Status::suspended => 'Suspended'
        ];
        return $status;
    }
    public function user_verification_status()
    {
        $status = [];
        $status = [
            VerificationStatus::pending => 'Pending',
            VerificationStatus::verified => 'Verified',
            VerificationStatus::un_verified => 'Not verified',
        ];
        return $status;
    }
    public function delete_user($request)
    {
        User::findOrFail($request->id)->delete();
        return true;
    }
    public function user_details($request)
    {
        return User::where('id', $request->id)->with('user_addresses')->first();
    }
}
