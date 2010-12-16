{include file="global/_top.tpl"}
<div id="submenu" style="background-color:#C38636;">
<h1 id="gardenLabel">My Awesome Garden!</h1>

</div>
<div id="submenu2"">
<table style="width:100%;">
    <tr> 
        <td><h1>Raised Beds (<a style="font-size:13px;" href="/raisedbed/add">Add a new Raised Bed</a>)</h1></td>
        <td style="tect-align:right;"><strong>Date:</strong> <div style="display:inline;" id="view_date">2010-11-24</div>&nbsp;<img id="calendarButton" src="{$BASE_URL}images/icons/calendar_edit.png"/>  <input type="hidden" name="date" value="2010-11-24" id="date" onchange="$('view_date').update(this.value); reloadGBL();"/>
    </td>
        <td style="tect-align:right;"><strong>View Type:</strong>
        <select onchange="gbl.gardenObject.handleViewTypeChange(this.value);">
            <option value="assignments">View SQFT Assignments</option>
            <option value="plant_type">View By Plant Type</option>
            <option value="date">View By Date</option>
            <option value="alerts">View Alerts</option>
            <option value="temps">Min Temperature</option>
        </select>
       </td>
    </tr>
</table>
</div>

<div style="margin:25px;">

<div id="garden-container">
    <p>&nbsp;</p><strong>Please wait while we open your garden...</strong>
</div>
{literal}
<script type="text/javascript">
    var gbl;
    gbl = new GardenBootLoader(1,'assignments');
document.observe("dom:loaded", function() {


  var t=setTimeout("gbl.gardenObject.renderXHTML();",3000)


});
 

 function reloadGBL(){
 $('garden-container').update('<h1>Reloading Garden...</h1><p>&nbsp;</p><strong>Give me a sec..</strong>');
   gbl = new GardenBootLoader(1,'assignments');
   var t=setTimeout("gbl.gardenObject.renderXHTML();",3000)
  }

</script>
  <script type="text/javascript">
      window.onload = function() {
        Calendar.setup({
          dateField      : 'date',
          triggerElement : 'calendarButton'
        })
      }
    </script>
{/literal}

{include file="global/_bottom.tpl"}