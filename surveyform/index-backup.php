<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="NS4FnrReJJ8g3uKyFg0YORliQwJXwDkbO28H0JpXCa8" />
<title>Feedback form | Roof and Building Service</title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div style="margin-left:100px;">
<img src="images/RBS_Logo.jpg" width="421" height="223" style="margin:40px 0px;" />
</div>
<hr />
<div id="content">
<br /><br />
<h1>Customer Satisfaction Survey</h1>

<p>We really appreciate your helping us with this brief customer satisfaction survey.</p>

<p>We know your time is valuable, so we have kept it to a few concise questions so it’ll only take you a moment.</p>

<p><strong>As a way to say "Thank you", we will donate $25.00 to your nominated charity, so that you can help us to give back to our local community.</strong></p>

<img src="images/RACQ-Careflight-Rescue.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Cancer-Council-Logo.jpg" width="250" />
<br />
<br />
<hr />
<br /><br />
<?php if (isset($errorMessage)) echo '<div align="left"><div class="error-box"><h4>Missing information...</h4>'.$errorMessage.'</div></div>'; ?>   
<form name="ContactForm" method="post" action="form_mailer_survey.php" style="margin: 0;">
<input type="hidden" name="redirect" value="survey-thankyou.html" /><input type="hidden" name="subject" value="Roof and Building Satisfaction Survey" />
<table width="772" border="0" cellpadding="3" cellspacing="0">
<!--  <tr class="heading"><td height="37" colspan="3"><strong>Please enter your contact details:</strong></td></tr>
     <tr><td><br /></td></tr>
   <tr><td width="378">Name:*</td>
  <td colspan="2"><input type="text" name="Name" class="textbox" style="width: 200px;" value="<?php //if (isset($_POST['Name'])) echo htmlentities($_POST['Name']); ?>" /></td></tr>
<tr>
  <td width="378">Company Name:*</td>
  <td colspan="2"><input type="text" name="Company_name" class="textbox" style="width: 200px;" value="<?php //if (isset($_POST['Company_name'])) echo htmlentities($_POST['Company_name']); ?>" /></td></tr>
<tr>
  <td>Best Contact Phone:*</td>
  <td colspan="2"><input type="text" name="Phone" class="textbox" style="width: 200px;" value="<?php //if (isset($_POST['Phone'])) echo htmlentities($_POST['Phone']); ?>" /></td></tr>
<tr>
  <td>Email:*</td>
  <td colspan="2"><input type="text" name="Email" class="textbox" style="width: 200px;" value="<?php //if (isset($_POST['Email'])) echo htmlentities($_POST['Email']); ?>" /></td></tr>
<tr>
  <td>Postcode:*</td>
  <td colspan="2"><input type="text" name="Postcode" class="textbox" style="width: 50px;" value="<?php //if (isset($_POST['Postcode'])) echo htmlentities($_POST['Postcode']); ?>" /></td></tr>
<tr><td><br /></td></tr>-->
<tr>
  <td><strong>Question One:</strong></td></tr>    
<tr>
  <td width="378">How did you hear about Roof &amp; Building Service?</td>
 <td colspan="2">
<select name="How_did_you_hear_about_us" class="popup">
<option selected="selected" <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Make your selection') echo ' selected="selected"'; ?>>Make your selection</option>
<option <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Website') echo ' selected="selected"'; ?>>Website</option>
<option <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Hardcopy Brochure') echo ' selected="selected"'; ?>>Hardcopy Brochure</option>
<option <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Emailed Brochure') echo ' selected="selected"'; ?>>Emailed Brochure</option>
<option <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Recommendation') echo ' selected="selected"'; ?>>Recommendation</option>
<option <?php if (isset($_POST['How_did_you_hear_about_us']) and $_POST['How_did_you_hear_about_us'] == 'Other') echo ' selected="selected"'; ?>>Other</option>
</select>
* </td>
</tr><tr><td><br /></td></tr>
<tr>
  <td><strong>Question Two:</strong></td></tr>    
<tr>
<td>Why did you choose Roof &amp; Building Service? </td>
  
  <td colspan="2">
<select name="Why_did_you_choose_us" class="popup">
<option selected="selected" <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Make your selection') echo ' selected="selected"'; ?>>Make your selection</option>
<option <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Professionalism') echo ' selected="selected"'; ?>>Professionalism</option>
<option <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Technical Knowledge') echo ' selected="selected"'; ?>>Technical Knowledge</option>
<option <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Recommendation') echo ' selected="selected"'; ?>>Recommendation</option>
<option <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Scope of works') echo ' selected="selected"'; ?>>Scope of works</option>
<option <?php if (isset($_POST['Why_did_you_choose_us']) and $_POST['Why_did_you_choose_us'] == 'Price') echo ' selected="selected"'; ?>>Price</option>
</select>
* </td>

</tr><tr><td><br /></td></tr>
  <tr>
  <td><strong>Question Three:</strong></td></tr>    
<tr>
  <td colspan="3">Please rate the following aspect of our work on a 1 – 5 scale
    (5 being excellent and 1 being unacceptable):</td>
</tr>
<tr>
<td>Initial reponse</td>
<td colspan="2"><select name="Response_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Response_rating']) and $_POST['Response_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Response_rating']) and $_POST['Response_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Response_rating']) and $_POST['Response_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Response_rating']) and $_POST['Response_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Response_rating']) and $_POST['Response_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr> 
<tr>
<td>Proposal presentation</td>
<td colspan="2"><select name="Proposal_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Proposal_rating']) and $_POST['work_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Proposal_rating']) and $_POST['Proposal_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Proposal_rating']) and $_POST['Proposal_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Proposal_rating']) and $_POST['Proposal_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Proposal_rating']) and $_POST['Proposal_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr>
<tr>
<td>Understanding of your needs</td>
<td colspan="2"><select name="Understanding_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Understanding_rating']) and $_POST['work_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Understanding_rating']) and $_POST['Understanding_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Understanding_rating']) and $_POST['Understanding_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Understanding_rating']) and $_POST['Understanding_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Understanding_rating']) and $_POST['Understanding_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr> 
<tr>
<td>Quality of workmanship</td>
<td colspan="2"><select name="Quality_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Quality_rating']) and $_POST['Quality_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Quality_rating']) and $_POST['Quality_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Quality_rating']) and $_POST['Quality_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Quality_rating']) and $_POST['Quality_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Quality_rating']) and $_POST['Quality_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr>
<tr>
<td>Effectiveness of solutions</td>
<td colspan="2"><select name="Solutions_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Solutions_rating']) and $_POST['Solutions_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Solutions_rating']) and $_POST['Solutions_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Solutions_rating']) and $_POST['Solutions_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Solutions_rating']) and $_POST['Solutions_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Solutions_rating']) and $_POST['Solutions_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr>
<tr>
<td>Level of communication</td>
<td colspan="2"><select name="Communication_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Communication_rating']) and $_POST['Communication_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Communication_rating']) and $_POST['Communication_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Communication_rating']) and $_POST['Communication_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Communication_rating']) and $_POST['Communication_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Communication_rating']) and $_POST['Communication_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*
</td>
</tr><tr><td><br /></td></tr>
<tr><td><strong>Question Four:</strong></td></tr>   
<tr>
<td width="378">Overall how would you rate your experience with Roof &amp; Building Service? </td>
  <td colspan="2"><select name="Experience_rating" class="popup">
<option selected="selected" <?php if (isset($_POST['Experience_rating']) and $_POST['Experience_rating'] == '5') echo ' selected="selected"'; ?>>5</option>
<option <?php if (isset($_POST['Experience_rating']) and $_POST['Experience_rating'] == '4') echo ' selected="selected"'; ?>>4</option>
<option <?php if (isset($_POST['Experience_rating']) and $_POST['Experience_rating'] == '3') echo ' selected="selected"'; ?>>3</option>
<option <?php if (isset($_POST['Experience_rating']) and $_POST['Experience_rating'] == '2') echo ' selected="selected"'; ?>>2</option>
<option <?php if (isset($_POST['Experience_rating']) and $_POST['Experience_rating'] == '1') echo ' selected="selected"'; ?>>1</option>
</select>
*(5 being excellent and 1 being unacceptable)</td></tr>

<tr><td><br /></td></tr>
<tr>
  <td><strong>Question Five:</strong></td></tr>  
<tr>  
<td>Based on performance, how likely would you be to use or recommend Roof &amp; Building Service in the future?</td>

  <td colspan="2"><select name="Give_us_a_recommendation" class="popup">
<option selected="selected" <?php if (isset($_POST['Give_us_a_recommendation']) and $_POST['Give_us_a_recommendation'] == 'Definitely') echo ' selected="selected"'; ?>>Definitely</option>
<option <?php if (isset($_POST['Give_us_a_recommendation']) and $_POST['Give_us_a_recommendation'] == 'Very likely') echo ' selected="selected"'; ?>>Very likely</option>
<option <?php if (isset($_POST['Give_us_a_recommendation']) and $_POST['Give_us_a_recommendation'] == 'Somewhat likely') echo ' selected="selected"'; ?>>Somewhat likely</option>
<option <?php if (isset($_POST['Give_us_a_recommendation']) and $_POST['Give_us_a_recommendation'] == 'Unlikely') echo ' selected="selected"'; ?>>Unlikely</option>
<option <?php if (isset($_POST['Give_us_a_recommendation']) and $_POST['Give_us_a_recommendation'] == 'Very unlikely') echo ' selected="selected"'; ?>>Very unlikely</option>
</select>
*</td></tr>
<tr><td><br /></td></tr>
<tr><td><strong>Question Five:</strong></td></tr> 
<tr>
<td>Any additional thoughts or comments you would like to share with us?</td>
<td width="382">
<textarea name="Other_comments" class="textbox" style="width: 310px; height: 60px; "><?php if (isset($_POST['Other_comments'])) echo htmlentities($_POST['Other_comments']); ?></textarea>
</td></tr>
<tr><td><br /></td></tr> 
<tr>
<td><strong>Name:</strong></td>
<td><input type="text" name="Name" class="textbox" style="width: 200px;" value="<?php if (isset($_POST['Name'])) echo htmlentities($_POST['Name']); ?>" /></td></tr>

<tr><td><strong>Phone number:</strong></td>
<td><input type="text" name="Phone" class="textbox" style="width: 200px;" value="<?php if (isset($_POST['Phone'])) echo htmlentities($_POST['Phone']); ?>" /></td></tr>
<tr><td><br /></td></tr>
<tr>
  <td><strong>Tell us who you would like us to donate $25.00 to, on your behalf:</strong></td>
<td colspan="2"><select name="charity" class="popup">
<option selected="selected" <?php if (isset($_POST['charity']) and $_POST['charity'] == 'Cancer Council Queensland') echo ' selected="selected"'; ?>>Cancer Council Queensland</option>
<option <?php if (isset($_POST['charity']) and $_POST['charity'] == 'Careflight') echo ' selected="selected"'; ?>>Careflight</option>
</select>
*
</td></tr>
<tr><td><br /></td></tr>
<tr><td><input name="submit" type="submit" alt="Download Now Button" style="float: left;" /><div class="whats_this">&nbsp;&nbsp;&nbsp;*Mandatory fields.</div></td></tr>
</table>
</form>
<br /><br /><br />
 </div>

<hr />


<div style="margin-left:100px;"><p>Copyright &copy; 2011 Roof &amp; Building Services. All Rights Reserved.</p> </div>

</body>
</html>