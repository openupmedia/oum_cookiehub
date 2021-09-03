<?php

namespace Drupal\oum_cookiehub\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure OUM Cookiehub settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'oum_cookiehub_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['oum_cookiehub.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $cookiehub_settings = $this->config('oum_cookiehub.settings');

    $form['url'] = [
      '#type' => 'url',
      '#required' => TRUE,
      '#title' => $this->t('Cookiehub integration url (Production)'),
      '#default_value' => $cookiehub_settings->get('url') ? $cookiehub_settings->get('url') : '',
    ];

    $form['dev_url'] = [
      '#type' => 'url',
      '#required' => TRUE,
      '#title' => $this->t('Cookiehub integration url (Developent)'),
      '#default_value' => $cookiehub_settings->get('dev_url') ? $cookiehub_settings->get('dev_url') : '',
    ];

    $form['dev_mode'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable development mode'),
      '#default_value' => $cookiehub_settings->get('dev_mode') ? $cookiehub_settings->get('dev_mode') : 0,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('oum_cookiehub.settings')
      ->set('url', $form_state->getValue('url'))
      ->set('dev_url', $form_state->getValue('dev_url'))
      ->set('dev_mode', $form_state->getValue('dev_mode'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
