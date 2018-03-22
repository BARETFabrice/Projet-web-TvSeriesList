<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurLangue.php';
$langue=controlleurLangue::getLangue();
?>
    <footer>
        <div id="divLangue">
            <form action="" method="post" id=formLangue>
                <select name='changeLanguage' onchange='this.form.submit();'>
                     <option <?php if($langue == 'fr_CA')echo 'selected'; ?> value='fr_CA'>Français</option>
                     <option <?php if($langue == 'en_CA')echo 'selected'; ?> value='en_CA'>English</option>
                </select>
            </form>
        </div>
        
        
        
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LSPNXMEKZAAZW">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
        
        
        <div id="copyright">
			<p><?php echo _('@ 2018 Team FFA')?></p>
		</div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
