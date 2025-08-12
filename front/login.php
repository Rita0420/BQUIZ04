<h2>第一次購物</h2>
<a href="?do=reg"><img src="./icon/0413.jpg" alt=""></a>
<h2>會員登入</h2>

<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['ans']=$a+$b;
            echo $a."+".$b."=";
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>

<script>
    function login(){
        let chk=$("#chk").val();
        $.get("./api/chkAns.php",{chk},(res)=>{
            if(parseInt(res)==1){
                $.get("./api/chkPw.php",{acc:$("#acc").val(),pw:$("#pw").val(),table:"User"},(res)=>{
                    if(parseInt(res)==1){
                        location.href="?";
                    }else{
                        alert("請輸入正確的帳號密碼");
                    }
                })
            }else{
                alert("對不起，你輸入的驗證碼有誤，請重新登入");
            }
        })
    }
</script>