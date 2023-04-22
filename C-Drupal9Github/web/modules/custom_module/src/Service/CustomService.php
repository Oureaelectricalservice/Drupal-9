<?php

namespace Drupal\custom_module\Service;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CustomService {

  /**
   * Returns the current user information.
   */
  public function getCurrentUserInfo() {

    $current_user = \Drupal::currentUser();

    $user_info = [
      'id' => $current_user->id(),
      'name' => $current_user->getAccountName(),
      'email' => $current_user->getEmail(),
    ];

    return $user_info;
  }
}
