<?php
namespace App\Http\Traits;

use Carbon\Carbon;
use App\Models\Plan;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Response;

trait CommonTrait
{
    public function sendSuccess($message, $data = '')
    {
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $data,
        ]);
    }
    public function sendError($error_message, $code = 400, $data = null)
    {
        return response()->json([
            'status' => $code,
            'message' => $error_message,
            'data' => $data,
        ]);
    }

    public function addFile($file, $path)
    {
        if ($file) {
            if ($file->getClientOriginalExtension() != 'exe') {
                $type = $file->getClientMimeType();
                $destination_path = $path;
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::random(15) . '.' . $extension;
                //$img=Image::make($file);
                $file->move($destination_path, $fileName);
                $file_path = $destination_path . $fileName;
                return $file_path;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getFreeCredits($user_id, $plan_id)
    {
        $plan = Plan::find($plan_id);

        $subscription = new UserSubscription;
        $subscription->user_id =$user_id;
        $subscription->plan_id = $plan->id;
        $subscription->credits = $plan->credits;
        $subscription->available_images = $plan->credits;
        $subscription->expiry_at = $plan->type == 'month' ? Carbon::now()->addDays(30) : Carbon::now()->addYear();
        $subscription->status = 'active';
        $subscription->save();

        return $plan->credits;
    }
}
