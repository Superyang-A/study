<?php
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'test'
);
$dao=DAOPDO::getSingleton($configs);
$sql="select * from yuan";
$arr=$dao->fetchAll($sql);
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>名字</th>
        <th>密码</th>
        <th>推荐</th>
        <th>操作</th>
    </tr>
    <?php foreach($arr as $key=>$value){ ?>
        <tr>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['passworld'] ?></td>
            <td><?php echo $value['emil'] ?></td>
            <td><a id="<?php echo $value['id'] ?>" href="javascript:void(0)">删除</a></td>
        </tr>
    <?php } ?>
</table>
<script src="jquery.min.js"></script>
<script>
    // 隐式迭代
    $("a").click(function () {
        $id=$(this).attr('id');//获取属性值
        $.ajax({
            url:'in.php',
            type:'post',
            data:{id:$id},
            dataType:'json',
            success:function (data) {
                console.log(data);
                if(data.code==0){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
            }
        })
    })
</script>
</body>
</html>