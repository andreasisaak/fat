<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Use FAT and finding the right font awesome icons for your project in seconds.">
    <link rel="shortcut icon" href="http://fontawesome.io/assets/ico/favicon.ico">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css">
    <title>FAT - Font Awesome Tags</title>
</head>
<body>

<header>
    <div class="inside">
        <h1>FAT</h1>

        <h2>Font Awesome Tags</h2>

        <p>Finding the right font awesome icons for your project can be quite hard.</p>

        <p>That's why I started to tag most of the icons with common names like "email" for <span><i class="fa fa-envelope"></i> fa-envelope</span></p>

        <p>You can search the tags through <span>STRG + F</span> or <span><i class="fa fa-apple"></i> + F</span>.</p>

        <p>Please help and send me your own tag suggestions as a issue on <span><a target="_blank" href="https://github.com/andreasisaak/fat/issues"><i class="fa fa-github"></i> Github</a></span></p>
    </div>
</header>

<div id="container">
    <div class="inside">
        <?php
        $arrIconsRaw = yaml_parse_file('icons.yml');
        $arrAliasesRaw = yaml_parse_file('aliases.yml');

        $arrIcons = array();
        foreach ($arrIconsRaw['icons'] as $arrIconRaw) {
            $arrIcons[$arrIconRaw['id']] = $arrIconRaw;
        }

        $arrAliase = array();
        foreach ($arrAliasesRaw['aliases'] as $arrAliaseRaw) {
            $arrAliase[$arrAliaseRaw['icon']] = $arrAliaseRaw;
        }

        $result = array_merge_recursive($arrAliase, $arrIcons);
        ksort($result);
        ?>
        <ul class="icon-list">
            <?php foreach ($result as $entries): ?>
                <li>
                    <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icon/<?php echo $entries['id']; ?>">
                        <i class="fa fa-<?php echo $entries['id']; ?>"></i>fa-<?php echo $entries['id']; ?>
                    </a>

                    <div class="unicode"><span>&amp;#x<?php echo $entries['unicode']; ?>;</span></div>
                    <?php if (count($entries['aliases']) > 0): ?>
                        <div><?php foreach ($entries['aliases'] as $alias): ?><span><?php echo trim($alias); ?></span><?php endforeach; ?></div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<footer id="footer" class="footer hidden-print">
    <div class="inside">
        <p>This is an unofficial fan project from <a target="_blank" href="https://twitter.com/andreasisaak">Andreas Isaak!</a> <br/>
            Thanks to <a target="_blank" href="https://twitter.com/davegandy">Dave Gandy</a> for the great Font Awesome Icons!</p>

        <p class="icons">
            <a target="_blank" href="https://github.com/FortAwesome/Font-Awesome"><i class="fa fa-github"></i> Font Awesome Github</a>
            <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/"><i class="fa fa-globe"></i> Font Awesome Website</a>
        </p>

        <p class="icons"><a target="_blank" href="https://github.com/andreasisaak/fat"><i class="fa fa-github"></i> FAT Github</a></p>
    </div>
</footer>

</body>
</html>
