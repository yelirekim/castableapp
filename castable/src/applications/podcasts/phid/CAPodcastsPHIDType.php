<?php

abstract class CAPodcastsPHIDType extends PhabricatorPHIDType {

  public function getPHIDTypeApplicationClass() {
    return 'CAPodcastsApplication';
  }

}
