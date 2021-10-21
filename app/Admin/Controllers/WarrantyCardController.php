<?php

namespace App\Admin\Controllers;

use App\WarrantyCard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\GamaPointLog;
use App\User;

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

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('check_code', '保卡編號');
            $filter->like('name', '用戶名');
            $filter->like('mobile', '手機號');
            $filter->like('car_license', '車牌');
            $filter->equal('status', '狀態')->select(['ON' => '啟用', 'OFF' => '未啟用']);
        });

        $grid->column('id', __('Id'));
        $grid->column('check_code', '保卡編號')->width(130);
        $grid->column('name', '用戶名')->width(80);
        $grid->column('mobile', '手機')->width(120);
        $grid->column('address', '地址')->width(200);
        //$grid->column('email', __('Email'))->width(200);
        $grid->column('car_license', '車牌')->width(80);
        $grid->column('car_brand', '車子品牌')->width(80);
        $grid->column('carname', '車子款式')->width(80);
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
        $grid->column('created_at', '建立日期')->sortable()->width(100);
        //$grid->column('enddate', '到期日')->width(100);
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
        $show->field('carname', '車子款式');
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

        $form->text('card_id', '保卡編號');
        $form->text('name', '用戶名');
        $form->mobile('mobile', '手機')->options(['mask' => '99-9999-9999']);
        $form->text('address', '地址');
        $form->email('email', __('Email'));
        $form->text('car_license', '車牌');
        $form->text('car_brand', '車子品牌');
        $form->text('carname', '車子款式');
        $form->text('warranty_type', '保卡型號');
        $form->text('construction_by', '施工店家號');
        $form->date('construction_date', '施工日期');
        $form->textarea('warranty_body', '施工項目');
        $form->text('price', '施工費用');
        $form->text('recommand_user_id', '推薦人ID')->default('no');
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
                $form->enddate = Date('y-m-d', strtotime('+1825 days'));
                $form->has_enabled = 'yes';
            }

            if($form->model()->recommand_user_id != 'no')
            {
                $gamaPointLog = GamaPointLog::where('userid_used', $form->model()->user_uniqid)->first();

                //dd($gamaPointLog);
    
                try {
                    if($gamaPointLog->status == 'OFF' && $gamaPointLog->used == 'NO')
                    {
                        $user_share = User::where('uniqid', $gamaPointLog->userid_share)->first();
                        $user_share->gama_point += $gamaPointLog->point;
                        $user_share->save();
        
                        $user_used = User::where('uniqid', $gamaPointLog->userid_used)->first();
                        $user_used->gama_point += $gamaPointLog->point;
                        $user_used->save();
        
                        $gamaPointLog->status = 'ON';
                        $gamaPointLog->used = 'YES';
                        $gamaPointLog->save();
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
                
            }
            
        });

        return $form;
    }
}
