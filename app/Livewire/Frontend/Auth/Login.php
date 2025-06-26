<?php

namespace App\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Masmerise\Toaster\Toaster;

use App\Models\User;


class Login extends Component {
    public $input_email;
    public $input_password;
    public $is_remember;
    public $is_login = false;

    public function render() {
        return view('livewire.frontend.auth.login')->layout('livewire.components.layouts.frontend.auth.app');
    }

    public function processLogin(Request $request) {
        $email = $this->input_email;
        $password = $this->input_password;
        $remember = $this->is_remember;

        $is_auth = Auth::attempt(['email' => $email, 'password' => $password], $remember);

        if ($is_auth) {
            $user_data = Auth::user();
            // // Set Session
            $user_id = $user_data->id;
            $user_fullname = $user_data->name;
            $email = $user_data->email;

            Session::put('user_id', $user_id);
            Session::put('user_fullname', $user_fullname);
            Session::put('email', $email);

            // Redirect to route
            return redirect()->route('backend.dashboard.index');
            // $r = ['success' => true, 'msg' => 'Berhasil Login', 'uri' => route('backend.dashboard.index')];
        } else {
            $result_message = 'Email atau Password salah';
            // Toaster::error($result_message);

            LivewireAlert::title('Error')
                ->text($result_message)
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend.auth.login');
    }
}
