<?php
$item=$Item->find($_GET['id']);
?>
<h2 class="ct"><?=$item['name'];?></h2>

<div style="display:flex;margin:auto;margin-top:1vh;width:80%">
    <div class="pp ct" style="width: 50%;padding:10px">
    <a href="?do=detail&id=<?=$item['id'];?>">
        <img src="./images/<?=$item['img'];?>" style="width:100%;height:100%">
    </a>    
    </div>
    <div style="width: 50%;">
        <table style="width: 100%;height:100%">
            <tr class="pp">
                <td>分類:</td>
            </tr>
            <tr class="pp">
                <td>
                    編號:<?=$item['no'];?>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    價錢:<?=$item['price'];?>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    詳細說明:<?=$item['intro'];?>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    庫存:<?=$item['stock'];?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="tt ct" style="width:80%;margin:auto">
    購買數量:
    <input type="number" name="qt" id="qt" value="1">
    <a href="?do=buycart&id=<?=$item['id'];?>">
        <img src="./icon/0402.jpg" alt="">
    </a>
</div>