{include file="global/_top.tpl"}
<div style="margin:25px;">
<h1>Veggies!</h1>
<p>OMG! Nom Nom Nom! Let's define some veggies we can plant in our garden.</p>
<p>&nbsp;</p>

<a href="/veggies/add">Add a new Veggie</a>
<p>&nbsp;</p>
<table style="width:100%">
<tr>
    <td class="table_header"><strong>ID</strong></td>
    <td class="table_header"><strong>Name</strong></td>
    <td class="table_header"><strong>Category</strong></td>
</tr>
{foreach from=$veggies item="v"}
{cycle values="alt1,alt2" assign="bk"}
    <tr>
        <td class="{$bk} tlbRow">{$v.id}</td>
        <td class="{$bk} tlbRow"><a href="{$BASE_URL}veggies/view/{$v.id}">{$v.name}</a></td>
        <td class="{$bk} tlbRow">{$v.cate_name}</td>
    </tr>
{/foreach}
</table>

</div>


{include file="global/_bottom.tpl"}