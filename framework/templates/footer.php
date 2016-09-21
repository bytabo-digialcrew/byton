<?php
global $enqueuedScripts;
foreach ($enqueuedScripts as $script) {
    echo '<script src="'.$script.'" type="text/javascript"></script>';
} ?>

</body>
</html>