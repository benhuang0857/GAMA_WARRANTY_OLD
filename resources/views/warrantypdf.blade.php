<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                font-family: 'MINGLIU';
            }
            #invoice{
                padding: 30px;
            }
            .invoice {
                position: relative;
                background-color: #FFF;
                min-height: 680px;
                padding: 15px
            }
            .invoice header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #3989c6
            }
            .invoice .company-details {
                text-align: right
            }
            .invoice .company-details .name {
                margin-top: 0;
                margin-bottom: 0
            }
            .invoice .contacts {
                margin-bottom: 20px
            }
            .invoice .invoice-to {
                text-align: left
            }
            .invoice .invoice-to .to {
                margin-top: 0;
                margin-bottom: 0
            }
            .invoice .invoice-details {
                text-align: right
            }
            .invoice .invoice-details .invoice-id {
                margin-top: 0;
                color: #3989c6
            }
            .invoice main {
                padding-bottom: 50px
            }
            .invoice main .thanks {
                margin-top: -100px;
                font-size: 2em;
                margin-bottom: 50px
            }
            .invoice main .notices {
                padding-left: 6px;
                border-left: 6px solid #3989c6
            }
            .invoice main .notices .notice {
                font-size: 1.2em
            }
            .invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px
            }
            .invoice table td,.invoice table th {
                padding: 15px;
                background: #eee;
                border-bottom: 1px solid #fff
            }
            .invoice table th {
                white-space: nowrap;
                font-weight: 400;
                font-size: 16px
            }
            .invoice table td h3 {
                margin: 0;
                font-weight: 400;
                color: #3989c6;
                font-size: 1.2em
            }
            .invoice table .qty,.invoice table .total,.invoice table .unit {
                text-align: right;
                font-size: 1.2em
            }
            .invoice table .no {
                color: #fff;
                font-size: 1.6em;
                background: #3989c6
            }
            .invoice table .unit {
                background: #ddd
            }
            .invoice table .total {
                background: #3989c6;
                color: #fff
            }
            .invoice table tbody tr:last-child td {
                border: none
            }
            .invoice table tfoot td {
                background: 0 0;
                border-bottom: none;
                white-space: nowrap;
                text-align: right;
                padding: 10px 20px;
                font-size: 1.2em;
                border-top: 1px solid #aaa
            }
            .invoice table tfoot tr:first-child td {
                border-top: none
            }
            .invoice table tfoot tr:last-child td {
                color: #3989c6;
                font-size: 1.4em;
                border-top: 1px solid #3989c6
            }
            .invoice table tfoot tr td:first-child {
                border: none
            }
            .invoice footer {
                width: 100%;
                text-align: center;
                color: #777;
                border-top: 1px solid #aaa;
                padding: 8px 0
            }
            @media print {
                .invoice {
                    font-size: 11px!important;
                    overflow: hidden!important
                }
                .invoice footer {
                    position: absolute;
                    bottom: 10px;
                    page-break-after: always
                }
                .invoice>div:last-child {
                    page-break-before: always
                }
            }
        </style>
    </head>

    <body>
        <h3>GAMA INNOVATION CORP 隔熱膜產品保證書</h3>
        <strong>客戶姓名：</strong>{{$CARD->name}}<br>
        車品/型號 :{{$CARD->car_brand}}<br>
        車牌號碼 :{{$CARD->car_license}}<br>
        聯絡電話 :{{$CARD->mobile}}<br>
        E-MAIL :{{Auth()->user()->email}}<br>
        施工日期 :{{Auth()->user()->construction_date}}<br>
        登記地址 :{{Auth()->user()->address}}<br>
        施工店家：{{$CARD->store}}<br>
        裝貼位置：{{$CARD->warranty_body}}<br>
        產品型號：<br>
        <p>感謝您選擇GAMA提供您對專業隔熱節能需求的最佳解決方案。 
        根據上述資料，您所使用的GAMA若在保證期限內自行脫膠、起泡、剝落、分層、嚴重色或變色，
        請聯絡您的施工單位，以負責損壞產品的實際檢驗與更換。 若任何原因您無法與施工單位取得聯繫，
        請致電：
        興展科技有限公司22099板機郵局第49號信箱</p>
        </div>

        <p>
        若因以下事項而造成產品損傷則不在保固條款中：
        1.實際案例與上這資料不符合而未能及時反應。  
        2.產品經由非上述授權施工單位的變動。
        3.貼雙層窗膜，無論本產品是在上層或下層。  
        4.不正當的使用情況或保養方法。  
        5.人為造成的刮傷，挫傷，損傷或刻意破壞。  
        6.天災、人為或外力導致的損失，無論直接，間接或偶然發生。  
        7.產品保固期間若有需要更換產品客戶仍須負擔部份工資，保固期自完工日開始，期
        間內不可轉換給非上述用戶名稱之個體或位。 用戶一但變更保固形同中止。
        興展科技有限公司對產品損傷的需定保留最終裁決權。

        產品的視覺檢驗與標準：
        興屬科技有限公司亦尊循國際窗膜協會（alional Window Fim AssoatioeFA）
        於1995年五月正式採用的窗膜視覺檢驗為建築貼膜標準。
        施工單位可提供英（原）文或中文翻譯的影本。

        保養清洗方法：
        1.安裝後在15天內請勿移動，30天內請勿清洗窗膜。  
        2.平日保養請用乾淨柔軟的布料，海綿或紙巾，以清水擦拭。  
        3.亦可使用不含酸性或腐蝕性的家用清潔劑，但最好與清水混合。  
        4.嚴禁使用刷子、菜瓜布或任何相糙之物品擦拭窗膜。

        臺灣柯美股份有限公司
        (本保固書未加蓋本公司章者視為無效)
        </p>
    </body>
</html>