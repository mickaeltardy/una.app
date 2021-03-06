<?php

namespace App\Composers\Modal;

class ModalComposer {

    public function __construct()
    {
        //
    }

    public function compose($view)
    {
        // we manage the alert message
        if($alert = session()->get('alert')){
            $view->with('alert', $alert);
            session()->forget('alert');
        }

        // we manage the confirm message
        if($confirm = session()->get('confirm')){
            $view->with('confirm', $confirm);
            session()->forget('confirm');
        }
    }

}