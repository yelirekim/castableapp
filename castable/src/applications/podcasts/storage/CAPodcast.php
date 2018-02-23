<?php

final class CAPodcast extends CAPodcastsDAO
  implements
  PhabricatorPolicyInterface {

  protected $data;
  protected $iTunesTrackID;

  protected function getConfiguration() {
    return array(
      self::CONFIG_AUX_PHID => true,
      self::CONFIG_SERIALIZATION => array(
        'data' => self::SERIALIZATION_JSON,
      ),
      self::CONFIG_KEY_SCHEMA => array(
        'key_itunes_track' => array(
          'columns' => array('iTunesTrackID'),
          'unique' => true,
        ),
      ),
    ) + parent::getConfiguration();
  }

  public function getDisplayName() {
    return $this->getDataKey('trackName');
  }

  public function getDataKey($key) {
    return idx($this->data, $key);
  }

  public function setDataKey($key, $value) {
    $this->data[$key] = $value;
    return $this;
  }

  public function getTableName() {
    return 'podcast';
  }

  public function getViewURI() {
    return '/podcast/view/'.$this->getID().'/';
  }


  /* -(  PhabricatorPolicyInterface  )----------------------------------------- */


  public function getCapabilities() {
    return array(
      PhabricatorPolicyCapability::CAN_VIEW,
    );
  }

  public function getPolicy($capability) {
    switch ($capability) {
      case PhabricatorPolicyCapability::CAN_VIEW:
        return PhabricatorPolicies::getMostOpenPolicy();
    }
  }

  public function hasAutomaticCapability($capability, PhabricatorUser $viewer) {
    return false;
  }

  public function getPHIDType() {
    return CAPodcastPHIDType::TYPECONST;
  }

}