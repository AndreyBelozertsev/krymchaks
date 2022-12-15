<?php

namespace App\Http\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use AdminFormElement;
use AdminColumnFilter;
use SleepingOwl\Admin\Section;
use App\Models\Setting as SetModel;
use App\Admin\Form\Buttons\MainMenu;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;

/**
 * Class Setting
 *
 * @property \App\Models\Setting $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Setting extends Section implements Initializable
{
       /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Контакты";

    protected $controllerClass = 'App\Http\Controllers\SettingController';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->setIcon('fa fa-cogs');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
  

        $fields1 = [
            AdminFormElement::text('organization', 'Название организации')
                ->setDefaultValue(SetModel::where('key','organization')->value('value'))
                ->required(),
            AdminFormElement::text('phone', 'Номер телефона')
                ->setDefaultValue(SetModel::where('key','phone')->value('value'))
                ->required(),
            AdminFormElement::text('email', 'Адрес электронной почты')
                ->setDefaultValue(SetModel::where('key','email')->value('value'))
                ->required(),
            AdminFormElement::text('address', 'Адрес')
                ->setDefaultValue(SetModel::where('key','address')->value('value'))
                ->required(),
            AdminFormElement::text('work_time', 'Режим работы')
                ->setDefaultValue(SetModel::where('key','work_time')->value('value')),
            AdminFormElement::text('vk', 'Вконтакте')
                ->setDefaultValue(SetModel::where('key','vk')->value('value')),
            AdminFormElement::text('telegram', 'Telegram')
                ->setDefaultValue(SetModel::where('key','telegram')->value('value')),
        ];
        $fields2 = [
            AdminFormElement::wysiwyg('policy', 'Политика обработки перснальных данных', 'ckeditor')
                ->setHeight('450')
                ->setDefaultValue(SetModel::where('key','policy')->value('value'))
                ->required(),
        ];

        $tabs = AdminDisplay::tabbed();

        $tabs->setTabs(function ($id) use ($fields1, $fields2) {
            $tabs = [];

            $tabs[] = AdminDisplay::tab(AdminForm::elements($fields1))->setLabel('Контактные данные');
            $tabs[] = AdminDisplay::tab(AdminForm::elements($fields2))->setLabel('Политика обработки персональных данных');

            return $tabs;
        });

        $form = AdminForm::card()->setElements([$tabs]);
        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'main'  => new MainMenu(),
        ]);

        return $form;
    }
    

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return false;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
