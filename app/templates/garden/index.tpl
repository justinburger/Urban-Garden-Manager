{include file="global/_top.tpl"}
<div id="submenu" style="background-color:#C38636;">
<h1>My Awesome Garden!</h1>

</div>
<div id="submenu2"">
<table style="width:100%;">
    <tr>
        <td><h1>Raised Beds (<a style="font-size:13px;" href="/raisedbed/add">Add a new Raised Bed</a>)</h1></td>
        <td style="tect-align:right;"><strong>Date:</strong> 2010-10-11&nbsp;<img src="{$BASE_URL}images/icons/calendar_edit.png"/></td>
        <td style="tect-align:right;"><strong>View Type:</strong><select>
            <option>View SQFT Assignments</option>
            <option>View By Plant Type</option>
            <option>View By Date</option>


        </select></td>
    </tr>
</table>
</div>

<div style="margin:25px;">
<table>
    <tr>
        <td class="sqft_rb">&nbsp;</td>
        <td>Nothing Assigned</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td class="sqft_100used">&nbsp;</td>
        <td>100% Assigned</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td class="sqft_100someAssigned">&nbsp;</td>
        <td>Partially Assigned</td>
    </tr>
</table>
{foreach from=$raisedbeds item="rb"}
<div style="padding:10px;">
{$rb.name}
<table>
{foreach from=$rb.rb item="rb1"}
<tr>
    {foreach from=$rb1 item="rb2"}
        <td class="sqft_rb" id="{$rb.id}_{$rb2.id}" onmouseover="{literal}new Tip(this, {fixed: true, hook:'leftMiddle', hideOn: false, hideAfter: 2, fixed:false, ajax: {url: '/sqft/view/{/literal}{$rb.id}_{$rb2.id}'{literal}}}{/literal});">{$rb2.label}</td>
    {/foreach}
</tr>
{/foreach}

</table>
</div>
{/foreach}
</div>

{include file="global/_bottom.tpl"}