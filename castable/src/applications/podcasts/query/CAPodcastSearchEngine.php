<?php

final class CAPodcastSearchEngine
  extends CAPodcastsSearchEngine {

  public function getResultTypeDescription() {
    return pht('Podcasts');
  }

  public function newQuery() {
    return new CAPodcastQuery();
  }

  protected function buildQueryFromParameters(array $map) {
    $query = $this->newQuery();

    return $query;
  }

  protected function buildCustomSearchFields() {
    return array();
  }

  protected function getURI($path) {
    return '/podcasts/'.$path;
  }

  protected function getBuiltinQueryNames() {
    $names = array(
      'all' => pht('All Podcasts'),
    );

    return $names;
  }

  public function buildSavedQueryFromBuiltin($query_key) {
    $query = $this->newSavedQuery();
    $query->setQueryKey($query_key);

    switch ($query_key) {
      case 'all':
        return $query;
    }

    return parent::buildSavedQueryFromBuiltin($query_key);
  }

  protected function renderResultList(
    array $podcasts,
    PhabricatorSavedQuery $query,
    array $handles) {
    assert_instances_of($podcasts, 'CAPodcast');

    $viewer = $this->requireViewer();

    $list = new PHUIObjectItemListView();
    $list->setUser($viewer);
    foreach ($podcasts as $podcast) {
      $item = id(new PHUIObjectItemView())
        ->setObjectName(pht('Podcast %d', $podcast->getID()))
        ->setHeader($podcast->getDisplayName())
        ->setHref($podcast->getViewURI());
      $list->addItem($item);
    }

    $result = new PhabricatorApplicationSearchResultView();
    $result->setObjectList($list);
    $result->setNoDataString(pht('No podcasts found.'));

    return $result;
  }

}
