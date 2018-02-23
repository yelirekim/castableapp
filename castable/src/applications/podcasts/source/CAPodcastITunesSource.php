<?php

final class CAPodcastITunesSource extends CAPodcastSource {

  const SOURCETYPE = 'itunes';

  public function searchPodcasts($query) {
    list ($body, $headers) = id(new HTTPSFuture(
        "https://itunes.apple.com/search?media=podcast&term={$query}"
      ))
      ->resolvex();
    $items = phutil_json_decode($body);
    $results = idx($items, 'results');
    $podcasts = [];
    foreach ($results as $result) {
      $podcasts[] = id(new CAPodcast())
        ->setITunesTrackID(idx($result, 'trackId'))
        ->setData($result);
    }
    return $podcasts;
  }

}
