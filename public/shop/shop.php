<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>购物车</title>
    <script src="js/jquery-3.4.1.js"></script>
</head>

<body>

    <div id="item_list">
        <div id="item1">
            <div class="name">名称1</div>
            <div class="price">价格1</div>
            数量<input class="num" value="0" />
            <br />
            <input type="checkbox" />选中
        </div>
        <div id="item2">
            <div class="name">名称2</div>
            <div class="price">价格2</div>
            数量<input class="num" value="0" />
            <br />
            <input type="checkbox" />选中
        </div>
        <div id="item3">
            <div class="name">名称3</div>
            <div class="price">价格3</div>
            数量<input class="num" value="0" />
            <br />
            <input type="checkbox" />选中
        </div>
    </div>
    <button id="sub">确定</button>
    <?php
    if (!empty($_COOKIE['shop'])) {
        showShopCar();
    }


    function showShopCar()
    {
        echo "<br/>";
        echo "购物车中的物品";
        $data = json_decode(json_decode($_COOKIE["shop"]));
        foreach ($data as $info) {
            echo "<br/>";
            foreach ($info as $k => $v) {
                echo $k . " : " . $v;
                echo "&nbsp";
            }
        }
    }
    ?>
    <script>
        $(function() {
            $('#sub').click(function() {
                let data = [];
                $("#item_list > div").each(function() {
                    if ($("input:checkbox", this).is(":checked")) {
                        let $info = $(this);
                        let data_item = {
                            id: $info.get(0).id,
                            name: $info.find(".name").text(),
                            price: $info.find(".price").text(),
                            number: $info.find(".num").val(),
                        };
                        data.push(data_item);
                    };
                });
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8087/shop/index.php",
                    data: {
                        info: JSON.stringify(data)
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            })
        });
    </script>
</body>

</html>