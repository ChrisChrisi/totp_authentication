<?php

namespace App\Services;

use App\Models\TotpUser;
use OTPHP\TOTP;

class TotpService
{
    /**
     * Generate TOTP object and persist in DB
     * @param string $username
     * @param string $label
     * @return TOTP
     */
    public function create(string $username, string $label): TOTP
    {
        $otp = TOTP::create();
        $otp->setLabel($username);
        $otp->setIssuer($label);

        TotpUser::updateOrCreate(['username' => $username], ['secret' => $otp->getSecret()]);

        return $otp;
    }

    /**
     * Verify TOTP code
     * @param string $username
     * @param string $code - totp code
     * @return array
     */
    public function verify(string $username, string $code)
    {
        $result = [
            'valid' => false,
        ];

        $totpUser = TotpUser::where('username', $username)->first();
        if (!isset($totpUser)) {
            $result['errorMessage'] = 'User not found';
            return $result;
        }

        $otp = TOTP::create($totpUser->secret);
        $validCode = $otp->verify($code);
        if(!$validCode){
            $result['errorMessage'] = 'Invalid code';
            return $result;
        }

        $result['valid'] = true;

        return $result;
    }
}