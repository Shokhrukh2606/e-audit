<style>
    /* Font Definitions */
    .content * {
        color: #000;
    }
    @font-face {
        font-family: Wingdings;
        panose-1: 5 0 0 0 0 0 0 0 0 0;
    }

    @font-face {
        font-family: "Cambria Math";
        panose-1: 2 4 5 3 5 4 6 3 2 4;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        .WordSection1 *{
            visibility: visible;
        }
        .WordSection1 {
            background-color: white;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 15px;
            font-size: 14px;
            line-height: 18px;
        }
    }
    /* Style Definitions */
    p.MsoNormal,
    li.MsoNormal,
    div.MsoNormal {
        margin: 0in;
        font-size: 12.0pt;
        font-family: "Times New Roman", serif;
    }

    @page WordSection1 {
        size: 595.3pt 841.9pt;
        margin: 35.95pt 28.3pt 53.9pt 63.0pt;
    }

    div.WordSection1 {
        page: WordSection1;
    }

    /* List Definitions */
    ol {
        margin-bottom: 0in;
    }

    ul {
        margin-bottom: 0in;
    }

    .WordSection1 {
        background-color: #fff;
        padding: 0.5cm;
    }

</style>
<div class=WordSection1>
    <p class=MsoNormal align=center style='text-align:center'><b><span lang=UZ-CYR
                style='font-size:14.0pt'>Ш</span></b><b><span lang=RU style='font-size:14.0pt'>артнома</span></b></p>

    <p class=MsoNormal align=center style='text-align:center'><i><span lang=UZ-CYR style='font-size:13.0pt'>
                (</span></i><i><span lang=RU style='font-size:
    14.0pt'>Аудиторлик профессионал хизматлар кўрсатиш </span></i><i><span lang=UZ-CYR
                style='font-size:14.0pt'>тўғрисида) </span></i></p>

    <p class=MsoNormal style='margin-left:177.0pt;text-align:justify;text-indent:
    35.4pt'><span lang=UZ-CYR style='font-size:13.0pt'>&nbsp;</span></p>

    <p class=MsoNormal style='text-align:justify'><span lang=UZ-CYR style='font-size:13.0pt'> Тошкент шаҳри <b>№
                {{$contract->id}}</b> {{date('d-m-Y',strtotime($contract->created_at))}} 
        </span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=UZ-CYR>Маъсулияти чекланган жамияти
            {{$contract->conclusion->audit_comp_name}}нинг расмий хамкори {{$contract->conclusion->cust_info->cust_comp_name}} (кейинги ўринларда
            “Иш бажарувчи” деб юритилади) номидан “Низом” асосида фаолият юритувчи раҳбари {{$contract->conclusion->audit_comp_director_name}}
            ва {{$contract->conclusion->agent->fullName}} (кейинги ўринларда “Буюртмачи” деб юритилади)
            номидан паспорт серия рақами {{$contract->conclusion->agent->passport_number}} (паспорт  томонидан берилган) малумотлари эгаси
            {{$contract->conclusion->agent->address}} манзилда
            яшовчи фукаро томонидан мазкур шартнома аудиторлик профессинал хизматлар
            кўрсатиш тўғрисида тузилди.</span></p>

    <p class=MsoNormal style='text-align:justify'><span lang=UZ-CYR style='font-size:13.0pt'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-left:35.4pt'><span lang=UZ-CYR style='font-size:13.0pt'> </span><b><span
                lang=UZ-CYR style='font-size:14.0pt'> </span></b><b><span lang=RU
                style='font-size:13.0pt'>1.Шартноманинг предмети</span></b><b><span lang=RU
                style='font-size:14.0pt'>.</span></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>1.1.</span><span lang=RU>
        </span><span lang=RU>Хак эвазига ушбу шартнома буйича </span><span lang=UZ-CYR>“</span><span
            lang=RU>Буюртмачи</span><span lang=UZ-CYR>”</span><span lang=RU> топшириғига асосан </span><span
            lang=UZ-CYR>“</span><span lang=RU>Иш
            бажарувчи</span><span lang=UZ-CYR>”</span><span lang=UZ-CYR> </span><span lang=UZ-CYR>Ўзбекистон
            Республикаси “</span><span lang=RU>Аудиторлик фаолияти
            тўғрисида</span><span lang=UZ-CYR>”</span><span lang=RU>ги конун</span><span lang=UZ-CYR>ининг (09.12.1992
            й. № 734</span><span lang=RU>-</span>XII<span lang=RU>)</span><span lang=RU> </span><span lang=RU>17-моддаси
            талабларидан келиб
            чи</span><span lang=UZ-CYR>ққ</span><span lang=RU>ан ҳолда </span><span lang=UZ-CYR>аудиторлик </span><span
            lang=RU>профессионал хизматларни кўрсатиш
            мажбуриятини олади. «Буюртмачи» эса ўз навбатида </span><span lang=UZ-CYR>ушбу </span><span
            lang=RU>кўрсатилган хизматлар </span><span lang=UZ-CYR>учун ҳ</span><span lang=RU>а</span><span
            lang=UZ-CYR>қ</span><span lang=RU> тўлаш мажбуриятини
            олади.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>1.2.
        </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span lang=UZ-CYR>”</span><span lang=RU> ёки
            унинг ваколатли вакили томонидан
            хизматларни қабул қилиш-топшириш далолатномаси имзолангандан кейин хизматлар кўрсатилган
            деб </span><span lang=UZ-CYR>ҳ</span><span lang=RU>исобланади. </span></p>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=UZ-CYR
                style='font-size:14.0pt'>&nbsp;</span></b></p>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=UZ-CYR
                style='font-size:13.0pt'>2.Тарафларнинг хукук ва мажбуриятлари</span></b><b><span lang=UZ-CYR
                style='font-size:14.0pt'>.</span></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><b><i><span lang=UZ-CYR>2.1. Иш бажарувчининг
                    мажбуриятлари:</span></i></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.1.1.
            Хизматларни аудиторлик фаолиятининг миллий стандартлари асосида лозим булган
            сифатда бажариш;</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.1.2.
            Кўрсатилган хизматларни хисоботлар тариқасида тақдим этиш;</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.13.
        </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span lang=UZ-CYR>”</span><span lang=RU>
            томонидан </span><span lang=UZ-CYR>к</span><span lang=RU>ўрсатилган хизматларда камчиликлар аникланса,
            аникланган камчиликларни
            текинга бартараф этиш.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><b><i><span lang=RU>2.2. Буюртмачининг
                    мажбуриятлари:</span></i></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.2.1.
            Хизматга таалуқли барча ҳужжатларни ўз вақтида тақдим этиш; </span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.2.2.
            Бажарилган ишларнинг сифатини текшириб ўз вақтида қабул қилиб олиш; </span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.2.2.
            Шартномада кўрсатилган вақтида кўрсатилган хизматлар ҳақини тўлаш.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><b><i><span lang=RU>2.3. Иш бажарувчининг
                    хукуклари</span></i></b><i><span lang=RU>:</span></i></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.3.1.
            Хизматга таалуқли хужжатларни олиш;</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.3.2.
            Зарурият туғилганда қўшимча маьлумотлар талаб </span><span lang=UZ-CYR>қ</span><span lang=RU>илиб
            олиш;</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>2.3.3.
            Хизматни якунлашда </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span
            lang=UZ-CYR>”</span><span lang=RU> билан барча хисоботларини муҳокома қилиш.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><b><i><span lang=UZ-CYR>2.4. Буюртмаининг
                    хукуклари:</span></i></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=UZ-CYR>2.4.1. Бажарилган хизматларга
            таалуқли меьёрий хужжатларни талаб қилиб
            олиш;</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=UZ-CYR>2.4.2. Хар қандай вақтда “Иш
            бажарувчи”нинг фаолиятига аралашмаган
            ҳолда у томонидан бажарилаётган ишларнинг бориш жараёни ва сифатини текшириш; </span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=UZ-CYR>2.4.3. Солиқларни ҳисоблаб
            чиқариш ва тўлаш тартиби тўғрисида
            йўриқномалари хар-талқин қилинганда, Солиқ органларидан тушинтиришлар олиб
            беришни.</span></p>

    <p class=MsoNormal style='margin-left:35.45pt;text-align:justify'><b><span lang=RU style='font-size:14.0pt'>
            </span></b></p>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=RU style='font-size:13.0pt'>3.Шартнома
                бахоси ва хисоблашишлар тартиби</span></b><b><span lang=RU style='font-size:14.0pt'>.</span></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>3.1.
            Мазкур шартнома бўйича тўлов суммалари иловада кўрсатилган тартибда тақдим
            этилади. </span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>3.2.
            Шартнома кийматининг 100 фоизини </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span
            lang=UZ-CYR>”</span><span lang=UZ-CYR> </span><span lang=UZ-CYR>“</span><span lang=RU>Иш
            бажарувчи</span><span lang=UZ-CYR>”</span><span lang=RU>нинг ҳисоб рақамига хизмат бажаришдан олдин ўтказиб
            беради, Шартнома
            шартлари тўлов амалга оширилгандан сўнг 10 кун ичида бажарилиши шарт.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>3.3.
        </span><span lang=UZ-CYR>“</span><span lang=RU>Иш бажарувчи</span><span lang=UZ-CYR>”</span><span lang=RU>
            шартномада кўрсатилган муддатда ишни
            топширмаса хар-бир кечиктирилган кун учун 0,2 фоиз миқдорида шартнома
            қийматидан, аммо шартнома қийматининг 25 фоизидан ошмаган микдорда устама
            жарима тулайди.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>3.4.
        </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span lang=UZ-CYR>”</span><span lang=RU>
            шартномада кўрсатилган тўлов қийматини иш
            топширилгандан </span><span lang=UZ-CYR>кейин </span><span lang=RU>10 кун ичида
            ўтказиб бермаса хар-бир кечиктирилган кун учун 0,2 фоиз миқдорида шартнома
            қийматидан, аммо шартнома қийматининг 25 фоизидан ошмаган миқдорда устама
            жарима тўлайди.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>3.5.
        </span><span lang=UZ-CYR>“</span><span lang=RU>Буюртмачи</span><span lang=UZ-CYR>”</span><span lang=UZ-CYR>
        </span><span lang=UZ-CYR>“</span><span lang=RU>Иш бажарувчи</span><span lang=UZ-CYR>”</span><span lang=RU>
            томонидан
            кўрсатилган хизматлар маъкул келса ёки хизматлар кўрсатишда қўшимча харажатлар
            қилинди деб ҳисобласа </span><span lang=UZ-CYR>“</span><span lang=RU>Иш
            бажарувчи</span><span lang=UZ-CYR>”</span><span lang=RU>ни шартномада
            кўрсатилган қийматдан ташқари мукофатлаши мумкин.</span></p>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=RU
                style='font-size:13.0pt'>&nbsp;</span></b></p>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=RU style='font-size:13.0pt'>4.Низоларни хал
                қилиш.</span></b></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>4.1.
            Шартнома шартларини ижро этишда форс-мажор вазиятлар вужудга келса томонлар ўзаро
            мажбуриятлардан озод этилади.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>4.2.
            Ушбу шартнома юзасидан ва вужудга келиши мумкин бўлган ҳар қандай эътирозлар ва
            низолар томонлар ўртасида дўстона ҳал қилиниши мумкин бўлмаса Ўзбекистон
            Республикасининг амалдаги қонунлари асосида ҳал қилинади.</span></p>

    <p class=MsoNormal style='text-align:justify;text-indent:35.4pt'><span lang=RU>4.3.
            Томонларнинг бири ушбу шартнома шартларига тўлиқ амал қилмаган тақдирда иккинчи
            томон ушбу шартнома мажбуриятларидан озод бўлган ҳисобланади.</span></p>

    <p class=MsoNormal style='text-align:justify'><span lang=RU style='font-size:
    13.0pt'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-left:70.8pt;text-align:justify;text-indent:
    35.4pt'><b><span lang=RU style='font-size:13.0pt'>ТОМОНЛАРНИНГ ЮРИДИК
                МАНЗИЛГОХИ.</span></b></p>

    <p class=MsoNormal style='margin-left:70.8pt;text-align:justify;text-indent:
    35.4pt'><b><span lang=RU style='font-size:13.0pt'>&nbsp;</span></b></p>
    <div style="padding: 100px;">
        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=697
            style='width:522.7pt;border-collapse:collapse'>
            <tr>
                <td width=343 valign=top style='width:257.4pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal><b><u><span lang=UZ-CYR>“</span><span lang=RU>Иш
                                    бажарувчи</span></u></b><b><u><span lang=UZ-CYR>”</span></u></b></p>
                    <p class=MsoNormal><b><span lang=RU>&nbsp;</span></b></p>
                    <p class=MsoNormal><b><span lang=RU>МЧЖ </span></b><b><span lang=UZ-CYR>“</span></b><b>STARTUP<span
                                lang=RU> - </span></b><b>INVEST</b><b><span lang=UZ-CYR>” </span></b></p>
                    <p class=MsoNormal><span lang=RU>Манзили: - Тошкент шаҳри, Яккасарой тумани,
                            Қушбеги , 23-уй, 49- хонадон</span></p>
                    <p class=MsoNormal><span lang=RU>Банк: - Акциядорлик тижорат
                            &quot;Алоқабанк&quot; бош офиси</span></p>
                    <p class=MsoNormal><span lang=RU>Х/р.:</span><span lang=RU> </span><span lang=RU>- 2020 8000 3052
                            9373
                            7001. </span></p>
                    <p class=MsoNormal><span lang=RU>МФО:</span><span lang=RU> </span><span lang=RU>- 00401. </span></p>
                    <p class=MsoNormal><span lang=UZ-CYR>ИФУТ</span><span lang=RU>:</span><span lang=RU> </span><span
                            lang=RU>- 62090</span></p>
                    <p class=MsoNormal><span lang=RU>СТИР: 307834887</span></p>
                    <p class=MsoNormal><b><span lang=RU>&nbsp;</span></b></p>
                    <p class=MsoNormal><b><span lang=RU>Д.Бобокулов ____________</span></b></p>
                    <p class=MsoNormal style='text-align:justify'><b><span lang=RU>&nbsp;</span></b></p>
                </td>
                <td width=354 valign=top style='width:265.3pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal style='text-align:justify'><b><u><span lang=RU>«Буюртмачи»</span></u></b></p>
                    <p class=MsoNormal><b><span lang=RU>&nbsp;</span></b></p>
                    <p class=MsoNormal><span lang=RU>{{$contract->conclusion->agent->fullName}}</span></p>
                    <p class=MsoNormal><span lang=UZ-CYR>Манзили: {{$contract->conclusion->agent->address}}</span></p>
                    <p class=MsoNormal><span lang=RU>Паспорт серия: {{substr($contract->conclusion->agent->passport_number, 0,2)}} </span></p>
                    <p class=MsoNormal style='text-align:justify'><span lang=RU>Паспорт раками:
                        {{substr($contract->conclusion->agent->passport_number, 2)}}</span></p>
                    <p class=MsoNormal><span lang=RU>СТИР: {{$contract->conclusion->agent->inn}} </span></p>
                    <p class=MsoNormal style='text-align:justify'><span lang=RU> </span></p>
                    <p class=MsoNormal style='text-align:justify'><span lang=RU>&nbsp;</span></p>
                    <p class=MsoNormal style='text-align:justify'><span lang=RU>
                        </span></p>
                    <p class=MsoNormal style='text-align:justify'><b><span lang=UZ-CYR>{{$contract->conclusion->cust_info->contract_name}}</span><span
                                lang=RU>
                                _____________</span></b></p>
                    <p class=MsoNormal style='text-align:justify'><b><span lang=RU
                                style='font-size:13.0pt;color:red'>&nbsp;</span></b></p>
                    <p class=MsoNormal style='text-align:justify'><b><span lang=RU
                                style='font-size:13.0pt;color:red'>&nbsp;</span></b></p>
                    <p class=MsoNormal style='text-align:justify'><b><span lang=RU>&nbsp;</span></b></p>
                </td>
            </tr>
        </table>
    </div>

    <p class=MsoNormal align=center style='text-align:center'><b><span lang=RU
                style='font-size:14.0pt'>&nbsp;</span></b></p>
    <button class="btn btn-info pull-right" onclick="window.print()">{{lang('print')}}</button>
    <div class="clearfix"></div>

</div>
