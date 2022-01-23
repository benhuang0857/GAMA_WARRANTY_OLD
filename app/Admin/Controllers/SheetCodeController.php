<?php

namespace App\Admin\Controllers;

use App\SheetCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SheetCodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SheetCode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SheetCode());

        $grid->column('id', __('Id'));
        $grid->column('code_type', __('Code type'));
        $grid->column('code', __('Code'));
        $grid->column('used', __('Used'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SheetCode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code_type', __('Code type'));
        $show->field('code', __('Code'));
        $show->field('used', __('Used'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SheetCode());

        $form->text('code_type', __('Code type'));
        $form->text('code', __('Code'));
        $form->text('used', __('Used'))->default('NO');

        return $form;
    }
}
