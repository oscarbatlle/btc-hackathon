<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Campaign;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TrackingController extends Controller
{

    public function track()
    {
        // Create an image, 1x1 pixel in size
        $im=imagecreate(1,1);

        // Set the background colour
        $white=imagecolorallocate($im,255,255,255);

        // Allocate the background colour
        imagesetpixel($im,1,1,$white);

        // Set the image type
        header("content-type:image/jpg");

        // Create a JPEG file from the image
        imagejpeg($im);

        // Free memory associated with the image
        imagedestroy($im);

        // Get url parameters
        $urlparams = Input::get();

        // Get campaign
        $campaign = Campaign::whereId($urlparams['cmp'])->first();

        if($campaign) {
            Tracking::updateOrCreate([
                'campaign_id' => $campaign->id,
                'clicks'      => $campaign->clicks += 1
            ]);
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Handle rewards
     *
     * @param Request $request
     */
    public function reward(Request $request)
    {
        $transaction = Transaction::create([
            'type'    => 'reward',
            'amount'  => $request->input('amount'),
            'user_id' => '4',
            'wallet'  => 'asdADSassaddfaf3qq44'
        ]);

        return response()->json(['status' => 'success', 'wallet' => $transaction->wallet], 200);
    }
    
}
