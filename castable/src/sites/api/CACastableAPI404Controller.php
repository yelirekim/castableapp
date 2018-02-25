<?php

final class CACastableAPI404Controller extends PhabricatorController {

  public function shouldRequireLogin() {
    return false;
  }

  public function processRequest() {
    return id(new AphrontJSONResponse)
      ->setAddJSONShield(false)
      ->setContent(array('error' => 'Invalid API method.'))
      ->setHTTPResponseCode(404);
  }

}
