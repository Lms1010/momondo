<?php
    require_once __DIR__."/_x.php";
    require_once __DIR__."/comp_header.php";


?>
     <?php
require_once __DIR__.'/comp_hardcoded_content.php';
?>


    <form id="frm_image_upload" onsubmit='return false'>
        <input type="file" name="image">
        <button onclick='uploadImage()'> Upload Image</button>
    </form>

<?php
require_once __DIR__.'/comp_footer.php';
?>