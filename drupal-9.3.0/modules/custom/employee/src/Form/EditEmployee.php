<?php

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Code\Database\Database;

class EditEmployee extends FormBase
{
  /**
   * {@inheritdoc}
   */

  public function getFormId()
  {
    return 'edit_employee';
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $id=\Drupal::routeMatch()->getParameter('id');
    $query=\Drupal::database();
    $data=$query->select('employees','e')
          ->fields('e',['id','mobile','name','gender','about_employee'])
          ->condition('e.id',$id,'=')
          ->execute()->fetchAll(\PDO::FETCH_OBJ);
    //print_r($data);

    $genderOptions = array(
      // '0' => 'Select Gender',
      'Male' => 'Male',
      'Female' => 'Female',
      'Other' => 'Other'
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => 'Name',
      '#default_value' => $data[0]->name,
      '#required' => true,
      '#attributes'=> array(
        'placeholder'=>"Name"
      )
    );

    $form['mobile'] = array(
      '#type' => 'textfield',
      '#title' => 'Mobile',
      '#default_value' => $data[0]->mobile,
      '#required' => true,
      '#attributes' => array(
        'placeholder' => "Mobile"
      )
    );

    $form['gender'] = array(
      '#type' => 'select',
      '#title' => 'Gender',
      '#options' => $genderOptions,
      '#required' => true,
      '#default_value'=>$data[0]->gender
    );

    $form['about_employee'] = array(
      '#type' => 'textarea',
      '#title' => 'About Employee',
      '#default_value' => $data[0]->about_employee,
      '#required' => true,
      '#attributes'=>array(
        'placeholder'=>'About Employee'
      )
    );

    $form['update'] = array(
      '#type' => 'submit',
      '#value' => 'Update Employee',
      '#button_type' => 'primary'
    );

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
    else if($form_state->getValue('mobile')=='0')
    {
      $form_state->setErrorByName('mobile',$this->t("Mobile Field is Required"));
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
    $id=\Drupal::routeMatch()->getParameter('id');
    $postData = $form_state->getValues();
    // echo "<pre>";
    // print_r($postData);
    // echo "</pre>";
    // exit;
    unset($postData['update'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);
    $query= \Drupal::database();
    $query->update('employees')->fields($postData)
          ->condition('id',$id)
          ->execute();

    $response= new \Symfony\Component\HttpFoundation\RedirectResponse('../employee-list');
    $response->send();

    //drupal_set_message(t('Employee data saved successfully'),'status',TRUE);
    \Drupal::messenger()->addStatus('Employee data updated successfully');
    // \Drupal::messenger()->addError('Employee data saved successfully');
    // \Drupal::messenger()->addWarning('Employee data saved successfully');

  }
}
