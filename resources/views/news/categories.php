<?php

foreach ($newsList as $key => $name) { ?>
    <a href="categories/<?= $key + 1 ?>"> <?= $name ?> </a>
    <br>

<?php }
?>