<?php

abstract class CAPodcastsQuery extends PhabricatorCursorPagedPolicyAwareQuery {

  public function getQueryApplicationClass() {
    return 'CAPodcastsApplication';
  }

}
