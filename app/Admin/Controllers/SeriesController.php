<?php

namespace App\Admin\Controllers;

use App\Series;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SeriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Series';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Series());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('gama_point', __('Gama point'));
        $grid->column('warranty_time', __('Warranty time'));
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
        $show = new Show(Series::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('gama_point', __('Gama point'));
        $show->field('warranty_time', __('Warranty time'));
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
        $form = new Form(new Series());

        $form->text('name', __('Name'));
        $form->number('gama_point', __('Gama point'));
        $form->number('warranty_time', __('Warranty time'))->default(5);

        return $form;
    }
}
