<?php
namespace App\Http\Controllers;
use Event;
use App\Podcast;
use App\Events\PodcastWasPurchased;
use Illuminate\Support\Facades\Redis; //redis引入
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $userId
     * @param  int  $podcastId
     * @return Response
     */
    public function purchasePodcast($id)
    {
        // Purchase podcast logic...
        Event::fire(new PodcastWasPurchased($id));
    }

    /**
     * 显示指定用户属性
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        $user = Redis::get('user:profile:'.$id);
        return view('user.profile', ['user' => $user]);
    }

}
