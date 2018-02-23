<?php

final class CAPodcastQuery
  extends CAPodcastsQuery {

  private $ids;
  private $phids;
  private $iTunesTrackIDs;

  public function withIDs(array $ids) {
    $this->ids = $ids;
    return $this;
  }

  public function withPHIDs(array $phids) {
    $this->phids = $phids;
    return $this;
  }

  public function withITunesTrackIDs(array $ids) {
    $this->iTunesTrackIDs = $ids;
    return $this;
  }

  public function newResultObject() {
    return new CAPodcast();
  }

  protected function loadPage() {
    return $this->loadStandardPage($this->newResultObject());
  }

  protected function buildWhereClauseParts(AphrontDatabaseConnection $conn) {
    $where = parent::buildWhereClauseParts($conn);

    if ($this->ids !== null) {
      $where[] = qsprintf(
        $conn,
        'id IN (%Ld)',
        $this->ids);
    }

    if ($this->phids !== null) {
      $where[] = qsprintf(
        $conn,
        'phid IN (%Ls)',
        $this->phids);
    }

    if ($this->iTunesTrackIDs !== null) {
      $where[] = qsprintf(
        $conn,
        'iTunesTrackID IN (%Ld)',
        $this->iTunesTrackIDs);
    }

    return $where;
  }

}
