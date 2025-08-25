<?php
$type=$_GET['type']??0;
$nav='全部商品';
if($type!=0){
    $row=$Types->find($type);
    if($row['big_id']==0){
        $nav=$row['name'];
        $items=$Item->all(['big'=>$type,'sh'=>1]);
    }else{
        $big=$Types->find($row['big_id']);
        $nav=$big['name']." > ".$row['name'];
        $items=$Item->all(['mid'=>$type,'sh'=>1]);
    }
}else{
    $items=$Item->all(['sh'=>1]);
}



?>

<h2><?=$nav;?></h2>

<?php
foreach($items as $item):
?>
<div style="display:flex;margin-top:1vh;">
    <div class="pp ct" style="width: 50%;padding:10px">
    <a href="?do=detail&id=<?=$item['id'];?>">
        <img src="./images/<?=$item['img'];?>" style="width:150px;height:100px">
    </a>    
    </div>
    <div style="width: 50%;">
        <table style="width: 100%;height:100%">
            <tr class="tt">
                <td><?=$item['name'];?></td>
            </tr>
            <tr class="pp">
                <td>
                    價錢:<?=$item['price'];?>
                    <a href="?do=buycart&id=<?=$item['id'];?>&qt=1" style="float: right;">
                        <img src="./icon/0402.jpg" alt="">
                    </a>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    規格:<?=$item['spec'];?>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    簡介:<?=mb_substr($item['intro'],0,20);?>...
                </td>
            </tr>
        </table>
    </div>
</div>
<?php endforeach;?>