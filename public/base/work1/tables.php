<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script>

        $(function () {


            $("#addBtn").click(function () {

                let username, userpwd;

                username = $("#addUsername").val();
                userpwd = $("#addUserPwd").val();

                $.post('save.php', {
                    username:username,
                    userpwd:userpwd
                }, function (data) {
                    
                    if (data.statusCode == 200) {
                        alert('添加成功');
                    }
                    
                }, 'JSON');

            });

        });

    </script>
    <title>Document</title>
</head>
<body>

<button
    type="button"
    class="btn btn-primary"
    data-toggle="modal"
    data-target="#addModal">
    添加数据
</button>



<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>密码</th>
        <th>操作</th>
    </tr>


</table>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加数据</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名：</label>
                        <input type="text" id="addUsername" class="form-control"  placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密码：</label>
                        <input type="password" id="addUserPwd" class="form-control"  placeholder="密码">
                    </div>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="addBtn">确认添加</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>