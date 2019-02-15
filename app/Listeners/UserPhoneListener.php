<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserCreated;
use App\Phone;

class UserPhoneListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(UserCreated $event)
    {
        $data = $this->request->all();
        $data['phones'] = json_decode($data['phones']);
        $user = $event->getUser();
        try{
            if (isset($data['phones']) && count($data['phones']) > 0){
                foreach($data['phones'] as $phone){
                    $phone = Phone::create(['number' => $phone[0]]);
                    $phone->user_phone()->attach(['user_id' => $user->id]);
                }
            }
        }catch(\Exception $e){}
    }
}
