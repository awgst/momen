<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    /**
     * List of providers configured in config/services acts as whitelist
     *
     * @var array
     */
    protected $providers = [
        'linkedin',
        'google'
    ];

    /**
     * Redirect to provider for authentication
     *
     * @param $driver
     * @return mixed
     */
    public function oAuthRedirect($driver){
        if(!$this->isProviderAllowed($driver)){
            return $this->sendFailedResponse("Provider belum tersedia untuk saat ini.");
        }
        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Handle response of authentication redirect
     *
     * @param $driver
     * @return redirect
     */
    public function oAuthCallback($driver){
        try {
            // Get user information from provider
            $providerUser = Socialite::driver($driver)->user();
            // Get user information from database
            $user = User::where('email', $providerUser->getEmail())->first();
            $lastId = User::orderBy('id', 'desc')->first();
            $lastId = $lastId->id + 1;
            if($user){
                $user->update([
                    'name' => $providerUser->getName(),
                    'oauth_id' => $providerUser->getId(),
                    'oauth_type' => $driver,
                ]);
            }
            else{
                $username = $providerUser->getName();
                $username = strtolower($username);
                $username = str_replace(' ', '-', $username);
                $username = $username.'-'.$lastId;
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'username' => $username,
                    'email' => $providerUser->getEmail(),
                    'oauth_id' => $providerUser->getId(),
                    'oauth_type' => $driver,
                    'password' => 'UsEr CAn rESeT hIs PAssWord!'
                ]);
            }
            Auth::login($user);
            return redirect('/');
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Check for provider allowed and services configured
     *
     * @param $driver
     * @return bool
     */
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }

    /**
     * Send a failed response with a msg
     *
     * @param null $msg
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedResponse($msg = null)
    {
        return redirect('/')->withErrors(['msg' => $msg ?: 'Gagal, silahkan coba lagi dalam beberapa saat.']);
    }
}
