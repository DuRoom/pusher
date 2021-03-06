import * as PusherTypes from 'pusher-js';

declare module 'duroom/forum/ForumApplication' {
  export default interface ForumApplication {
    pusher: Promise<{
      channels: {
        main: PusherTypes.Channel;
        user: PusherTypes.Channel | null;
      };
      pusher: PusherTypes.default;
    }>;

    pushedUpdates: Array<any>;
  }
}
