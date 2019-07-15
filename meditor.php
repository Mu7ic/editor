<?php
use Yii;
use app\assets\AppAsset;
AppAsset::register($this);
?>

<html>
<head>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
    <title>Демонстрация визуального HTML-редактора</title>
</head>
<body>


<div id="editor">

    <div id="text_to_edit">
        <a href="http://www.vulk.ru/">Vulk Editor</a> - <strong>бесплатный</strong> визуальный HTML-редактор.
    </div>

    <div id="editor_blocking" class="editor_blocking"></div>

    <div id="editor_dialog_addhtml" class="dialog">
        <div style="top:30%; left:25%; width:50%; height:45%;">
            <table class="t_dialog">
                <tr>
                    <th>Вставка html-кода</th>
                </tr>
                <tr>
                    <td><textarea name="editor_addhtml" class="input_text" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td align="right"><input type="button" value="Вставить" class="input_button" onClick="editor_close_dialog('addhtml'); editor_PasteHTML(document.all.editor_addhtml.value);">&nbsp;
                        <input type="button" value="Отмена" onClick="editor_close_dialog('addhtml');" class="input_button"></td>
                </tr>
            </table>
        </div>
    </div>



    <div id="editor_dialog_addtable" class="dialog">
        <div style="top:30%; left:25%; width:50%; height:40%;">
            <table class="t_dialog">
                <tr>
                    <th colspan="2">Вставка таблицы</th>
                </tr>
                <tr>
                    <td width="50%">Количество столбцов</td>
                    <td width="50%"><input type="text" name="editor_addtable_cols" class="input_text" value="3"></td>
                </tr>
                <tr>
                    <td>Количество строк</td>
                    <td><input type="text" name="editor_addtable_rows" class="input_text" value="3"></td>
                </tr>
                <tr>
                    <td width="50%">Ширина таблицы</td>
                    <td width="50%"><input type="text" name="editor_addtable_width" class="input_text" value="100%"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" value="Вставить" class="input_button" onClick="editor_close_dialog('addtable'); editor_insert_table();">&nbsp;
                        <input type="button" value="Отмена" onClick="editor_close_dialog('addtable');" class="input_button"></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="editor_dialog_cell" class="dialog">
        <div style="top:30%; left:35%; width:30%; height:30%;">
            <table class="t_dialog">
                <tr>
                    <th colspan="2">Свойства ячейки</th>
                </tr>
                <tr>
                    <td width="50%">Ширина</td>
                    <td width="50%"><input type="text" name="editor_cell_width" class="input_text" value=""></td>
                </tr>
                <tr>
                    <td>Высота</td>
                    <td><input type="text" name="editor_cell_height" class="input_text" value=""></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" value="Применить" class="input_button" onClick="editor_close_dialog('cell'); editor_set_cell();">&nbsp;
                        <input type="button" value="Отмена" onClick="editor_close_dialog('cell');" class="input_button"></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="editor_dialog_addimage" class="dialog">
        <div style="top:25%; left:20%; width:60%; height:30%;">
            <table class="t_dialog">
                <tr>
                    <th colspan="2">Вставка рисунка</th>
                </tr>
                <tr>
                    <td>Адрес</td><td><input type="text" name="editor_addimage_url" class="input_text"></td>
                </tr>
                <tr>
                    <td>Альтернативный текст</td><td><input type="text" name="editor_addimage_alt" class="input_text"></td>
                </tr>
                <tr>
                    <td>Обтекание текста</td><td>
                        <table class="t_dialog">
                            <tr>
                                <td width="30%"><select name="editor_addimage_align" class="input_text">
                                        <option value="center">Нет</option>
                                        <option value="right">Слева</option>
                                        <option value="Left">Справа</option>
                                    </select>
                                </td>
                                <td><input type="button" class="input_button" value="Вставить" onClick="editor_close_dialog('addimage'); editor_insert_image();">&nbsp;<input type="button" class="input_button" value="Отмена" onClick="editor_close_dialog('addimage');"></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </div>
    </div>

    <form action="http://www.vulk.ru/templates/editor/editor.php" method="post" onSubmit="getdown();">

        <div style="height:360px; border:#000000 solid 1px;">
            <div id="editor_normal" class="show1" style="height:360px; padding-top:3px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table class="t_editor_buttons">
                                <tr>
                                    <td><img src="images/copy.gif" title="Копировать" onClick="editor_FormatText('Copy');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/cut.gif" title="Вырезать" onClick="editor_FormatText('Cut');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/paste.gif" title="Вставить" onClick="editor_FormatText('Paste');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/bold.gif" title="Жирный" onClick="editor_FormatText('Bold');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/italic.gif" title="Курсив" onClick="editor_FormatText('Italic');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/underline.gif" title="Подчеркнутый" onClick="editor_FormatText('Underline');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/removeformat.gif" title="Удалить форматирование" onClick="editor_FormatText('removeformat');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/undo.gif" title="Отменить" onClick="editor_FormatText('Undo');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/redo.gif" title="Повторить" onClick="editor_FormatText('Redo');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/left.gif" title="Выровнить по левому краю" onClick="editor_FormatText('JustifyLeft');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/center.gif" title="Выровнить по центру" onClick="editor_FormatText('JustifyCenter');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/right.gif" title="Выровнить по правому краю" onClick="editor_FormatText('JustifyRight');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/justify.gif" title="Выровнить по краям" onClick="editor_FormatText('JustifyFull');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/marklist.gif" title="Маркированный список" onClick="editor_FormatText('InsertUnorderedList', '');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/numlist.gif" title="Маркированный список" onClick="editor_FormatText('InsertOrderedList', '');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/rightlist.gif" title="Увеличить отступ" onClick="editor_FormatText('Indent', '');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/leftlist.gif" title="Уменьшить отступ" onClick="editor_FormatText('Outdent', '');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/link.gif" title="Вставить ссылку" onClick="editor_createlink();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/unlink.gif" title="Удалить ссылку" onClick="editor_FormatText('UnLink');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <input type="hidden" name="editor_fontcolor" value="000000">
                                    <td><img src="images/font.gif" title="Цвет шрифта" onClick="editor_FormatText('forecolor', document.all.editor_fontcolor.value);" style="background:#000000" class="editor_button" name="editor_fontcolor_button"></td>
                                    <td style="padding-left:1px;"><img src="images/select.gif" title="Выбрать цвет" onClick="editor_open_submenu('div_colors');" onMouseOver="editor_button_on(this); editor_keep_show();" onMouseOut="editor_button_off(this); editor_keep_hide();" class="editor_button"></td>
                                    <td>
                                        <div style="position:absolute; display:none;" id="div_colors">
                                            <TABLE class="t_submenu" onMouseOver="editor_keep_show();" onMouseOut="editor_keep_hide();">
                                                <tr>
                                                    <td style="background:#000000" onClick="document.all.editor_fontcolor.value='#000000'; document.all.editor_fontcolor_button.style.background='#000000'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#993300" onClick="document.all.editor_fontcolor.value='#993300'; document.all.editor_fontcolor_button.style.background='#993300'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#003300" onClick="document.all.editor_fontcolor.value='#003300'; document.all.editor_fontcolor_button.style.background='#003300'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#333399" onClick="document.all.editor_fontcolor.value='#333399'; document.all.editor_fontcolor_button.style.background='#333399'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#333333" onClick="document.all.editor_fontcolor.value='#333333'; document.all.editor_fontcolor_button.style.background='#333333'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>
                                                <tr>
                                                <tr>
                                                    <td style="background:#FF6600" onClick="document.all.editor_fontcolor.value='#FF6600'; document.all.editor_fontcolor_button.style.background='#FF6600'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#008000" onClick="document.all.editor_fontcolor.value='#008000'; document.all.editor_fontcolor_button.style.background='#008000'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#0000FF" onClick="document.all.editor_fontcolor.value='#0000FF'; document.all.editor_fontcolor_button.style.background='#0000FF'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#666699" onClick="document.all.editor_fontcolor.value='#666699'; document.all.editor_fontcolor_button.style.background='#666699'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#999999" onClick="document.all.editor_fontcolor.value='#999999'; document.all.editor_fontcolor_button.style.background='#999999'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>
                                                <tr>
                                                <tr>
                                                    <td style="background:#FF0000" onClick="document.all.editor_fontcolor.value='#FF0000'; document.all.editor_fontcolor_button.style.background='#FF0000'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#FF9900" onClick="document.all.editor_fontcolor.value='#FF9900'; document.all.editor_fontcolor_button.style.background='#FF9900'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#99CC00" onClick="document.all.editor_fontcolor.value='#99CC00'; document.all.editor_fontcolor_button.style.background='#99CC00'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#339966" onClick="document.all.editor_fontcolor.value='#339966'; document.all.editor_fontcolor_button.style.background='#339966'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#800080" onClick="document.all.editor_fontcolor.value='#800080'; document.all.editor_fontcolor_button.style.background='#800080'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>
                                                <tr>
                                                <tr>
                                                    <td style="background:#FF00FF" onClick="document.all.editor_fontcolor.value='#FF00FF'; document.all.editor_fontcolor_button.style.background='#FF00FF'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#FFFF00" onClick="document.all.editor_fontcolor.value='#FFFF00'; document.all.editor_fontcolor_button.style.background='#FFFF00'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#00FFFF" onClick="document.all.editor_fontcolor.value='#00FFFF'; document.all.editor_fontcolor_button.style.background='#00FFFF'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#993366" onClick="document.all.editor_fontcolor.value='#993366'; document.all.editor_fontcolor_button.style.background='#993366'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>

                                                    <td style="background:#FFFFFF" onClick="document.all.editor_fontcolor.value='#FFFFFF'; document.all.editor_fontcolor_button.style.background='#FFFFFF'; editor_close_submenu(); editor_FormatText('forecolor', document.all.editor_fontcolor.value);"
                                                        onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';"><img src="images/spacer.gif" class="editor_button"></td>
                                                <tr>
                                            </TABLE>
                                        </div>
                                    </td>
                                    <td><img src="images/br.gif" title="Новая строка" onClick="editor_get_range(); editor_PasteHTML('<br>');" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>

                                    <td><img src="images/symbol.gif" title="Вставить специальный символ" onClick="editor_get_range(); editor_open_submenu('div_symbols');" onMouseOver="editor_button_on(this);editor_keep_show();" onMouseOut="editor_button_off(this); editor_keep_hide();" class="editor_button"></td>
                                    <td>
                                        <div style="position:absolute; display:none;" id="div_symbols">
                                            <TABLE class="t_submenu" onMouseOver="editor_keep_show();" onMouseOut="editor_keep_hide();">
                                                <tr>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&cent;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&cent;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&pound;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&pound;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&yen;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&yen;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&euro;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&euro;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&trade;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&trade;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&copy;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&copy;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&reg;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&reg;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&sect;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&sect;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&permil;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&permil;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&ndash;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&ndash;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&mdash;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&mdash;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&laquo;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&laquo;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&raquo;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&raquo;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&hellip;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&hellip;&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&plusmn;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&plusmn;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&frac14;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&frac14;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&frac12;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&frac12;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&frac34;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&frac34;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&times;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&times;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&divide;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&divide;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&larr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&larr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&uarr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&uarr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&rarr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&rarr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&darr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&darr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&harr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&harr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&rArr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&rArr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&hArr;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&hArr;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&ang;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&ang;&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&sum;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&sum;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&infin;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&infin;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&and;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&and;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&or;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&or;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&cap;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&cap;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&cup;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&cup;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&ne;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&ne;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&equiv;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&equiv;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&le;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&le;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&ge;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&ge;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&sub;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&sub;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&sup;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&sup;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&sube;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&sube;&nbsp;</td>
                                                    <td onClick="editor_close_submenu(); editor_PasteHTML('&supe;');" onMouseOver="this.style.border = '#000000 solid 1px';"
                                                        onMouseOut="this.style.border = '#FFFFFF solid 1px';">&nbsp;&supe;&nbsp;</td>
                                                </tr>
                                            </TABLE>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="t_editor_buttons">
                                <tr>
                                    <td><select class="editor_select_style" id="editor_select_style" name="editor_select_style" onChange="editor_FormatText('formatBlock', this.value); this.value='';">
                                            <option value="">- Стиль -
                                            <option value="<p>">Обычный
                                            <option value="<h1>">Заголовок 1
                                            <option value="<h2>">Заголовок 2
                                            <option value="<h3>">Заголовок 3
                                            <option value="<h4>">Заголовок 4
                                            <option value="<h5>">Заголовок 5
                                            <option value="<h6>">Заголовок 6
                                        </select></td>

                                    <td><img src="images/table.gif" title="Вставить таблицу" onClick="editor_get_range(); editor_open_dialog('addtable', 'editor_addtable_cols');" onMouseOver="editor_button_on(this);" onMouseOut="editor_button_off(this);" class="editor_button"></td>
                                    <td><img src="images/table_insert_row.gif" title="Вставить строку" onClick="editor_insert_row();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/table_delete_row.gif" title="Удалить строку" onClick="editor_delete_row();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/table_insert_col.gif" title="Вставить столбец" onClick="editor_insert_col();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/table_delete_col.gif" title="Удалить столбец" onClick="editor_delete_col();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/table_span.gif" title="Разбить ячейку" onClick="editor_split_cell();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/table_cell.gif" title="Свойства ячейки" onClick="editor_get_cell();" onMouseOver="editor_button_on(this)" onMouseOut="editor_button_off(this)" class="editor_button"></td>
                                    <td><img src="images/image.gif" title="Вставить рисунок" onClick="editor_get_range(); editor_open_dialog('addimage', 'editor_addimage_url');" onMouseOver="editor_button_on(this);" onMouseOut="editor_button_off(this);" class="editor_button"></td>
                                    <td><img src="images/html.gif" title="Вставить HTML-код" onClick="editor_get_range(); document.all.editor_addhtml.value = ''; editor_open_dialog('addhtml', 'editor_addhtml');" onMouseOver="editor_button_on(this);" onMouseOut="editor_button_off(this);" class="editor_button"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:#000000 solid 1px;">
                            <iframe src="canvas.html" onload="editor_loaded();" scrolling="yes" frameborder="0" id="editor_frame" name="editor_frame" style="width:100%; height:300px;"></iframe>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="editor_html" class="show0" style="height:360px; border:#000000 solid 0px;">
                <table width="100%">
                    <tr>
                        <td><textarea name="edited_html" id="edited_html" style="width:100%; height:350px; border:none;"></textarea></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="editor_mode_norm" class="show1">
            <img src="images/nn.gif" width="60" height="15"><img src="images/nh.gif" width="45" height="15" title="HTML" onClick="editor_show_html();"></div>

        <div id="editor_mode_html" class="show0">
            <img src="images/hn.gif" width="51" height="15" title="Обычный" onClick="editor_show_normal();"><img src="images/hh.gif" width="51" height="15"></div>

</div>
<input type="submit" value="Отправить">

</form>

</body>
</html>