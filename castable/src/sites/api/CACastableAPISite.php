<?php

final class CACastableAPISite extends CACastableSite {

  public function getDescription() {
    return pht('Serves the Castable API.');
  }

  public function getPriority() {
    return 10000;
  }

  public function newSiteForRequest(AphrontRequest $request) {
    $host = $request->getHost();

    $uris = array(
      'http://api.castableapp.com/',
    );

    if ($this->isHostMatch($host, $uris)) {
      return new CACastableAPISite();
    }

    return null;
  }

  public function getRoutingMaps() {
    $app = PhabricatorApplication::getByClass('CACastableAPIApplication');

    $maps = array();
    $maps[] = $this->newRoutingMap()
      ->setApplication($app)
      ->setRoutes($app->getRoutes());

    return $maps;
  }

  public function new404Controller(AphrontRequest $request) {
    return new CACastableAPI404Controller();
  }

}