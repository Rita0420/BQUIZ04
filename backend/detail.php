
<h2 class="ct">訂單編號<span style="color: red;"><?=$_GET['no'];?></span>的詳細資料</h2>
<?php
$order=$Orders->find(['no'=>$_GET['no']]);
?>
<table class="all">
    <tr>
        <td class="tt ct">會員帳號</td>
        <td class="pp"><?=$order['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?=$order['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?=$order['email'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?=$order['addr'];?></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><?=$order['tel'];?></td>
    </tr>
</table>

<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $cart=unserialize($order['items']);
    foreach($cart as $id => $qt):
        $item=$Item->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$item['name'];?></td>
        <td><?=$item['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$item['price'];?></td>
        <td><?=$item['price']*$qt;?></td>
    </tr>
    <?php endforeach;?>
</table>
<div class="ct">
    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>