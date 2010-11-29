<div style="font-size:11px;">
<table style="width:100%; ">
{cycle values="alt1,alt2" assign="bk"}
<tr>
    <td class="sqftTable {$bk}"><strong>Crop Type</strong></td>
    <td class="sqftTable {$bk}"><strong>Date Planted</strong></td>
    <td class="sqftTable {$bk}"><strong>Harvest Date</strong></td>
    <td class="sqftTable {$bk}"><strong>Percent</strong></td>
    <td class="sqftTable {$bk}"><strong>Quantity</strong></td>
    <td class="sqftTable {$bk}"><strong>Functions</strong></td>
</tr>
{foreach from=$sqft_items item="s"}
{cycle values="alt1,alt2" assign="bk"}
<tr>
<td class="sqftTable {$bk}">{$s.type_name}</td>
<td class="sqftTable {$bk}">{$s.start_date}</td>
<td class="sqftTable {$bk}">{$s.end_date}</td>
<td class="sqftTable {$bk}">{$s.percent}</td>
<td class="sqftTable {$bk}">{$s.quantity}</td>
<td class="sqftTable {$bk}">&nbsp;<img src="{$BASE_URL}images/icons/delete.png" title="Remove Crop"/>&nbsp;&nbsp;<img src="{$BASE_URL}images/icons/application_form_edit.png" title="Edit Item"/>&nbsp;&nbsp;<img src="{$BASE_URL}images/icons/date_go.png" title="Push Back Harvest Date"/>&nbsp;&nbsp;<img src="{$BASE_URL}images/icons/comments.png" title="View &amp; Add Crop Comments"/></td>
</tr>
{foreachelse}
{cycle values="alt1,alt2" assign="bk"}
    <tr>
        <td class="sqftTable {$bk}" colspan="6"><p>&nbsp;</p><em>&nbsp;&nbsp;&nbsp;No crops planted in this sqft. Use the form below to assign something to this sqft.</em><p>&nbsp;</p></td>
    </tr>
{/foreach}
{cycle values="alt1,alt2" assign="bk"}
<tr>
    <td class="sqftTable {$bk}">
    <select id="veggie">
        {foreach from=$veggies item="v"}
            <option value="{$v.id}">{$v.name}</option>
        {/foreach}
        </select>

    </td>
    <td class="sqftTable {$bk}">2010-10-10&nbsp;<input type="hidden" id="to_date" value="2010-10-10"/><img src="{$BASE_URL}images/icons/calendar_edit.png"/></td>
    <td class="sqftTable {$bk}">2011-10-10&nbsp;<input type="hidden" id="from_date" value="2011-10-10"/> <img src="{$BASE_URL}images/icons/calendar_edit.png"/></td>
    <td class="sqftTable {$bk}"><input type="text" style="width:40px;" id="percent" name="percent"/></td>
    <td class="sqftTable {$bk}"><input type="text" style="width:40px;" id="quantity" name="quantity"/></td>
    <td class="sqftTable {$bk}"><input type="submit" value="Add" onclick="gbl.gardenObject.beds[{$bed}].addSQFTItem();"/></td>
</tr>
</table>
<input type="hidden" id="sqft_id" value="{$sqft}"/>
<input type="hidden" id="bed" value="{$bed}"/>