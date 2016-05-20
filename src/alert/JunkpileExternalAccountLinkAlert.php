<?php

final class JunkpileExternalAccountLinkAlert
  extends Phobject {

  public static function alertOnMissingAccountLink(PhabricatorUser $viewer) {
    if (!$viewer->getPHID()) {
      return;
    }

    $account_type = id(new PhutilJIRAAuthAdapter())
      ->getAdapterType();

    $external = id(new PhabricatorExternalAccountQuery())
      ->setViewer($viewer)
      ->withUserPHIDs(array($viewer->getPHID()))
      ->withAccountTypes(array($account_type))
      ->executeOne();

    if ($external) {
      return;
    }

    Javelin::initBehavior(
      'junkpile-alert',
      array(
        'message' => pht(
          'You should link your Phabricator account to your JIRA account.'),
        'uri' => '/settings/panel/external/',
      ),
      'junkpile');
  }

}
