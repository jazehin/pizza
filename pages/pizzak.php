<?php

$sql = "SELECT ID, nev, feltet, CASE WHEN akcios = 0 THEN ar ELSE ar * 0.9 END AS ar, akcios FROM pizzak";
if (isset($_GET["orderby"]) && isset($_GET["order"])) {
    $order = $_GET["order"];
    $orderby = $_GET["orderby"];
    $sql = $sql . " ORDER BY " . $orderby . " " . $order;
}
$result = Pizzak($sql);

?>

<div class="container py-3">
    <h1 class="text-center display-5">
        Összes pizzák
    </h1>
    <p>
        <span style="font-weight: bold;">
            Rendezés: 
        </span>
        <a href="./?p=pizzak&orderby=nev&order=ASC">Név szerint növekvő</a>
        <a href="./?p=pizzak&orderby=nev&order=DESC">Név szerint csökkenő</a>
        <a href="./?p=pizzak&orderby=ar&order=ASC">Ár szerint növekvő</a>
        <a href="./?p=pizzak&orderby=ar&order=DESC">Ár szerint csökkenő</a>
    </p>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Név</th>
        <th>Feltétek</th>
        <th>24 cm</th>
        <th>32 cm</th>
        <th>45 cm</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php while ($sor = mysqli_fetch_row($result)) { ?>
        <tr>
            <td><a href="./?p=adatlap&id=<?php echo $sor[0]; ?>"><?php echo $sor[1]; ?></a></td>
            <td><?php echo $sor[2]; ?></td>
            <?php if ($sor[4] == 0) { ?>
                <td><?php echo number_format($sor[3], 0, "", ""); ?> Ft</td>
                <td><?php echo Ar32($sor[3]); ?> Ft</td>
                <td><?php echo Ar45($sor[3]); ?> Ft</td>
                <td></td>
            <?php } else { ?>
                <td><span style="font-weight: bold; color: red;"><?php echo number_format($sor[3], 0, "", ""); ?> Ft</span></td>
                <td><span style="font-weight: bold; color: red;"><?php echo number_format(Ar32($sor[3]), 0, "", ""); ?> Ft</span></td>
                <td><span style="font-weight: bold; color: red;"><?php echo number_format(Ar45($sor[3]), 0, "", ""); ?> Ft</span></td>
                <td><span style="font-weight: bold; color: red;">Akciós</span></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>