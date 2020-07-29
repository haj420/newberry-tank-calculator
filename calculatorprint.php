<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<?php include('calculator.inc.php'); ?>
<head>
<title>Calculator</title>
  <meta name="description" content="Storage tanks for solids, liquids, or gases." /> 
  <meta name="keywords" content="storage tanks, tank equipment" /> 
 
</head>

<body>
  
<style>
<!--
body, td{font-family: Arial, Helvetica;}
 /* Font Definitions */
@font-face
	{font-family:"MS Mincho";
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:"\FF2D\FF33 \660E\671D";
	mso-font-charset:128;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 134676480 16 0 131072 0;}
@font-face
	{font-family:"\@MS Mincho";
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:128;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 134676480 16 0 131072 0;}
 /* Style Definitions */
p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Arial, Helvetica";
	mso-fareast-font-family:"Arial, Helvetica";}
p.MsoPlainText, li.MsoPlainText, div.MsoPlainText
	{margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Arial, Helvetica, san serif";
	mso-fareast-font-family:"Arial, Helvetica, san serif";}
@page Section1
	{size:8.5in 11.0in;
	margin:1.0in 65.95pt 1.0in 65.95pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
</head>

<body lang=EN-US style='tab-interval:.5in'>
      <h1 class="red">Calculator Results</h1>
<p><span><B><U>Attention:</U></B> <BR>Newberry Tanks &amp; Equipment, Inc. does not guarantee
the charts accuracy and in no way takes liability for loss due to its content.</p>


<TABLE border=0 cellpadding=4><TR><TD COLSPAN=8>


<p><span><span
style="mso-spacerun: yes">                     </span>
<?php
if($HV == "h")
echo "HORIZONTAL";
elseif($HV == "v")
echo "VERTICAL";
?>
 TANK
CALIBRATION CHART<o:p></o:p></span></p>


<p><span><span
style="mso-spacerun: yes">                      </span><span
style="mso-spacerun: yes">   </span>TANK DIAMETER<span style="mso-spacerun:
yes">  </span><?php echo $_POST['diameter']; ?> INCHES<o:p></o:p></span></p>
<p><span><span
style="mso-spacerun: yes">                          </span>TANK LENGTH<span
style="mso-spacerun: yes">  </span><?php echo $_POST['length']; ?> INCHES<o:p></o:p></span></p>

<p><span><span
style="mso-spacerun: yes">                    </span>TOTAL TANK CAPACITY<span
style="mso-spacerun: yes">    </span><?php echo CalcFul($length); ?>  GALLONS<o:p></o:p></span></p>




</TD></TR>
<TR>
<TD align=right><p><span>
<span style="mso-spacerun: yes">   </span>INCHES <span style="mso-spacerun: yes">   </span>
</p></TD><TD align=right><p>GALLONS |
</p></TD><TD align=right><p><span>
 INCHES <span style="mso-spacerun: yes"></span>

</p></TD><TD align=right><p>GALLONS |
</p></TD><TD align=right><p><span>
 INCHES <span style="mso-spacerun: yes"></span>
</p></TD><TD align=right><p>GALLONS |
</p></TD><TD align=right><p><span>
 INCHES <span style="mso-spacerun: yes"></span>
</p></TD><TD align=right><p>GALLONS</span>
</p></TD>
</TR>

<TR><TD COLSPAN=8 align=center>
<p><span><span
style="mso-spacerun: yes">
</span>----------------------------------------------------------------------------<o:p></o:p></span></p>
</TD></TR>
<TR>
<?php

print ("<TD valign=top align=right><p>" . $strcol1 . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol1a . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol2 . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol2a . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol3 . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol3a . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol4 . "</p></TD>");
print ("<TD valign=top align=right><p>" . $strcol4a . "</p></TD>");
?>
</TR>
</TABLE>




</body>
</html>
