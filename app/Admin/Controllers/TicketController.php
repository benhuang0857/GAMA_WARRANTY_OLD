<?php

namespace App\Admin\Controllers;

use App\Ticket;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TicketController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ticket';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ticket());

        $grid->column('id', __('Id'));
        $grid->column('code_type', __('Code type'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('image', __('Image'));
        $grid->column('description', __('Description'));
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
        $show = new Show(Ticket::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code_type', __('Code type'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Ticket());

        $form->text('code_type', __('適用何種票卷'));
        $form->text('name', __('票卷名稱'));
        // $form->text('city', __('城市'));
        // $form->text('area', __('區域'));
        $form->number('price', __('價格'));
        $form->image('image', __('圖片'));
        $form->textarea('description', __('內容描述'));

        return $form;
    }
}
