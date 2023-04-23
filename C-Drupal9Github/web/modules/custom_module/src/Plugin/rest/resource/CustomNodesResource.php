<?php

namespace Drupal\custom_module\Plugin\rest\resource;


use Drupal\node\Entity\Node;
use Drupal\rest\Annotation\RestResource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * @RestResource(
 *   id="custom_nodes_resource",
 *   label="Custom Node Resource",
 *   uri_paths= {
 *   "canonical" = "/api/customNodes"
 *   }
 * )
 */
class CustomNodesResource extends ResourceBase
{

  public function get(){
    $a = '';
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->execute();
    $result = [];
    if($nids){
      foreach ($nids as $nid){
        $node = Node::load($nid);
        $result[]['id'] = $node->id();
        $result[]['title'] = $node->getTitle();
      }
    }

    $response = new ResourceResponse($result);

    return $response;
  }
}
