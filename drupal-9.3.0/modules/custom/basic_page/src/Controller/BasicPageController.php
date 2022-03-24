<?php
namespace Drupal\basic_page\Controller;
use Drupal\Core\Controller\ControllerBase;

class BasicPageController extends ControllerBase{
    public function basicpage(){
        return [
        '#title'=>'Basic Page Information',
        '#markup'=>'<h2>This is our Basic Page Information.
        </h2> This is the Sample Module page that is created just for testing purpose.'
        ];
    }

    public function information(){
        $data=array(
            'name'=>'Arun',
            'email'=>'arun@gmail.com',
            'address'=>'Station Road, Jaipur'
        );
        return [
            '#title'=>'Information Page', # Title is hook
            '#theme'=>'information_page', # Theme is hook
            '#items'=> $data
        ];
    }
}
