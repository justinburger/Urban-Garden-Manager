{include file="global/_top.tpl"}
<div style="margin:25px;">
{if !$edit}
<h1>Add a Raised Bed!</h1>
{else}
<h1>Edit a Raised Bed!</h1>
{/if}
<p>Yo! Let's setup a raised bed!</p>
<p>&nbsp;</p>

<form action="{$BASE_URL}raisedbed/{if !$edit}confirmadd{else}confirmupdate{/if}" method="post">
<input name="garden_id" value="{$garden_id}" type="hidden"/>
{if $edit}
    <input name="id" value="{$id}" type="hidden"/>
    
{/if}
{foreach from=$errors item="e"}
    <div class="error"><strong>Error:</strong>&nbsp;{$e}</div>
{/foreach}
{cycle values="alt1,alt2" assign="bk"}
<div id="raisedbed_add_container">
<table>
    <tr>
        <td class="frmLabel {$bk}">Name:</td>
        <td class="{$bk}"><input type="text" name="name" value="{$name}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
    <tr>
        <td class="frmLabel {$bk}">Height:</td>
        <td class="{$bk}"><input type="text" name="height" value="{$height}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Width:</td>
        <td class="{$bk}"><input type="text" name="width" value="{$width}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
    
    <tr>
        <td colspan="2" class="{$bk}" style="text-align:right;">
        {if $edit}
        <input type="submit" value="Update"/>
        {else}
        <input type="submit" value="Add"/>
        {/if}</td>
    </tr>
</table>

</form>

</div>

{include file="global/_bottom.tpl"}