<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    $admins=$Admin->all();
    foreach($admins as $admin):
    ?>
    <tr class="pp ct">
        <td><?=$admin['acc'];?></td>
        <td><?=str_repeat("*",mb_strlen($admin['pw']));?></td>
        <td>
            <?php if($admin['acc']!='admin'):?>
            <button onclick="location.href='?do=edit_admin&id=<?=$admin['id'];?>'">修改</button>
            <button data-id="<?=$admin['id'];?>" class="del-btn">刪除</button>
            <?php else:?>
                此帳號為最高權限
            <?php endif;?>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<div class="ct"><button onclick="location.href='index.php'">返回</button></div>


<script>
    $(".del-btn").on("click",function(){
        let id=$(this).data("id");
        if(confirm(`確定要刪除這筆資料嗎?`)){
            $.post("./api/del.php",{id,table:'Admin'},()=>{
                location.reload();
            })
        }
    })
</script>