<?php

namespace App\Http\Controllers;

use App\Services\TotpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller;
use OTPHP\TOTP;

class AuthenticationController extends Controller
{
    private $totpService;

    public function __construct(TotpService $totpService)
    {
        $this->totpService = $totpService;
    }

    public function authenticateUser()
    {
        return view('authenticate');
    }

    public function processAuthenticateUser(Request $request)
    {
        $code = $request->input('code');
        $username = $request->input('username');

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'username' => 'required'
        ]);

        $viewData = ['code' => $code, 'username' => $username];

        if ($validator->fails()) {
            $viewData['errors'] = $validator->errors()->messages();
        } else {
            $verification = $this->totpService->verify($username, $code);

            $viewData['verified'] = $verification['valid'];
            $viewData['verificationError'] = $verification['errorMessage'] ?? null;
        }

        return view('authenticate', $viewData);

    }
}