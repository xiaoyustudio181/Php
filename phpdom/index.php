<?php
$dom = new DOMDocument();

$dom->loadHTMLFile('a.html');

$result = $dom->getElementById('target');

show_children($result);
#get_parent_children($result);

#��ӡԪ�ص������ӽڵ�
function show_children($tag, $layer = 1)
{
    $space = '';
    for ($i = 1; $i < $layer; $i++) {
        $space .= '&nbsp;&nbsp;';
    }
    foreach ($tag->childNodes as $child) {#����������Ԫ��
        if (hasChild($child)) {#���з��ı�����Ԫ��
            echo $space . '[' . $layer . ']' . $child->nodeName . '<br />';
            $next_layer = $layer + 1;
            show_children($child, $next_layer);
        } elseif ($child->nodeType == XML_ELEMENT_NODE) {#û�з��ı�����Ԫ��
            echo $space . '[' . $layer . ']' . $child->nodeName . '<br />';# (' . $child->nodeValue . ')
        }
    }
}

#���Ԫ���Ƿ�������ı�Ԫ��
function hasChild($element)
{
    if ($element->hasChildNodes()) {
        foreach ($element->childNodes as $child) {
            if ($child->nodeType == XML_ELEMENT_NODE)
            {
                return true;
            }
        }
    }
    return false;
}

#��ӡԪ�صĸ�Ԫ�غ���Ԫ��
function get_parent_children($tag){
    echo '<h4>[children]</h4>';
    foreach ($tag->childNodes as $child) {
        echo $child->nodeName . '<br />';
    }
    echo '<h4>[parent]</h4>';
    $parent=$tag->parentNode;
    echo $parent->tagName;
}

exit;