<!DOCTYPE html>
<head>
    <title>webserver henk</title>
    <link rel="stylesheet" href="https://raw.githack.com/ahmet1996gs/html/master/henky.css">
</head>
<body>
<table>
<section id="top">
    <header>
        <nav>
            <ul>
                <li><a href="#top">parameters</a></li>
                <li><a href="henkbestuur.html">bestuur henk</a></li>
            </ul>
        </nav>
        <h1>Henk</h1>
    </header>
</section>
<?php

$db_host='oege.ie.hva.nl';
$db_user='orala';
$db_pass='jyEPbjL#R46LNQ'
$db_name='zorala'

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!$conn)
{
die('failed to connect mysql databse' . mysqli_connect_error());
}
&sql = 'select * from parameter';
$query = mysqli_query($conn,$sql);

if(!$query)
{
  die ('error found' . mysqli_error($conn));
}

echo "
<table class='table'>
<tr>
    <th>Eten</th>
    <th>Verveling</th>
    <th>W</th>
</tr>";

while ($row = mysqli_fetch_array($query))
{
echo ' <tr>
    <td>'.$row['Eten'].'</td>
    <td>'.$row['Verveling'].'</td>
    <td>'.$row['w'].'</td>
</tr>;
}

echo"</table>";
?>

<div id="graphDiv1"></div>
<script src="html5-canvas-bar-graph.js"></script>
<script>(function () {


    function createCanvas(divName) {

        var div = document.getElementById(divName);
        var canvas = document.createElement('canvas');
        div.appendChild(canvas);
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        var ctx = canvas.getContext("2d");
        return ctx;
    }

    var ctx = createCanvas("graphDiv1");


    var graph = new BarGraph(ctx);
    graph.maxValue = 110;
    graph.margin = 2;
    graph.colors = ["#F7F390"];
    graph.xAxisLabelArr = ["Eten", "Verveling", "W"];
    setInterval(function () {
        graph.update(Eten, Verveling, W);
    }, 1000);


}());</script>
</body>
</html>