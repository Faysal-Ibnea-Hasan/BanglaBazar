<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function all_users($filters);
    public function status_toogle($request);
    public function store_user($request);
    public function update_user($request);
    public function store_user_address($request);
    public function update_user_address($request);
    public function user_status();
    public function user_verification_status();
    public function delete_user($request);
    public function user_details($request);
}
