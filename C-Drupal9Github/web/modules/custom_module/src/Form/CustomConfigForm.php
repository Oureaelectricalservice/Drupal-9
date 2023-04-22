<?php

namespace Drupal\custom_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomConfigForm extends ConfigFormBase
{

  const Settings = 'custom_config_form.settings';

  /**
   * @inheritDoc
   */
  protected function getEditableConfigNames()
  {
    return [
      static::Settings
    ];
  }

  /**
   * @inheritDoc
   */
  public function getFormId()
  {
    return "custom_config_form";
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('custom_config_form.settings');

    $form['first_name'] = [
      '#type' => "textfield",
      '#title' => "First Name",
      '#default_value' => $config->get('first_name') ?: ""
    ];

    $form['last_name'] = [
      '#type' => "textfield",
      '#title' => "Last Name",
      '#default_value' => $config->get('last_name') ?: ""
    ];

    $form['phone'] = [
      '#type' => "textfield",
      '#title' => "Phone",
      '#default_value' => $config->get('phone') ?: ""
    ];

    $form['email'] = [
      '#type' => "email",
      '#title' => "Email",
      '#default_value' => $config->get('email') ?: ""
    ];
    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $form_values = $form_state->getValues();
     $this->config('custom_config_form.settings')
       ->set('first_name', $form_values['first_name'])
       ->set('last_name', $form_values['last_name'])
       ->set('phone', $form_values['phone'])
       ->set('email', $form_values['email'])
       ->save();
     parent::submitForm($form, $form_state);
  }
}
