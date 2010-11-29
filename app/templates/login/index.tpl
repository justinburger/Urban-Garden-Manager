{include file="global/_top.tpl"}
<div id="halfGrayContainer">
&nbsp;

</div>
<div id="loginDiv">
<h1>Login to manage your garden..</h1>
<p>&nbsp;</p>
<form action="{$BASE_URL}login/validate" method="post">
<table>
    <tr>
        <td style="text-align:right;"><strong>Email:&nbsp;</strong></td>
        <td><input type="text" name="email"/></td>
    </tr>
     <tr>
        <td style="text-align:right;"><strong>Password:&nbsp;</strong></td>
        <td><input type="password" name="password"/></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:right;">
            <input type="submit" value="Login"/>
        </td>
    </tr>


</table>
</form>
<br/>
<span style="font-size:10px;"><strong>Other Stuff:</strong>&nbsp; <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Start a Garden</a></span>
</div>

{include file="global/_bottom.tpl"}