<?php

namespace Drupal\indegene_common\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides route responses for the Example module.
 */
class IndegeneController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function myPage() {

    $query = \Drupal::entityQuery('user');

    $uids = $query->execute();

    foreach ($uids as $key => $value) {
      $user = User::load($value);
      $email = $user->getEmail();
      if (isset($email)) {
        $name['names'][] = $user->getEmail();
      }
    }

    $config = \Drupal::service('config.factory')
      ->getEditable('indegene_custom_form.settings');

    $id = $config->get('amazon_id');


    // Create file object from remote URL.
    $data = file_get_contents('https://www.drupal.org/files/druplicon.small_.png');
    $file = file_save_data($data, 'public://druplicon.png', FILE_EXISTS_REPLACE);

    // Create node object with attached file.
    $node = Node::create([
      'type' => 'article',
      'title' => 'Druplicon test',
    ]);
    $node->save();


    $user=getUser();


    $language = Drupal::languageManager()->getLanguage('en');
    $url = Url::fromRoute('<front>', [], ['language' => $language]);
    $response = new RedirectResponse($url->toString());
    $response->send();

    return $response;
  }


  public function dynamicargs($args) {


    $recipient = $args;
    $params['message'] = 'hello how are you';
    $params['subject'] = 'Indegene custom subject';
    $mailManager = \Drupal::service('plugin.manager.mail');
    $result = $mailManager->mail('indegene_common', 'forward_email', $recipient, 'en', $params, NULL, TRUE);

    return [
      '#markup' => 'Name ' . $args,
    ];

  }


}