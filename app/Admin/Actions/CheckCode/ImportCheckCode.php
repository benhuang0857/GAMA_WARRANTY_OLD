<?php

namespace App\Admin\Actions\CheckCode;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use App\Imports\CheckCodeImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportCheckCode extends Action
{
    protected $selector = '.import-check-code';

    public function handle(Request $request)
    {
        // $request ...
        $request->file('file');
        // $import = new CheckCodeImport();
        // $import->import($request->file('file'));
        Excel::import(new CheckCodeImport, $request->file('file'));
        return $this->response()->success('匯入完成！')->refresh();
    }
    
    public function form()
    {
        $this->file('file', '請選擇檔案');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-check-code"><i class="fa fa-upload"></i>匯入資料</a>
HTML;
    }
}