<?php

abstract class CAPodcastsSearchEngine
  extends PhabricatorApplicationSearchEngine {

  public function getApplicationClassName() {
    return 'CAPodcastsApplication';
  }

}
