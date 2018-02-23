<?php

final class CASQLPatchList extends PhabricatorSQLPatchList {

  private static $dbNames = [
    'podcasts',
  ];

  public function getNamespace() {
    return 'castable';
  }

  public function getPatches() {
    $patches = [];

    foreach (self::$dbNames as $db_name) {
      $patch = [
        'name' => $db_name,
        'type' => 'db',
      ];
      if (!$patches) {
        $patch['after'] = [];
      }
      $patches['db.'.$db_name] = $patch;
    }

    $patches += $this->buildPatchesFromDirectory(ca_resolve_subpath('castable/resources/sql'));

    return $patches;
  }

}