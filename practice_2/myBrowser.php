<?php

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
}
if (isset($_GET['url']) && !empty($_GET['url'])) {
    $url = $_GET['url'];
}

    if (isset($search)) {
        $cx = "478f2ddeb6dd8409b";
        $api = "AIzaSyAFRl2tj4BQbK13x-MmNkvGKlvo79SYFjE";
        $search_url = str_replace(' ', '+', $search);
        $url = "https://www.googleapis.com/customsearch/v1?key=$api&cx=$cx&q=$search_url";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultJson = curl_exec($ch);
        curl_close($ch);

        $items = json_decode($resultJson, true);
    } elseif (isset($url)) {
        echo "<script>window.location.href = \"$url\";</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KoshaNet</title>
</head>
<body>
<h2>KoshaNet</h2>
<form method="GET" action="myBrowser.php">
    <label for="url">URL:</label>
    <input type="url" id="url" name="url">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search"><br><br>
    <input type="submit" value="Submit">
</form>
<?php
if (isset($search) && isset($items['items'])) {
    ?>  <h2>Search results</h2><?php
        foreach ($items['items'] as $it) {
        ?>
            <div class="item">
                <p class="link"><?php echo $it['displayLink']?></p>
                <p class="title">
                    <a target="_blank" href="<?php echo $it['link']?>">
                        <?php echo $it['title']?>
                    </a>
                </p>
                <p class="desc"><?php echo $it['snippet'] ?></p><br>
            </div>
            <?php
        }
    }

?>
</body>
</html>
