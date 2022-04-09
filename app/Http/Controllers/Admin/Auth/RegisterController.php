<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\Auth\RegisterController as BackpackRegisterController;
use Illuminate\Contracts\Validation\Validator;

class RegisterController extends BackpackRegisterController
{
    protected $data = []; // the information we send to the view
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return Validator
     */
    protected function validator(array $data): Validator
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
        $users_table = $user->getTable();
        $email_validation = backpack_authentication_column() == 'email' ? 'email|' : '';

        return Validator::make($data, [
            'name'                             => 'required|max:255',
            backpack_authentication_column()   => 'required|'.$email_validation.'max:255|unique:'.$users_table,
            'code'                              => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data): User
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();

        return $user->create([
            'name'                             => $data['name'],
            backpack_authentication_column()   => $data[backpack_authentication_column()],
            'password'                         => bcrypt($data['password']),
        ]);
    }
    public function showRegistrationForm()
    {
        return backpack_view('auth.register');
    }
}
