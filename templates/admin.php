<?php
$section_count="";
$section_names=[];
$section_content=[];
$section_items=[];

$section_array=[[]];

//$section_count = section_count();
//$section_names = section_names();
//$section_content = section_content();



?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/applepie_feed_manager/assets/view.css" media="all">
<script type="text/javascript" src="<?php echo plugins_url(); ?>/applepie_feed_manager/assets/view.js"></script>
<script type="text/javascript" src="<?php echo plugins_url(); ?>/applepie_feed_manager/assets/tabs.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/applepie_feed_manager/assets/tabs.css">

</BR>
<STYLE>
table.blueTable {
  background-color: #EEEEEE;
  width: 53%;
  min-width: 700px;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  padding: 3px 2px;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 8px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}
</STYLE>



<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'APPLECTRL')">APPLEPIE CONTROLS</button>
  <button class="tablinks" onclick="openTab(event, 'MANUAL')">MANUAL</button>
  <button class="tablinks" onclick="openTab(event, 'ABOUTINFO')">ABOUT</button>
</div>


<div id="APPLECTRL" class="tabcontent">

<BR>
<table class="blueTable">
<thead>
<tr>
<th>VIEW TABLE</th>
<th>VIEW DB</th>
<th>PUSH TABLE</th>
<th>DELETE DB</th>
<th>CYCLE CACHE</th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="5">&nbsp;</td>
</tr>
</tfoot>
<tbody>
<tr>
<td><a id="sec1v" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >VIDEO</a></td>
<td><a id="sec1V" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >VIDEO</a></td>
<td><a id="sec1p" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >VIDEO</a></td>
<td><a id="sec1d" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >VIDEO</a></td>
<td><a id="sec0c" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >OFF</a></td>
</tr>
<tr>
<td><a id="sec2v" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >NEWS</a></td>
<td><a id="sec2V" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >NEWS</a></td>
<td><a id="sec2p" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >NEWS</a></td>
<td><a id="sec2d" style="width: 70%;"  class="ui-button ui-widget ui-corner-all" >NEWS</a></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><a id="sec3v" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >AUDIO</a></td>
<td><a id="sec3V" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >AUDIO</a></td>
<td><a id="sec3p" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >AUDIO</a></td>
<td><a id="sec3d" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >AUDIO</a></td>
<td><a id="sec1c" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >ON</a></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><a id="sec4v" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >INFOSEC</a></td>
<td><a id="sec4V" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >INFOSEC</a></td>
<td><a id="sec4p" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >INFOSEC</a></td>
<td><a id="sec4d" style="width: 70%;" class="ui-button ui-widget ui-corner-all" >INFOSEC</a></td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<div id="extractview" class="ui-widget ui-widget-content ui-corner-all" >
<?php
//echo "</BR>" ;
//echo "<PRE>" ;
//print_r( $section_names);
//$section_array = section_items( $section_content[0]  );
//print_r( $section_array[0][1] );
//print_r( section_items( $section_content[0] ) );

//print_r( section_items( $section_content[1] ) );
//print_r( section_items( $section_content[2] ) );
//print_r( section_items( $section_content[3] ) );
//echo "</BR>" ;
//echo "</PRE>" ;
?>
</div>

</div>


<div id="MANUAL" class="tabcontent">

<pre>

APPLEPIE FEED MANGER:

   This plugin works in concert with the TablePress,Appliepie and RAW Seed Plugins. Where you can create
 and enter in RSS feeds from NEWS, VIDEOS, AUDIO sites. This will parse the Enable column to push it into 
 the database or not. When you change a setting in the associated TablePress table. You will then have to
 update the time based RSS database cache.  After you delete the current database and push in your new
 configurations, you will then have to clear the syncronized cache system from the RAW Seed Plugin. It will
 then proceed to process the new configuarations and be ready to view.
 
 UPDATE PROCESS
1: Change a table in Tablepress Plugin.
2: In the Applepie Feed Manager , select the Controls tab. You can  VIEW new items here.
3: After you VIEW them ,you can DELETE specific table.
4: After you DELETE the specific database you can PUSH in new database configurations
5: After you PUSH in new data, you will then need to syncronize by cycling ALL cache RSS systems.  
6: New configuration should be updating at this time. It may take a couple of minuets depeding o your list size. 
 
 
</pre>

</div>


<div id="ABOUTINFO" class="tabcontent">
<img width="400" height="300" src="<?php echo plugins_url(); ?>/applepie_feed_manager/assets/applepiefeedmanagerlogo.png" />
</div>

<script>
 //Start with About in view
  setTab('ABOUTINFO');
  </script>