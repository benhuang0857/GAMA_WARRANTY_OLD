@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <div style="background-image: url('/images/site/WARRANTY_BG.jpeg'); background-size:     cover;                      /* <------ */
                    background-repeat: no-repeat;">
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
                    根據上述資料，您所使用的GAMA若在保證期限內自行脫膠、起泡、剝落、分層、嚴重色或變色，請聯絡您的施工單位，以負責損壞產品的實際檢驗與更換。 若任何原因您無法與施工單位取得聯繫，請致電：
                    興展科技有限公司22099板機郵局第49號信箱</p>
                </div>

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
            </div>
        </div>
    </div>
</div>
@endsection