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

    <dt>++++++++++++++++++++++++++++++++++++++++++++++</dt>
    <dt>++++++++++++++++++++++++++++++++++++++++++++++</dt>

    <dt>function_exists</dt>
    <dd>
        <?php
        var_dump(function_exists('f1'));//true
        ?>
    </dd>
    <dd>
        <?php
        var_dump(function_exists('f2'));//false
        ?>
    </dd>

    <?php class Person{
        private function eat(){}
    }?>
    <dt>class_exists</dt>
    <dd>
        <?php
        var_dump(class_exists('Person'));//true
        ?>
    </dd>
    <dd>
        <?php
        var_dump(class_exists('Person2'));//false
        ?>
    </dd>

    <dt>method_exists</dt>
    <dd>
        <?php
        var_dump(method_exists(new Person(),'eat'));//true
        ?>
    </dd>
    <dd>
        <?php
        var_dump(method_exists(new Person(),'eat2'));//false
        ?>
    </dd>
</dl>
</body>
</html>