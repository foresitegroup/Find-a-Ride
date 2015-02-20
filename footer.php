  </div> <!-- END content -->

  <div id="sidebar">
    <div id="menu-side-wrap">
      Use the menu below by clicking on the option you'd like more information on.<br>
      <?php include "menu-side.php"; ?>
    </div> <!-- END menu-side-wrap -->

    <div id="questionnaire-wrap">
      <img src="images/Transportation-Questionnaire.jpg" alt="Transportation Questionnaire" class="title">

      To see your available transportation options, please use the form below:<br>
      <br>

      <script type="text/javascript">
        function checkRadio(field) { for(var i=0; i < field.length; i++) { if(field[i].checked) return field[i].value; } return false; }

        function checkform (form) {
          if (form.city.selectedIndex == 0) {
            alert('Please select a city.');
            form.city.focus();
            return false;
          }
          if (checkRadio(form.sixtyfive) == "") {
            alert('Please select yes or no to the question "Are you 65 years or older?".');
            return false;
          }
          if (checkRadio(form.sixtyfive) == "Y" && checkRadio(form.wc_sixtyfive) == "") {
            alert('Please select yes or no to the question "Do you use a wheelchair?".  Or select no to the question "Are you 65 years or older?".');
            return false;
          }
          if (checkRadio(form.disability) == "") {
            alert('Please select yes or no to the question "Are you an adult with a disability?".');
            return false;
          }
          if (checkRadio(form.disability) == "Y" && checkRadio(form.wc_disability) == "") {
            alert('Please select yes or no to the question "Do you use a wheelchair?".  Or select no to the question "Are you an adult with a disability?".');
            return false;
          }
          return true ;
        }
      </script>

      <form action="questionnaire.php" method="POST" onsubmit="return checkform(this)">
        <div>
          <strong>In what city/town do you live?</strong>
          <select name="city" class="select">
            <option value="">Select...</option>
            <?php
            $result = mysql_query("SELECT * FROM options GROUP BY city ASC");
            while ($row = mysql_fetch_array($result)) {
              echo "<option value=\"" . $row['city'] . "\">" . $row['city'] . "</option>\n";
            }
            ?>
          </select><br>
          <br>

          <strong>Are you 65 years or older?</strong>
          <span class="radio">
            <input type="radio" name="sixtyfive" value="Y" id="sY"> Yes
            <input type="radio" name="sixtyfive" value="N" id="sN"> No<br>
          </span>

          <div id="wc_sixtyfive">
            <strong>Do you use a wheelchair?</strong>
            <span class="radio">
              <input type="radio" name="wc_sixtyfive" value="Y" class="wcsf"> Yes
              <input type="radio" name="wc_sixtyfive" value="N" class="wcsf"> No
            </span>
          </div>
          <br>

          <strong>Are you an adult with a disability?</strong>
          <span class="radio">
            <input type="radio" name="disability" value="Y" id="dY"> Yes
            <input type="radio" name="disability" value="N" id="dN"> No<br>
          </span>

          <div id="wc_disability">
            <strong>Do you use a wheelchair?</strong>
            <span class="radio">
              <input type="radio" name="wc_disability" value="Y" class="wcd"> Yes
              <input type="radio" name="wc_disability" value="N" class="wcd"> No
            </span>
          </div>
          <br>

          <input type="image" src="images/submit.jpg" style="float: right;" onMouseOver="javascript:this.src='images/submit-h.jpg';" onMouseOut="javascript:this.src='images/submit.jpg';">
          <div style="clear: both;"></div>
        </div>
      </form>
    </div> <!-- END questionnaire-wrap -->
  </div> <!-- END sidebar -->
  <?php if ($PageTitle == "") echo "</div> <!-- END home -->"; ?>

  <div style="clear: both;"></div>
</div> <!-- END content-wrap -->

<div id="content-bottom"></div>

<div id="footer">
  &copy; <?php echo date("Y"); ?> Interfaith Senior Programs, Inc. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="contact.php">Contact</a>&nbsp;&nbsp; <a href="disclaimer.php">Disclaimer</a> &nbsp;&nbsp; <a href="privacypolicy.php">Privacy Policy</a> &nbsp;&nbsp; <a href=".">Home</a>
</div> <!-- END footer -->

<div id="mobile-menu">
  <?php include "menu-side.php"; ?>
</div>

<ul id="mobile-footer">
  <li><a href="."><img src="images/mobile-home.png" alt=""><br>Home</a></li>
  <li style="width: 34%;"><a href="<?php echo substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>" onclick="document.cookie = 'MobReff=full;path=/';"><img src="images/mobile-display.png" alt=""><br>Full Site</a></li>
  <li><a href="contact.php"><img src="images/mobile-mail.png" alt=""><br>Contact</a></li>
</ul> <!-- END mobile-footer -->

<div style="display: none;">
  <img src="images/search-submit-h.gif" alt="">
  <img src="images/menu-how-to-h.png" alt="">
  <img src="images/menu-help-paying-h.png" alt="">
  <img src="images/menu-meals-services-h.png" alt="">
  <img src="images/menu-resource-guide-h.png" alt="">
  <img src="images/menu-questionnaire-h.png" alt="">
  <img src="images/submit-h.jpg" alt="">
</div>

</body>
</html>