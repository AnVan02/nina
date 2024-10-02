<!DOCTYPE html>
<html lang="<?=$config['website']['lang-doc']?>">
<head>
    <?php include TEMPLATE.LAYOUT."head.php"; ?>
    <?php include TEMPLATE.LAYOUT."css.php"; ?>
</head>
<body>
    <div id="wrapper" <?php if($source!='index') echo 'class="wrapin"'?>>
        <header>
        <?php
            include TEMPLATE.LAYOUT."seo.php";
            include TEMPLATE.LAYOUT."header.php";
            
        ?>
        </header>
        <main>
        <?php 
            if($source=='index') include TEMPLATE.LAYOUT."slide.php";
            else include TEMPLATE.LAYOUT."breadcrumb.php";
        ?>
        <div class="wrap-main <?=($source=='index')?'wrap-home':''?> w-clear"><?php include TEMPLATE.$template."_tpl.php"; ?></div>
        </main>
        <footer id="footer">
            <?php include TEMPLATE.LAYOUT."footer.php";?> 
        </footer>
        <?php
            include TEMPLATE.LAYOUT."combogoidien.php";
            include TEMPLATE.LAYOUT."menu_mb.php";
            include TEMPLATE.LAYOUT."modal.php";
            include TEMPLATE.LAYOUT."js.php";
        ?>
    </div>
</body>
</html>