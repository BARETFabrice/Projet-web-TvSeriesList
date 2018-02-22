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
