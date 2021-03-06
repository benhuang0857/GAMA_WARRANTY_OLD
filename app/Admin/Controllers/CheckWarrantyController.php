<?php

namespace App\Admin\Controllers;

use App\CheckWarranty;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\CheckCode\ImportCheckCode;

class CheckWarrantyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CheckWarranty';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new checkwarranty());

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('check_code', '檢查碼');
            $filter->equal('status', '狀態')->select(['YES' => '已使用', 'NO' => '未使用']);
        });

        $grid->column('id', __('Id'));
        $grid->column('check_code', __('Check code'));
        $grid->column('used', __('Used'));
        $grid->column('bind_user_uniqid', __('Bind user uniqid'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ImportCheckCode());
        });

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
        $show = new Show(checkwarranty::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('check_code', __('Check code'));
        $show->field('used', __('Used'));
        $show->field('bind_user_uniqid', __('Bind user uniqid'));
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
        $form = new Form(new checkwarranty());

        $form->text('check_code', __('Check code'));
        $form->select('used', __('Used'))->options([
            'NO' => '未啟用',
            'YES' => '啟用',
        ])->default('NO');
        $form->text('bind_user_uniqid', __('Bind user uniqid'));

        return $form;
    }
}
