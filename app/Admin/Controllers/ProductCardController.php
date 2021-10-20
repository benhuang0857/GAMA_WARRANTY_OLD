<?php

namespace App\Admin\Controllers;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductCardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', '商品名稱');
            $filter->equal('status', '狀態')->select(['ON' => '啟用', 'OFF' => '未啟用']);
        });

        $grid->column('id', __('Id'));
        $grid->column('name', '料號');
        $grid->column('sku', __('Sku'));
        $grid->column('category', '產品分類');
        $grid->column('series', '系列');
        $grid->column('gama_point', '反點');
        $grid->column('status', '狀態');
        $grid->column('created_at', '建立時間')->sortable();
        //$grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', '料號');
        $show->field('sku', __('Sku'));
        $show->field('category', '產品分類');
        $show->field('series', '系列');
        $show->field('gama_point', '反點');
        $show->field('status', '狀態');
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
        $form = new Form(new Product());

        $form->text('name', '料號');
        $form->text('sku', __('Sku'));
        $form->text('category', '產品分類');
        $form->text('series', '系列');
        $form->number('gama_point', '反點');
        $form->select('status', '狀態')->options([
            'OFF' => '未啟用',
            'ON' => '啟用',
        ]);

        return $form;
    }
}
