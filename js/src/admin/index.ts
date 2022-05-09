import app from 'duroom/admin/app';

app.initializers.add('duroom-pusher', () => {
  app.extensionData
    .for('duroom-pusher')
    .registerSetting(
      {
        setting: 'duroom-pusher.app_id',
        label: app.translator.trans('duroom-pusher.admin.pusher_settings.app_id_label'),
        type: 'text',
      },
      30
    )
    .registerSetting(
      {
        setting: 'duroom-pusher.app_key',
        label: app.translator.trans('duroom-pusher.admin.pusher_settings.app_key_label'),
        type: 'text',
      },
      20
    )
    .registerSetting(
      {
        setting: 'duroom-pusher.app_secret',
        label: app.translator.trans('duroom-pusher.admin.pusher_settings.app_secret_label'),
        type: 'text',
      },
      10
    )
    .registerSetting(
      {
        setting: 'duroom-pusher.app_cluster',
        label: app.translator.trans('duroom-pusher.admin.pusher_settings.app_cluster_label'),
        type: 'text',
      },
      0
    );
});
