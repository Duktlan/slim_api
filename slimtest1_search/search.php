<?php
    header("content:text/html; charset=UTF-8");
    //header("content-type:application/json; charset=UTF-8");
    $id = $_GET["id"];
    $name = $_GET["name"];
    $time = $_GET["time"];
    $reward = $_GET["reward"];

    //Get data
    $file =file_get_contents("http://localhost/slimtest/public/index.php/api/show");
    $data = json_decode($file,true);
    $num = count($data);
    //id
    if($id != ''){
        $k = 0;
        for($i = 0; $i < $num; $i++){
            if($data[$i]['id'] == $id){
                $data[$k]['id']=$data[$i]['id'];
                $data[$k]['name']=$data[$i]['name'];
                $data[$k]['time']=$data[$i]['time'];
                $data[$k]['reward']=$data[$i]['reward'];
                $k = $k+1;
            }
        }
        $num = $k;
        echo "id=";
        echo $id;
        echo "    ";
    }
    //name
    if($name != ''){
        $k = 0;
        for($i = 0; $i < $num; $i++){
            if($data[$i]['name'] == $name){
                $data[$k]['id']=$data[$i]['id'];
                $data[$k]['name']=$data[$i]['name'];
                $data[$k]['time']=$data[$i]['time'];
                $data[$k]['reward']=$data[$i]['reward'];
                $k = $k+1;
            }
        }
        $num = $k;
        echo "name=";
        echo $name;
        echo "    ";
    }

    //time
    if($time != ''){
        $k = 0;
        for($i = 0; $i < $num; $i++){
            if($data[$i]['time'] == $time){
                $data[$k]['id']=$data[$i]['id'];
                $data[$k]['name']=$data[$i]['name'];
                $data[$k]['time']=$data[$i]['time'];
                $data[$k]['reward']=$data[$i]['reward'];
                $k = $k+1;
            }
        }
        $num = $k;
        echo "time=";
        echo $time;
        echo "    ";
    }
    //reward
    if($reward != ''){
        $k = 0;
        for($i = 0; $i < $num; $i++){
            if($data[$i]['reward'] == $reward){
                $data[$k]['id']=$data[$i]['id'];
                $data[$k]['name']=$data[$i]['name'];
                $data[$k]['time']=$data[$i]['time'];
                $data[$k]['reward']=$data[$i]['reward'];
                $k = $k+1;
            }
        }
        $num = $k;
        echo "reward=";
        echo $reward;
        echo "    ";
    }
    /*for($i = 0; $i < $num; $i++){
        print_r($data[$i]);
        echo '</br>';
        }*/
    echo "共有";
    echo $num;
    echo "筆資料";
?>


<title>
    api_search
</title>  
<head>
    <meta charset="UTF-8">
</head>     
<body bgcolor = "#99FFFF">
    <style>
        table, th, td {
            border: 1px solid #888888;
            border-collapse: collapse;
            }
        th, td {
            padding: 15px;
            }
        th, td {
            text-align: center;
            }
    </style>
    <table style="width:100%">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>time</th>
            <th>reward</th>
        </tr>
        <?php
            for($i=0;$i<$num;$i++){
                echo "<tr>";
                echo "<td>{$data[$i]['id']}</td>";
                echo "<td>{$data[$i]['name']}</td>";
                echo "<td>{$data[$i]['time']}</td>";
                echo "<td>{$data[$i]['reward']}</td>";
                echo "<tr>";
            }
        ?>
</body>