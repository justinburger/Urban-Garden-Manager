{include file="global/_top.tpl"}
<div style="margin:25px;">
{if !$edit}
<h1>Add a Veggie!</h1>
{else}
<h1>Edit a Veggie!</h1>
{/if}
<p>OMG! Nom Nom Nom! Let's define some veggies we can plant in our garden.</p>
<p>&nbsp;</p>

<form action="{$BASE_URL}veggies/{if !$edit}confirmadd{else}confirmupdate{/if}" method="post">
{if $edit}
    <input name="id" value="{$id}" type="hidden"/>
{/if}
{foreach from=$errors item="e"}
    <div class="error"><strong>Error:</strong>&nbsp;{$e}</div>
{/foreach}
{cycle values="alt1,alt2" assign="bk"}
<div id="veggie_add_container">
<table>
    <tr>
        <td class="frmLabel {$bk}">Name:</td>
        <td class="{$bk}"><input type="text" name="name" value="{$name}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Description:</td>
        <td class="{$bk}"><input type="text" name="description" value="{$description}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Category:</td>
        <td class="{$bk}">
            <select name="category">
            {foreach from=$categories item="c"}
                <option value="{$c.id}">{$c.label}</option>
            {/foreach}
            </select>
        </td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Default %:</td>
        <td class="{$bk}"><input type="text" name="default_percent" value="{$default_percent}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}"># Per sqft:</td>
        <td class="{$bk}"><input type="text" name="num_per_sqft" value="{$num_per_sqft}"/></td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Lighting:</td>
        <td class="{$bk}">
            <select class="" name="light">
                <option value="low" {if $light == 'low'}selected{/if}>Low</option>
                <option value="med" {if $light == 'med'}selected{/if}>Med</option>
                <option value="high" {if $light == 'high'}selected{/if}>High</option>
            </select>
        </td>
    </tr>{cycle values="alt1,alt2" assign="bk"}
     <tr>
        <td class="frmLabel {$bk}">Water:</td>
        <td class="{$bk}">
            <select name="water">
                <option value="low" {if $water == 'low'}selected{/if}>Low</option>
                <option value="med" {if $water == 'med'}selected{/if}>Med</option>
                <option value="high" {if $water == 'high'}selected{/if}>High</option>
            </select>
        </td>
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

</div>
</form>

{include file="global/_bottom.tpl"}