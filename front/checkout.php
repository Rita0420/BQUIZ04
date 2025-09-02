<?php
$user = $User->find(['acc' => $_SESSION['login']]);
?>
<h2 class="ct">填寫資料</h2>
<form action="./api/save_order.php" method="post" id="myForm">
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp">
                <?php echo $user['acc']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?php echo $user['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" id="email" value="<?php echo $user['email']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp">
                <input type="text" name="addr" id="addr" value="<?php echo $user['addr']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">連絡電話</td>
            <td class="pp">
                <input type="text" name="tel" id="tel" value="<?php echo $user['tel']; ?>">
            </td>
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
        $sum = 0;
        foreach ($_SESSION['cart'] as $id => $qt):
            $item = $Item->find($id);
        ?>
            <tr class="pp ct">
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['no']; ?></td>
                <td><?php echo $qt; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['price'] * $qt; ?></td>
            </tr>
        <?php
            $sum += $item['price'] * $qt;
        endforeach; ?>
    </table>

    <div class="all tt ct">總價:<?php echo $sum; ?></div>
        <input type="hidden" name="total" value="<?=$sum;?>">
    <div class="ct">
        <input type="button" value="確定送出" onclick="submitForm()">
        <input type="button" value="返回繼續修改" onclick="location.href='?do=buycart'">
    </div>
</form>

<script>
    function submitForm() { 
        alert("訂購成功\n感謝您的選購");
        $("#myForm").submit();
    };
</script>