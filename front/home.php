<?php
$nav="全部商品";

if(!empty($_GET["type"])){
    $type=find("type",$_GET["type"]);
    if($type['parent']==0){
        $nav=$type['text'];
        $items=all("goods",["main"=>$type['id'],"sh"=>1]);
    }else{
        $big=find("type",$type['parent']);
        $nav=$big['text'] . " > " . $type["text"];
        $items=all("goods",["sub"=>$type['id'],"sh"=>1]);
    }
}else{
    $items=all("goods",["sh"=>1]);
}

echo "<h2>". $nav ."</h2>";

   foreach ($items as $i) {
        ?>
        <table class="all">
            <tr>
                <td class="pp ct" rowspan="4" width="40%">
                    <a href="index.php?do=detail&id=<?=$i['id'];?>">
                        <img src="./img/<?=$i['file'];?>" style="width: 80%;height:150px">
                    </a>
                </td>
                <td class="tt ct"><?=$i['name'];?></td>
            </tr>
            <tr>
                <td class="pp">價格: <?=$i['price'];?>
                <a href='index.php?do=buycart&id=<?=$i['id'];?>&qt=1' style="float:right;"><img src="./icon/0402.jpg" alt=""> </a>
                 </td>
            </tr>
            <tr>
                <td class="pp">規格: <?=$i['spec'];?></td>
            </tr>
            <tr>
                <td class="pp">簡介: <?=mb_substr($i['intro'],0,20,"utf8");?>...</td>

            </tr>
        </table>

    <?php    
    }
    


?>