<?php

final class CAPodcastPHIDType extends CAPodcastsPHIDType {

  const TYPECONST = 'CAST';

  public function getTypeName() {
    return pht('Podcast');
  }

  public function newObject() {
    return new CAPodcast();
  }

  protected function buildQueryForObjects(
    PhabricatorObjectQuery $query,
    array $phids) {

    return id(new CAPodcastQuery())
      ->withPHIDs($phids);
  }

  public function loadHandles(
    PhabricatorHandleQuery $query,
    array $handles,
    array $objects) {

    $viewer = $query->getViewer();
    foreach ($handles as $phid => $handle) {
      $item = $objects[$phid];

      $handle->setName($item->getDisplayName());
      $handle->setURI($item->getViewURI());
    }
  }

}
