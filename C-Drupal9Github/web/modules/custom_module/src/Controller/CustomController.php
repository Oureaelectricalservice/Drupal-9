<?php

namespace Drupal\custom_module\Controller;

class CustomController
{

  public function getContent(){

    $db = \Drupal::service('database');
    $currentUserInfo = \Drupal::service('custom_module.custom_service')->getCurrentUserInfo();

    return [
      "#markup" => $currentUserInfo['id']
    ];
  }
}
