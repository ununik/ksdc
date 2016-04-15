<?php
$container = '<datalist id="kazatele">';
foreach ($kazani->getAllKazatele() as $kazatel) {
    $container .= '<option value="'.$kazatel['jmeno'].'">';
}
$container .= '</datalist>';

return $container;