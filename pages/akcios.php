<?php

$result = Akcios();

?>

<div class="container py-3">
    <h1 class="text-center display-5 py-2">
        Akciós pizzák
    </h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        <?php while ($sor = mysqli_fetch_array($result)) { ?>
            <div class="col">
                <h2>
                    <a href="./?p=adatlap&id=<?php echo $sor["ID"]; ?>">
                        <?php echo $sor["nev"]; ?>
                    </a>
                </h2>
                <p>
                    <?php echo $sor["feltet"]; ?>
                </p">
                <b>
                    <p class="mb-1">
                        Akciós ár (24 cm):
                    </p>
                </b>
                <p>
                    <span class="text-decoration-line-through">
                        <?php echo $sor["ar"]; ?> Ft</span>
                     helyett 
                    <span style="color: red; font-weight: bold;">
                    <?php echo AkciosAr($sor["ar"]); ?> Ft
                    </span>
                </p>
                <p class="text-end">
                    <a href="./?p=adatlap&id=<?php echo $sor["ID"]; ?>" >
                        További méretek
                    </a>
                </p>
                <hr>
            </div>
        <?php } ?>
    </div>
</div>