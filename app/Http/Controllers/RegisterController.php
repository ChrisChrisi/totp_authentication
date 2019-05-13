<?php


namespace App\Http\Controllers;

use App\Services\TotpService;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private $totpService;

    public function __construct(TotpService $totpService)
    {
        $this->totpService = $totpService;
    }

    public function grantAccess()
    {
        return view('grant_access');
    }

    public function processGrantAccess(Request $request)
    {
        $label = $request->input('label');
        $username = $request->input('username');

        $validator = Validator::make($request->all(), [
            'label' => 'required',
            'username' => 'required'
        ]);

        $viewData = ['label' => $label, 'username' => $username];
        if ($validator->fails()) {
            $viewData['errors'] = $validator->errors()->messages();
            return view('grant_access', $viewData);
        }

        $otp = $this->totpService->create($username, $label);
        $viewData['qr_code'] = (new QRCode)->render($otp->getProvisioningUri());

        return view('access_granted', $viewData);

    }

}