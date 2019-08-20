<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="margin: 0; padding: 0; font-size:14px; font-family: sans-serif; line-height:20px;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900" style="padding:40px; box-shadow: 1px 2px 12px rgba(0,0,0,0.2); margin-top:40px; margin-bottom:40px;">
<tr>
<td>
<?php $logo = $this->common_model->getById("logo", array('id' => 1)); ?>
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr>
  <td width="33.33%" style="max-width:33.33%; vertical-align: bottom;"><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/<?php echo $logo->logo;?>" style="width:100%;"></td>
  <td  align="center" width="33.33%" style="max-width:33.33%;">
  	<h3>INVOICE</h3>
    <strong style="text-decoration: underline; margin-top: 40px; display: inline-block;"><h3 style="margin: 0;">Auth. Distributer :</h3></strong><br>
    Century Veneers, wintuff Plywood
  </td>
  <td width="33%.33" style="max-width:33.33%; vertical-align: bottom;">
  1st Floor , New IT Park Building, Electronic Complex, Pardesipura, Indore, Madhya Pradesh 452010 Tel:0731-4982762, <br> US : +1 (347) 708 0158 Mob : 9827078270<br>Email: info@opulenceinfotech.com 
  </td>
 </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom: 5px;
padding-top: 5px;">
<tr>
  <td><h3>Deals in :</h3></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/win.jpg" style="width:100px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/century.png" style="width:100px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/fevicol.jpeg" style="width:100px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/euro.png" style="width:100px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/royal.png" style="width:100px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/violam.png" style="width:100px;"></td>
 </tr><!--second tr close-->
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" >
<tr>
  <td style="border:1px solid #000; border-radius:10px 0px 0px 0px; width:calc(60% - 5px);float:left; padding:10px 15px; box-sizing: border-box; height: 110px;">
  	<table style="width:100%">
    	<tr><td style="height: 28px;"><b>M/s </b><span><?php echo($customer->customer_name);?></span></td></tr>
        <tr><td style="height: 28px;"><b>Contact :</b><span><?php echo($customer->customer_number);?></span></td></tr>
        <tr><td style="height: 28px;"><b>Party GSTIN No :</b><span><?php echo($customer->gst_number);?></span></td></tr>
  	</table>
  </td>
  <td style="border:1px solid #000; border-radius:0px 10px 0px 0px; width:40%;padding:10px 15px;float:right; box-sizing: border-box; height: 110px;">
  <table >
    <?php $invoice = preg_replace('/[^A-Za-z0-9\-]/', '', $customer->created); ?>
    	<tr >
        <td ><b>Invoice No. :</b><span> <?php echo str_replace('-', '', $invoice).$customer->id; ?></span></td>
      </tr>
      <tr >
        <td><b>Date :</b><span><?php echo date("jS F, Y", strtotime($customer->created)); ?></span></td>
      </tr>
        <tr style="height: 40px;"><td><b>Trans :</b><span>Self</span></td></tr>
  	</table>
  </td>
 </tr>
</table>
<table align="center" border="0" cellpadding="10" cellspacing="0" width="100%" style="margin-top: 5px;     border-bottom: 1px solid;">
<tr bgcolor="#000000" style="color: #fff; margin-top: 4px; margin-bottom: 4px; padding: 8px 0; width: 100%; " align="center">
	<td>S.No.</td>
    <td>Description of Goods</td>
    <td>HSN Code</td>
    <td>Code</td>
    <td>Qty.</td>
    <td>Sq. Mt.</td>
    <td>Rate</td>
    <td>Amount</td>
</tr>
<?php $count = count($customer->product_code);
for ($i=0; $i < $count; $i++) { ?>
<tr align="center" style="height:10px;">
<td style="border-left:1px solid; border-right:1px solid;"><?php echo $i+1; ?></td>
<td style="border-right:1px solid;"><?php echo $customer->product_name[$i][0]; ?></td>
<td style="border-right:1px solid;"><?php echo productcode($customer->product_code[$i][0]); ?></td>
<td style="border-right:1px solid;"><?php echo productcode2($customer->product_code[$i][0]); ?></td>
<td style="border-right:1px solid;"><?php echo $customer->quantity[$i][0]; ?></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"><?php echo $customer->price[$i][0]; ?></td>
<td style="border-right:1px solid;"><?php echo $customer->total[$i][0]; ?></td>
</tr>
<?php  } ?>
<tr align="center" style="height:100px;">
<td style="border-left:1px solid; border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
<td style="border-right:1px solid;"></td>
</tr>
</table>
<table align="center"  cellpadding="10" cellspacing="0" width="100%" >
<tr>
	<td width="63%" style="padding: 0;">
    	<table>
        	<tr>
           	<td> 
              <b>GSTIN - <?php echo($customer->gst_number);?></b><br>
            	<p style="margin:0; width:50%; display:inline-block; float:left;"><span>Bank Detail :</span> Bank of India</p><p style="margin:0; width:50%; display:inline-block; float:left;"><span>A/C No. : 885320110000044</span></p>
              <p style="margin-top:0;width:50%; display:inline-block; float:left;"><span>IFSC No. :</span> Bkid 0008853       </p><p style="margin-top:0;width:50%; display:inline-block; float:left;"><span>Branch Dewas Naka, Indore (M.P.)</p>
            	</td>
            </tr>
            <tr>
            	<td>               
            	</td>
            </tr>
    	</table>   
    </td>
    <td width="30.4%" style="padding: 0;">
    	<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: -73px; background:#fff">
        <tr>
        	<td>
          	<table  cellpadding="4" border="1" cellspacing="0" width="100%">
				      <tr>
                	<td width="33%">Sub Total</td>
                    <td width="33%"><?php echo($customer->subtotal);?></td>
            	</tr>
              <tr>
                	<td>Discount</td>
                    <td><?php echo($customer->discountamt);?></td>
            	</tr>
              <tr>
                  <td>Fright</td>
                    <td><?php echo($customer->fright);?></td>
              </tr>
              <tr>
                	<td>GST</td>
                    <td><?php echo($customer->gstamt);?></td>
            	</tr>
              <tr>
                	<td>G.TOTAL</td>
                    <td><?php echo($customer->grandtotal);?></td>
            	</tr>
     				</table>    
          </td>
    		</tr>
     	</table>       
    </td>
</tr>
</table>
<table width="100%" style="height:50px">
    <tr>
        <td width="63%">&nbsp;
        </td>
        <td width="30.4%">
        <span>For : <?php echo($customer->customer_name);?></span> <b></b>
        </td>
    </tr>     
</table>
<table width="100%" bgcolor="#000000" style="color:#fff; font-size:12px; padding:5px">
    <tr>
        <td>
        <p style="margin:0;line-height: 16px;">Terms & Conditions :</p>
        <p style="margin:0; line-height: 16px;">Interest @21% will be charged if bill is not paid with in 8 days.</p>
        <p style="margin:0; line-height: 16px;">We are not responsible for any loss, damage or breakage during trnsit</p>
        <p style="margin:0; line-height: 16px;">Doods once sold will not be taken back.</p>
        <p style="margin:0; line-height: 16px;">subject to Indore jurisdiction. E.&OE </p>
        </td>
    </tr>     
</table>
</td>
</tr>
</table>
</body>
</html>