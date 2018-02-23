<?php

final class CAPodcastListController
  extends CAPodcastsController {

  public function handleRequest(AphrontRequest $request) {
    return id(new CAPodcastSearchEngine())
      ->setController($this)
      ->buildResponse();
  }

}
