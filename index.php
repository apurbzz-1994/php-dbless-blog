<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dbless Blog</title>
</head>
<body>
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
    <ul>    
        <?php foreach($fileArray as $eachFile){ 
            // getting file content 
            $fileFullPath = $directoryPath . "/" . $eachFile;
            $fileContent = file_get_contents($fileFullPath);

            // generating blog tags

            //stripping off the .txt at the end
            $onlyFileName = explode(".", $eachFile);

            $tagsArray = explode(" ", $onlyFileName[0]);
            $tagString = "";
            // concatenating all tags
            foreach($tagsArray as $eachTag){
                // getting rid of underscore, if present
                $aTag = str_replace("_", " ", $eachTag);
                $tagString = $tagString . "," . $aTag;
            }

            ?>
            <li><?= $fileContent ?> <b>Tags: </b> <?= $tagString ?></li>
        <?php }?>
    </ul>
    <?php closedir($directory); ?>

</body>
</html>