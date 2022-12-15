<?php

namespace App\Admin\Form\Buttons;
use SleepingOwl\Admin\Form\Buttons\FormButton;

/**
 * Class MainMenu.
 */
class MainMenu extends FormButton
{
    protected $show = true;
    protected $name = 'cancel';
    protected $iconClass = 'fas fa-ban';


    public function __construct()
    {
        $this->setText(trans('sleeping_owl::lang.button.cancel'));
    }

    /**
     * Init Cancel Button.
     */
    public function initialize()
    {
        parent::initialize();

        $this->setUrl(route('admin.dashboard'));
        $this->setHtmlAttributes($this->getHtmlAttributes() + [
            'class' => 'btn btn-warning',
        ]);
    }
}