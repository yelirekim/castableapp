<?php

abstract class CAPodcastSource extends Phobject {

  final public function getSourceTypeConstant() {
    return $this->getPhobjectClassConstant('SOURCETYPE', 64);
  }

  final public static function getAllSources() {
    return id(new PhutilClassMapQuery())
      ->setAncestorClass(__CLASS__)
      ->setUniqueMethod('getSourceTypeConstant')
      ->execute();
  }

  final public static function newSource($type) {
    $source = idx(self::getAllSources(), $type);
    if (!$source) {
      throw new UnexpectedValueException(
        pht('No podcast source of type "%s" exists.', $type));
    }
    return clone $source;
  }

  abstract public function searchPodcasts($title_query);

}
