<?php

if (!isset($_GET["id"])) {
    die("nincs id");
}

$result = Adatlap($_GET["id"]);

$result = mysqli_fetch_assoc($result);

?>

<div class="container py-3">
    <h1 class="text-center display-5">
        <?php echo $result["nev"]; ?>
    </h1>
    <p>
        <?php echo $result["feltet"]; ?>
    </p>
    <?php if ($result["akcios"] == 0) { ?>
        <p style="font-weight: bold;">
            Ez a pizza nem akciós, lehet, hogy jövő héten az lesz!
        </p>
    <?php } else { ?>
        <p style="font-weight: bold;">
            Ez a pizza most a készlet erejéig akciós! - minusz 10%
        </p>
    <?php } ?>
    <p>
        Árak:
    </p>
    <?php if ($result["akcios"] == 0) { ?>
        <ul>
            <li>
                24 cm: <?php echo $result["ar"]; ?> Ft
            </li>
            <li>
                32 cm: <?php echo Ar32($result["ar"]); ?> Ft
            </li>
            <li>
                45 cm: <?php echo Ar45($result["ar"]); ?> Ft
            </li>
        </ul>
    <?php } else { ?>
        <ul>
            <li>
                24 cm: <span style="text-decoration: line-through;"><?php echo $result["ar"]; ?> Ft</span> helyett <span style="color: red; font-weight: bold;"><?php echo AkciosAr($result["ar"]); ?> Ft</span>
            </li>
            <li>
                32 cm: <span style="text-decoration: line-through;"><?php echo Ar32($result["ar"]); ?> Ft</span> helyett <span style="color: red; font-weight: bold;"><?php echo AkciosAr(Ar32($result["ar"])); ?> Ft</span>
            </li>
            <li>
                45 cm: <span style="text-decoration: line-through;"><?php echo Ar45($result["ar"]); ?> Ft</span> helyett <span style="color: red; font-weight: bold;"><?php echo AkciosAr(Ar45($result["ar"])); ?> Ft</span>
            </li>
        </ul>
    <?php } ?>
</div>