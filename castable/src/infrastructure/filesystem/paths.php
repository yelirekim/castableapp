<?php

function ca_resolve_subpath($subpath) {
  $root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
  return Filesystem::resolvePath($subpath, $root);
}
