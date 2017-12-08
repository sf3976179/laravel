<?php
namespace App\Http\Controllers;
use Event;
use App\Podcast;
use App\Events\PodcastWasPurchased;
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
}
