<?php

final class CAPodcastSearchConduitAPIMethod
  extends PhabricatorSearchEngineAPIMethod {

  public function getAPIMethodName() {
    return 'podcast.search';
  }

  public function newSearchEngine() {
    return new CAPodcastSearchEngine();
  }

  public function getMethodSummary() {
    return pht('Search for information about podcasts.');
  }

}
