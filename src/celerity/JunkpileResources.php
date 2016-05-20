<?php

final class JunkpileResources extends CelerityResourcesOnDisk {

  public function getName() {
    return 'junkpile';
  }

  public function getPathToResources() {
    return $this->getJunkpilePath('resources/');
  }

  public function getPathToMap() {
    return $this->getJunkpilePath('resources/map.php');
  }

  private function getJunkpilePath($to_file) {
    return dirname(phutil_get_library_root('junkpile')).'/'.$to_file;
  }

  public function getResourcePackages() {
    return include $this->getJunkpilePath('resources/packages.php');
  }

}
