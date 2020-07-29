<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<?php include('calculator.inc.php'); ?>
<head>
<title>Calculator</title>
  <meta name="description" content="Storage tanks for solids, liquids, or gases." />
  <meta name="keywords" content="storage tanks, tank equipment" />
  <!--[if IE]>
    <link href="../theme/css/ie.css" rel="stylesheet" type="text/css" />
  <![endif]-->

  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script>
  /*  Lets change the form to show the appropriate
   *  form fields to calculate a triangle
   */

  </script>

</head>

<body>

<div id="container">

  <div class="clear"></div>
  <div class="wpcf71">
  <form action="" method="post" class="wpcf7-form" novalidate="novalidate">
  <div class="row">
  <div class="col"></div>
  <div class="col-10 center">
  <h4 class="red">Tank Chart Calculator</h4>
  <p class="left">This tank chart capacity program will allow you to calculate tank charts* for tanks with flat heads. All physical dimensions must be supplied in inches.</p>
  </div>
  <div class="col">
  </div>
  </div>
  <div class="row">
  <div class="col"></div>
  <div class="tankCalcLeft col-5">
  <h6 class="red">Tank Orientation</h6>
  <p>  <span class="wpcf7-form-control-wrap tank-orientation">
    <span class="wpcf7-form-control wpcf7-radio">
      <span class="wpcf7-list-item first">
    <input type="radio" name="hv" value="h" checked="checked" id="tank-orientation">
      <span class="wpcf7-list-item-label">Horizontal</span></span>
      <span class="wpcf7-list-item last">
        <input type="radio" name="hv" value="v" id="tank-orientation">
        <span class="wpcf7-list-item-label">Vertical</span></span></span></span>
        <span class="wpcf7-list-item last">
          <input type="radio" class='rectangle' name="hv" value="r" id="tank-orientation">
          <span class="wpcf7-list-item-label">Rectangle</span></span></span></span>
  </p></div>
  <div class="tankCalcRight col-5">
  <h6 class="red">Output Increment</h6>
  <p>  <span class="wpcf7-form-control-wrap output-increment"><span class="wpcf7-form-control wpcf7-radio"><span class="wpcf7-list-item first">
    <input type="radio" name="increment" value="0.125" checked="checked" id="output-increment"><span class="wpcf7-list-item-label">1/8 in.</span></span><span class="wpcf7-list-item">
    <input type="radio" name="increment" value="0.25" id="output-increment"><span class="wpcf7-list-item-label">1/4 in.</span></span><span class="wpcf7-list-item">
    <input type="radio" name="increment" value="0.5" id="output-increment"><span class="wpcf7-list-item-label">1/2 in.</span></span><span class="wpcf7-list-item last">
    <input type="radio" name="increment" value="1" id="output-increment"><span class="wpcf7-list-item-label">1 in.</span></span></span></span>
  </p>
  </div>
  <div class="col"></div>
  </div>
  <div class="row">
  <div class="col"></div>
  <div class="tankCalcBottom col-10">
  <h6 class="red">Tank Dimensions</h6>


  <span class="wpcf7-form-control-wrap length-height">
  <input type="number" name="length" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Length/Height (verticals)" id="length-height">
  </span>
  <br>
  <p class='circleP'>
    <span class="wpcf7-form-control-wrap tank-dimensions">
    <input type="number" name="diameter" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Diameter (ie - 96)" id="tank-dimensions">
    </span><br>
  </p>

  <p class='rectangleP' style='display:none;'>
    <span class="wpcf7-form-control-wrap tank-dimensions">
    <input type="number" name="width" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Width" id="width">
    </span>
    <br>
    <br>
    <span class="wpcf7-form-control-wrap tank-dimensions">
    <input type="number" name="height" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Height" id="height">
    </span>
  </p>
  <div class="col-12 center">
  <input type="submit" value="Calculate" name="tank-calc-submit" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span><p></p>
    <input type="hidden" name="calculator-submitted" value="true" id="calculator-submitted">
  <p class="blue">*Chart accuracy is not guaranteed</p>
  </div>
  </div>
  <div class="wpcf7-response-output wpcf7-display-none"></div>
  <div class="col"></div>
  </div>
  </form>
  </div>



  <div style="height:30px; background-color:#fff;"></div>
  <div class="clear"></div>

  <div id="content">
<!--end header-->
<div id="content-sub">
    <h1 class="red">Calculator Results</h1>




<form action="calculatorprint.php" method="post" target="_new">
 <input type=hidden name="hv" value="<?php echo $HV;?>">
 <input type=hidden name="increment" value="<?php echo $_POST['increment'];?>">
  <input type=hidden name="diameter" value="<?php echo $_POST['diameter']; ?>">
  <input type=hidden name="length" value="<?php echo $_POST['length']; ?>">

  <input type="submit" name="Print" value="Print Friendly Version" /></form>


<body lang=EN-US style='tab-interval:.5in'>
<p><span><B><U>Attention:</U></B> <BR>Newberry Tanks &amp; Equipment, Inc. does not guarantee
the charts accuracy and in no way takes liability for loss due to its content.</p>
<div class=Section1>
<TABLE border=0 cellpadding=4><TR><TD COLSPAN=8>


<p><span><span
style="mso-spacerun: yes">                     </span>
<?php
if($HV == "h")
echo "HORIZONTAL";
elseif($HV == "v")
echo "VERTICAL";
?>
 TANK CALIBRATION CHART<o:p></o:p></span></p>


<p><span><span style="mso-spacerun: yes"></span><span style="mso-spacerun: yes">
</span>TANK DIAMETER<span style="mso-spacerun: yes">
</span><?php echo $_POST['diameter']; ?> INCHES<o:p></o:p></span>
</p>
<p><span><span style="mso-spacerun: yes"></span>TANK LENGTH<span
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



<p>&nbsp;</p>




</div>

<?php var_dump($_POST); ?>

<!--begin footer-->
    </div>


<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script>
  $('input[name=hv]').click(function(){
    console.log('hv changed.');
    if($('.rectangle').is(':checked')) {
     //alert("it's checked");
     $('.circleP').hide();
     $('.rectangleP').show();
     $("input[name='length']").attr('placeholder', 'Length');
   }else{
   $('.rectangleP').hide();
   $('.circleP').show();
   $("input[name='length']").attr('placeholder', 'Length/Height (verticals)');
   }
  });
</script>
</body>
</html>
