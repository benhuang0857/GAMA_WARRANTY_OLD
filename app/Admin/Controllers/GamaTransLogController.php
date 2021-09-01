<?php

namespace App\Admin\Controllers;

use App\GamaTransLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GamaTransLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GamaTransLog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GamaTransLog());

        $grid->column('id', __('Id'));
        $grid->column('product_name', __('Product name'));
        $grid->column('user_uniqid', __('User uniqid'));
        $grid->column('user_name', __('User name'));
        $grid->column('user_mobile', __('User mobile'));
        $grid->column('cost', __('Cost'));
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
        $show = new Show(GamaTransLog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_name', __('Product name'));
        $show->field('user_uniqid', __('User uniqid'));
        $show->field('user_name', __('User name'));
        $show->field('user_mobile', __('User mobile'));
        $show->field('cost', __('Cost'));
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
        $form = new Form(new GamaTransLog());

        $form->text('product_name', __('Product name'));
        $form->text('user_uniqid', __('User uniqid'));
        $form->text('user_name', __('User name'));
        $form->text('user_mobile', __('User mobile'));
        $form->number('cost', __('Cost'));

        return $form;
    }
}
