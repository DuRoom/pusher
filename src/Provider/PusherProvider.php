<?php

/*
 * This file is part of DuRoom.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace DuRoom\Pusher\Provider;

use DuRoom\Foundation\AbstractServiceProvider;
use DuRoom\Settings\SettingsRepositoryInterface;

class PusherProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->app->bind(\Pusher::class, function () {
            $settings = $this->app->make(SettingsRepositoryInterface::class);

            $options = [];

            if ($cluster = $settings->get('duroom-pusher.app_cluster')) {
                $options['cluster'] = $cluster;
            }

            return new \Pusher(
                $settings->get('duroom-pusher.app_key'),
                $settings->get('duroom-pusher.app_secret'),
                $settings->get('duroom-pusher.app_id'),
                $options
            );
        });
    }
}
