<?php

namespace App\Admin\Controllers;

use App\GamaPointLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\User;

class GamaPointLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GamaPointLog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GamaPointLog());

        $grid->column('id', 'ID');
        $grid->column('user_uniqid', '推薦人ID');
        $grid->column('point', '點數');
        $grid->column('status', '是否通過');
        $grid->column('note', '註記');
        $grid->column('created_at', '創建時間');
        $grid->column('updated_at', '更新時間');

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
        $show = new Show(GamaPointLog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_uniqid', __('User uniqid'));
        $show->field('point', __('Point'));
        $show->field('status', __('Status'));
        $show->field('note', __('Note'));
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
        $form = new Form(new GamaPointLog());

        $form->text('user_uniqid', __('User uniqid'));
        $form->number('point', __('Point'));
        $form->text('status', __('Status'))->default('OFF');
        $form->text('note', __('Note'));
        $form->text('used', '是否使用');

        $form->saving(function ($form) {

            if($form->status == 'ON' && $form->used == 'NO')
            {
                $user = User::where('uniqid', $form->user_uniqid)->first();
                $user->gama_point += $form->point;
                $user->save();

                $form->used = 'YES';
            }
        });

        return $form;
    }
}
