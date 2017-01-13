<?php
namespace App\Http\Controllers;

use App\Ipapp\Contracts\AnnouncementRepository;
use App\Ipapp\Contracts\NotificationRepository;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    /**
     * The announcements repository.
     *
     * @var AnnouncementRepository
     */
    protected $announcements;

    /**
     * The notifications repository.
     *
     * @var NotificationRepository
     */
    protected $notifications;

    /**
     * Create a new controller instance.
     *
     * @param  AnnouncementRepository  $announcements
     * @param  NotificationRepository  $notifications
     * @return void
     */
    public function __construct(AnnouncementRepository $announcements,
                                NotificationRepository $notifications)
    {
        $this->announcements = $announcements;
        $this->notifications = $notifications;

        $this->middleware('auth');
    }

    /**
     * Get the recent notifications and announcements for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function recent(Request $request)
    {
        return response()->json([
            'announcements' => $this->announcements->recent()->toArray(),
            'notifications' => $this->notifications->recent($request->user())->toArray(),
        ]);
    }

    /**
     * Mark the given notifications as read.
     *
     * @param  Request  $request
     * @return null
     */
    public function markAsRead(Request $request)
    {
        Notification::whereIn('id', $request->notifications)->update(['read_at' => Carbon::now()]);
    }
}
