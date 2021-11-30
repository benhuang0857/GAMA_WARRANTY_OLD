<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', '用戶名');
            $filter->like('uniqid', '系統自動產生ID');
            $filter->like('mobile', '手機號');
            $filter->like('email', 'Email');
            $filter->equal('status', '狀態')->select(['ON' => '啟用', 'OFF' => '未啟用']);
        });
        
        $grid->column('id', __('Id'));
        $grid->column('name', '姓名');
        $grid->column('email', __('Email'));
        $grid->column('mobile', '手機');
        //$grid->column('password', __('Password'));
        //$grid->column('address', '住家地址');
        //$grid->column('avatar', '頭像');
        $grid->column('gama_point', 'Gama點數');
        $grid->column('status', '會員狀態')->display(function ($status) {
            if($status == 'ON')
            {
                return '<span class="badge rounded-pill" style="background-color:green">通過</span>';
            }
            else
            {
                return '<span class="badge rounded-pill" style="background-color:red">審核中</span>';
            }
        });
        $grid->column('created_at', '創建時間')->sortable();
        //$grid->column('updated_at', '更新時間');

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('address', __('Address'));
        $show->field('mobile', __('Mobile'));
        $show->field('avatar', __('Avatar'));
        $show->field('gama_point', __('Gama point'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', '姓名');
        $form->text('uniqid', '系統自動產生ID')->value(uniqid())->readonly();
        $form->email('email', __('Email'));
        $form->mobile('mobile', '電話')->options(['mask' => '9999999999']);
        $form->password('password', '密碼');
        $form->select('status', '保卡狀態')->options([
            'OFF' => '未啟用',
            'ON' => '啟用',
        ]);
        $form->saving(function (Form $form) {
            if ($form->password == null)
            {
                $form->password = $form->model()->password;
            }
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });
        $form->text('address', '住家地址');
        $form->image('avatar', '頭像');
        $form->number('gama_point', 'Gama點數')->default(0);

        return $form;
    }
}
