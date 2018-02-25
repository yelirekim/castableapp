<?php

final class CACastableAPIApplication extends PhabricatorApplication {

  public function getBaseURI() {
    return '/';
  }

  public function getIcon() {
    return 'fa-bullhorn';
  }

  public function getName() {
    return pht('API');
  }

  public function getShortDescription() {
    return pht('API.');
  }

  public function getTitleGlyph() {
    return "\xE2\x98\xBF";
  }

  public function getFlavorText() {
    return pht('API');
  }

  public function getApplicationGroup() {
    return self::GROUP_CORE;
  }

  public function getRoutes() {
    return array(
      '/(?P<method>[^/]+)' => 'CACastableAPIController',
    );
  }

}