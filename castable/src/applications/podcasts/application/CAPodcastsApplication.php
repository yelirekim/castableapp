<?php

final class CAPodcastsApplication extends PhabricatorApplication {

  public function getBaseURI() {
    return '/podcasts/';
  }

  public function getIcon() {
    return 'fa-bullhorn';
  }

  public function getName() {
    return pht('Podcasts');
  }

  public function getShortDescription() {
    return pht('Smooth jazz.');
  }

  public function getTitleGlyph() {
    return "\xE2\x98\xBF";
  }

  public function getFlavorText() {
    return pht('Better than "castrate", at least.');
  }

  public function getApplicationGroup() {
    return self::GROUP_CORE;
  }

  public function getRoutes() {
    return array(
      '/podcasts/' => array(
        $this->getQueryRoutePattern() => 'CAPodcastListController',
      ),
    );
  }

}