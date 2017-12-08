<?php
namespace App\Events;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
class PodcastWasPurchased extends Event
{
    use SerializesModels;
    public $podcast;
    /**
     * Create a new event instance.
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
