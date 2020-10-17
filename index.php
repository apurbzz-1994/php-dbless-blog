<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snippets from my secret folder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

    <!--Primary skeleton-->
    <div class="container-fluid">
        <div class="row">
            <!--This is the mobile header-->
            <div class = "col-12 col-md-3 col-lg-3 d-md-none d-lg-none" style="background-color: black;">
                <!--This is the title bar/ navbar-->
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-2">
                        <div  id="mobile-side-bar-title">
                            <h1><i class="fas fa-folder-open"></i></h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-10">
                        <div  id="mobile-side-bar-title" class="squeeze-text">
                            <h5>Snippets from my secret folder</h5>
                        </div>
                    </div>
                </div>
                <div id="mobile-side-bar-paragraph">
                    <p>A collection of snippets and anecdotes kept away in a secret folder of my computer</p>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 side-bar d-none d-md-block d-lg-block d-xl-block">
                <!--This is the title bar/ navbar-->
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-2">
                        <div class="side-bar-title">
                            <h1><i class="fas fa-folder-open"></i></h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-10">
                        <div class="side-bar-title">
                            <h5>Snippets from my secret folder</h5>
                        </div>
                    </div>
                </div>
                <div class="side-bar-paragraph">
                    <p>A collection of snippets and anecdotes kept away in a secret folder of my computer</p>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <!--Main body-->
                    <?php
                    // get the directory of the blogposts
                    $directoryPath = dirname($_SERVER["SCRIPT_FILENAME"]) . "/blogposts";
                    $directory = opendir($directoryPath);
                    // setting timezone to australia, melbourne
                    date_default_timezone_set('Australia/Melbourne');
                    $fileArray = [];
                    $timeStampArray = [];
                    $sortedFileArray = [];

                    // getting all the filenames in an array
                    while($file = readdir($directory)){
                        if($file == "." || $file ==".." || $file == ".DS_Store")continue;
                        $fileFullPath = $directoryPath . "/" . $file;
                        array_push($fileArray, $file);
                        array_push($timeStampArray, filectime($fileFullPath));
                    }

                    // sort the array according to latest
                    array_multisort($timeStampArray, SORT_DESC, $fileArray);
                    ?>
                    <div class = "row" style="margin-bottom: 3em;">    
                        <?php for($i = 0; $i < count($fileArray); $i++){ 
                            $fileFullPath = $directoryPath . "/" . $fileArray[$i];
                            $fileContent = file_get_contents($fileFullPath);

                            ?>
                            <!--Render blog post-->
                            <div class="col-12 col-md-6 col-lg-6" style="margin-top: 3em;">
                                <div class="blog-post">
                                    <div class="row">
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <div>
                                                <h2>Entry#<?= count($fileArray) - $i  ?></h2>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2 col-lg-2">
                                            <div>
                                                <!--display icon based on day or night-->
                                                <?php
                                                $dayNightState = date("A", $timeStampArray[$i]);
                                                if($dayNightState == "AM"){ ?>
                                                    <i class="fas fa-sun"></i>
                                                    <i class="fas fa-mug-hot"></i>
                                                <?php } else{ ?>
                                                    <i class="fas fa-moon"></i>
                                                    <i class="far fa-star"></i>
                                                <?php } ?>    
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    // <-------GENERATING BLOG TAGS----------->
                                    //stripping off the .txt at the end
                                    $onlyFileName = explode(".", $fileArray[$i]);

                                    $tagsArray = explode(" ", $onlyFileName[0]);
                                    // concatenating all tags
                                    foreach($tagsArray as $eachTag){
                                        // getting rid of underscore, if present
                                        $aTag = str_replace("_", " ", $eachTag);?>
                                    <span class="tags"><?= $aTag ?></span>
                                    <?php } ?>
                                    <div style = "margin-top: 1em;">
                                        <p><?= $fileContent ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <?php closedir($directory); ?>
            </div>
        </div>
    </div>
</body>
</html>