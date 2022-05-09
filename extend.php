<?php

/*
 * This file is part of DuRoom.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use DuRoom\Extend;
use DuRoom\Post\Event\Posted;
use DuRoom\Pusher\Api\Controller\AuthController;
use DuRoom\Pusher\Listener;
use DuRoom\Pusher\Provider\PusherProvider;
use DuRoom\Pusher\PusherNotificationDriver;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Routes('api'))
        ->post('/pusher/auth', 'pusher.auth', AuthController::class),

    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\Notification())
        ->driver('pusher', PusherNotificationDriver::class),

    (new Extend\Settings())
        ->serializeToForum('pusherKey', 'duroom-pusher.app_key')
        ->serializeToForum('pusherCluster', 'duroom-pusher.app_cluster'),

    (new Extend\Event())
        ->listen(Posted::class, Listener\PushNewPost::class),

    (new Extend\ServiceProvider())
        ->register(PusherProvider::class),
];
