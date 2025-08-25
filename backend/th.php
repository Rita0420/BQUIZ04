<?php
if(!empty($_POST)){
    $Types->save($_POST);
}
?>
<h2 class="ct">商品分類</h2>
<div>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addBig()">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="selBig" id="selBig">
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="addMid()">新增</button>
</div>

<table class="all">
    <?php
    $bigs=$Types->all(['big_id'=>0]);
    foreach($bigs as $big):
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button class="edit-btn" data-id="<?=$big['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$big['id'];?>">刪除</button>
        </td>
    </tr>
    <?php 
    if($Types->count(['big_id'=>$big['id']])>0):
        $mids=$Types->all(['big_id'=>$big['id']]);
        foreach($mids as $mid):
    ?>
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td>
            <button class="edit-btn" data-id="<?=$mid['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$mid['id'];?>">刪除</button>
        </td>
    </tr>
    <?php endforeach;
          endif;
          endforeach;?>
</table>



<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_item'">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $items=$Item->all();
    foreach($items as $item):
    ?>
    <tr class="pp ct">
        <td><?=$item['no'];?></td>
        <td><?=$item['name'];?></td>
        <td><?=$item['stock'];?></td>
        <td>
            <?php
            echo ($item['sh']==1)?"販售中":"已下架";
            ?>
        </td>
        <td>
            <button onclick="location.href='?do=edit_item&id=<?=$item['id'];?>'">修改</button>
            <button data-id="<?=$item['id'];?>" class="del-btn">刪除</button>
            <button data-id="<?=$item['id'];?>" class="up-btn">上架</button>
            <button data-id="<?=$item['id'];?>" class="down-btn">下架</button>
        </td>
    </tr>
    <?php endforeach;?>
</table>
</div>

<script>
    getBigs();
    function addBig(){
        let big=$("#big").val();
        $.post("?do=th",{name:big,big_id:0},(res)=>{
            $("#big").val("");
            getBigs();
        })
    }
    function addMid(){
        let mid=$("#mid").val();
        let big_id=$("#selBig").val();
        $.post("?do=th",{name:mid,big_id},(res)=>{
            location.reload();
        })
    }

    function getBigs(){
        $.get("./api/get_bigs.php",(option)=>{
            $("#selBig").html(option);
        })
    }

    $(".del-btn").on("click",function(){
        let id=$(this).data("id");
        if(confirm(`確定要刪除這筆分類資料嗎?`)){
            $.post("./api/del.php",{id,table:'Types'},()=>{
                location.reload();
            })
        }
    })

    $(".up-btn , .down-btn").on("click",function(){
        let id=$(this).data("id");
        let action=$(this).text();
        let sh=1;
        switch (action) {
            case '上架':
                sh=1;
                break;
            case '下架':
                sh=0;
                break;
        
            default:
                break;
        }

        $.post("./api/sw.php",{id,sh},()=>{
            // location.reload();
            $(this).parent().prev().text(sh==1?"販售中":"已下架");
        })
    })

    $(".edit-btn").on("click",function(){
    let id=$(this).data("id");
    let name=$(this).parent().prev().text();
    let newName=prompt("請輸入新的分類名稱",name);
    if(newName != null){
        $.post("./api/save_type.php",{id,name:newName},()=>{
            $(this).parent().prev().text(newName);
            //location.reload();
        })
    }

})
    
</script>