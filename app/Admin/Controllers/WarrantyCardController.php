<?php

namespace App\Admin\Controllers;

use App\WarrantyCard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WarrantyCardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WarrantyCard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WarrantyCard());

        //$grid->column('id', __('Id'));
        $grid->column('card_id', '保卡編號')->width(130);
        $grid->column('name', '用戶名')->width(80);
        $grid->column('mobile', '手機')->width(120);
        //$grid->column('address', '地址')->width(200);
        //$grid->column('email', __('Email'))->width(200);
        $grid->column('car_license', '車牌')->width(80);
        $grid->column('car_brand', '車子品牌')->width(80);
        $grid->column('warranty_type', '保卡型號')->width(100);
        $grid->column('construction_by', '施工店家號')->width(100);
        $grid->column('construction_date', '施工日期')->width(100);
        //$grid->column('warranty_body', '施工項目');
        $grid->column('price', '施工費用')->width(100);
        $grid->column('recommand_user_id', '推薦人ID')->width(100);
        $grid->column('status', '保卡狀態')->display(function ($status) {
            if($status == 'ON')
            {
                return '<span class="badge rounded-pill" style="background-color:green">通過</span>';
            }
            else
            {
                return '<span class="badge rounded-pill" style="background-color:red">審核中</span>';
            }
        })->width(100);
        $grid->column('created_at', '建立日期')->width(100);
        $grid->column('enddate', '到期日')->width(100);
        //$grid->column('updated_at', '更新日期');

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
        $show = new Show(WarrantyCard::findOrFail($id));

        //$show->field('id', __('Id'));
        $show->field('card_id', '保卡編號');
        $show->field('name', '用戶名');
        $show->field('mobile', '手機');
        $show->field('address', '地址');
        $show->field('email', __('Email'));
        $show->field('car_license', '車牌');
        $show->field('car_brand', '車子品牌');
        $show->field('warranty_type', '保卡型號');
        $show->field('construction_by', '施工店家號');
        $show->field('construction_date', '施工日期');
        $show->field('warranty_body', '施工項目');
        $show->field('price', '施工費用');
        $show->field('recommand_user_id', '推薦人ID');
        $show->field('status', '保卡狀態');
        $show->field('created_at', '建立日期');
        $show->field('updated_at', '更新日期');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WarrantyCard());

        $form->text('card_id', '保卡編號')->readonly();
        $form->text('name', '用戶名');
        $form->mobile('mobile', '手機')->options(['mask' => '99-9999-9999']);
        $form->text('address', '地址');
        $form->email('email', __('Email'));
        $form->text('car_license', '車牌');
        $form->text('car_brand', '車子品牌');
        $form->text('warranty_type', '保卡型號');
        $form->text('construction_by', '施工店家號');
        $form->date('construction_date', '施工日期');
        $form->textarea('warranty_body', '施工項目');
        $form->text('price', '施工費用');
        $form->text('recommand_user_id', '推薦人ID')->readonly();
        $form->file('card_pic_src', '上傳');
        $form->select('status', '保卡狀態')->options([
            'OFF' => '未啟用',
            'ON' => '啟用',
        ]);
        $form->date('startdate', '保卡開始日期')->default('');
        $form->date('enddate', '保卡結束日期')->default('');

        $form->saving(function (Form $form) {
            if ($form->status == 'ON' && $form->startdate == '' && $form->model()->has_enabled == 'no') {
                $form->startdate = now();
                $form->enddate = Date('y-m-d', strtotime('+360 days'));
                $form->has_enabled = 'yes';
            }
        });

        return $form;
    }
}
