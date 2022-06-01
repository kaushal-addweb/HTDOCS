<?php

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Code\Database\Database;

class EmployeeForm extends FormBase
{
  /**
   * {@inheritdoc}
   */

  public function getFormId()
  {
    return 'create_employee';
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $genderOptions = array(
      // '0' => 'Select Gender',
      'Male' => 'Male',
      'Female' => 'Female',
      'Other' => 'Other'
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => 'Name',
      '#default_value' => '',
      '#required' => true,
      '#attributes'=> array(
        'placeholder'=>"Name"
      )
    );

    $form['gender'] = array(
      '#type' => 'select',
      '#title' => 'Gender',
      '#options' => $genderOptions,
      '#required' => true
    );

    $form['about_employee'] = array(
      '#type' => 'textarea',
      '#title' => 'About Employee',
      '#default_value' => '',
      '#required' => true,
      '#attributes'=>array(
        'placeholder'=>'About Employee'
      )
    );

    $form['save'] = array(
      '#type' => 'submit',
      '#value' => 'Save Employee',
      '#button_type' => 'primary'
    );
    // $form['actions'] = [
    //   '#type' => 'actions',
    // ];
    // $form['actions']['submit'] = [
    //   '#type' => 'submit',
    //   '#value' => $this->t('Submit'),
    // ];

    // // Add a reset button
    // $form['actions']['reset'] = [
    //   '#type' => 'button',
    //   '#button_type' => 'reset',
    //   '#value' => $this->t('Reset'),
    //   '#attributes' => [
    //     'onclick' => 'this.form.reset(); return false;',
    //   ],
    // ];

    return $form;
  }

 /**
  * {@inheritdoc}
 */

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $name=$form_state->getValue('name');
    if(trim($name)=='')
    {
    $form_state->setErrorByName('name',$this->t('Name Field is Required'));
    }
    else if($form_state->getValue('gender')=='0')
    {
      $form_state->setErrorByName('gender',$this->t("Gender Field is Required"));
    }
    else if($form_state->getValue('about_employee')=='')
    {
      $form_state->setErrorByName('about_employee',$this->t("About Employee Field is Required"));
    }
  }


  /**
   * {@inheritdoc}
   */

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
     $postData = $form_state->getValues();
    // echo "<pre>";
    // print_r($postData);
    // echo "</pre>";
    // exit;
    unset($postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);
    $query= \Drupal::database();
    $query->insert('employees')->fields($postData)->execute();

    //drupal_set_message(t('Employee data saved successfully'),'status',TRUE);
    \Drupal::messenger()->addStatus('Employee data saved successfully');
    // \Drupal::messenger()->addError('Employee data saved successfully');
    // \Drupal::messenger()->addWarning('Employee data saved successfully');

  }
}
