<?php

final class CAPodcastsImportSearchWorkflow
  extends CAPodcastsImportWorkflow {

  protected function didConstruct() {
    $this
      ->setName('search')
      ->setExamples('**search** --source __source__ __query__')
      ->setSynopsis(pht('Import data using the results of a search query'))
      ->setArguments(
        array(
          array(
            'name' => 'source',
            'param' => 'source',
            'help' => pht('Choose which API source to search.'),
          ),
          array(
            'name'      => 'query',
            'wildcard'  => true,
          ),
        ));
  }

  public function execute(PhutilArgumentParser $args) {
    $query = head($args->getArg('query'));
    $type = $args->getArg('source');
    if (!$type || !$query) {
      throw new PhutilArgumentUsageException(pht(
        'You must provide both a source and a query to this workflow.'));
    }
    $source = CAPodcastSource::newSource($type);
    $podcasts = $source->searchPodcasts($query);
    $podcasts = mpull($podcasts, null, 'getITunesTrackID');
    $importing_ids = array_keys($podcasts);
    $existing = id(new CAPodcastQuery())
      ->setViewer(PhabricatorUser::getOmnipotentUser())
      ->withITunesTrackIDs($importing_ids)
      ->execute();
    $existing_ids = mpull($existing, 'getITunesTrackID');
    $should_import_ids = array_diff($importing_ids, $existing_ids);
    $import_podcasts = array_select_keys($podcasts, $should_import_ids);
    foreach ($import_podcasts as $podcast) {
      echo phutil_console_format("%s\n", $podcast->getDisplayName());
      $podcast->save();
    }
    return 0;
  }
}
