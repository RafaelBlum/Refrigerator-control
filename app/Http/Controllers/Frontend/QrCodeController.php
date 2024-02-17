<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{


    public function __invoke(Request $request)
    {
        $from = [255, 0, 0];
        $to = [0, 0, 255];
        $data = $qrcode = QrCode::size(400)
            ->backgroundColor(120, 255, 10)
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->color(40, 20, 255)
            ->margin(3)
            ->generate(route('filament.app.auth.login'));
        return view('qrcodes.login')
            ->with('qrcode', $qrcode);
    }
}
