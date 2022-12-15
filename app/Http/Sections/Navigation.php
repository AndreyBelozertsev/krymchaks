<?php

namespace App\Http\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use AdminFormElement;
use AdminColumnFilter;
use App\Models\Navigation as NavigationModel;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;

/**
 * Class Navigation
 *
 * @property \App\Models\Navigation $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Navigation extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Меню';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->setIcon('fa fa-bars');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        

        $display = AdminDisplay::tree()
                ->setParentField('navigation_id')
                ->setOrderField('sort');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {

        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn([
                AdminFormElement::text('title', 'Заголовок')
                    ->required(),
                AdminFormElement::text('url', 'Относительный путь'),
                AdminFormElement::select('navigation_id', 'Родительский пункт', NavigationModel::class)
                    ->setLoadOptionsQueryPreparer(function($element, $query) use($id) {
                        return $query
                            ->where('navigation_id', null)
                            ->where('id','!=',$id)
                            ->orderBy('title');
                    })
                    ->setDisplay('title')
                    ->nullable()
                    ->setDefaultValue(null),
                AdminFormElement::number('sort', 'Порядок сортировки')
                    ->setDefaultValue(500)
                    ->required(), 
                AdminFormElement::select('status', 'Активный пункт?', [
                        true => 'да',
                        false => 'нет'
                    ])
                    ->setDefaultValue(true),
            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4'),
        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
