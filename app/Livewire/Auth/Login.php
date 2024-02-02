<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    /**
     * Email
     *
     * @var string
     */
    public $email = '';

    /**
     * Password
     *
     * @var string
     */
    public $password = '';

    /**
     * Remember
     *
     * @var bool
     */
    public $remember = false;

    /**
     * Render view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire..auth.login')
            ->layout('livewire.auth.layout')
            ->title('Login');
    }

    /**
     * Attempt login
     *
     * @return void
     */
    public function attempt()
    {
        $validated = $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
            'remember' => ['boolean']
        ]);

        if (\Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $validated['remember'] ?? false)) {
            return $this->redirect(route('admin.home'));
        }

        $this->addError('email', 'Login fail: email/password is inválid.');
    }
}
