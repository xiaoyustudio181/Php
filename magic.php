<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<dl>
    <dt>__FILE__</dt>
    <dd><?=__FILE__?></dd>

    <dt>__DIR__</dt>
    <dd><?=__DIR__?></dd>

    <dt>__LINE__</dt>
    <dd><?=__LINE__?></dd>

    <dt>__FUNCTION__</dt>
    <dd>
        <?php
        function f1(){
            echo __FUNCTION__;
        }
        f1();
        ?>
    </dd>
</dl>
</body>
</html>