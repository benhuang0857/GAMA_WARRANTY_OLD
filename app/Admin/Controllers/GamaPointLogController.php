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
        $grid->column('userid_share', '推薦人ID');
        $grid->column('userid_used', '使用人ID');
        $grid->column('point', '點數');
        $grid->column('status', '是否通過')->display(function ($status) {
            if($status == 'ON')
            {
                return '<span class="badge rounded-pill" style="background-color:green">通過</span>';
            }
            else
            {
                return '<span class="badge rounded-pill" style="background-color:red">審核中</span>';
            }
        });
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

        $show->field('id', 'ID');
        $show->field('userid_share', '推薦人ID');
        $show->field('userid_used', '使用人ID');
        $show->field('point', '點數');
        $show->field('status', '是否通過');
        $show->field('note', '註記');
        $show->field('created_at', '創建時間');
        $show->field('updated_at', '更新時間');

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

        $form->text('userid_share', '推薦人ID');
        $form->text('userid_used', '使用人ID');
        $form->number('point', '點數');
        $form->select('status', '是否通過')->options([
            'OFF' => '未啟用',
            'ON' => '啟用',
        ]);
        $form->text('note', '註記');
        $form->select('used', '是否使用')->options([
            'NO' => '未使用',
            'YES' => '已使用',
        ]);

        $form->saving(function ($form) {

            if($form->status == 'ON' && $form->used == 'NO')
            {
                $user_share = User::where('uniqid', $form->userid_share)->first();
                $user_share->gama_point += $form->point;
                $user_share->save();

                $user_used = User::where('uniqid', $form->userid_used)->first();
                $user_used->gama_point += $form->point;
                $user_used->save();

                $form->used = 'YES';
            }
        });

        return $form;
    }
}
