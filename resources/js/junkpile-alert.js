/**
 * @provides javelin-behavior-junkpile-alert
 */
JX.behavior('junkpile-alert', function(config) {

  var notification = new JX.Notification()
    .setContent(config.message)
    .setDuration(0);

  notification.listen('activate', function() {
    JX.Stratcom.context().kill();
    JX.$U(config.uri).go();
  });

  notification.show();

});
