<?php
require('lib.php');

function projMath($inf, $sup)
{
    $math = new mathLib;
    $tab = array();
    $bornes = array(0, 100, 1, 100, 0, 100, -8, 10);
    $tab += $math->absVal($inf, $sup);
    for ($i = 1, $y = 0; $i < 5; $i++, $y += 2)
    {
        $tab["f".$i."xRect"] = $math->rect($inf, $sup, "func".$i);
        $tab["f".$i."xTrap"] = $math->trap($inf, $sup, "func".$i);
        $tab["f".$i."xSimp"] = $math->simp($inf, $sup, "func".$i);
        $tab["f".$i."xEsp"] = $math->simp($bornes[$y], $bornes[$y + 1], "dens". $i);
        $tab["f".$i."xVari"] = $math->simp($bornes[$y], $bornes[$y + 1], "variance". $i, $tab["f".$i."xEsp"] );
    }
    myAffTab($tab);
}

function value_tab($c, $tab, $color)
{
    for ($i = 1; $i < 5; $i++)
    {
        $nbline = 18;
        for($y = 0; $y < $nbline; $y++)
        {
            echo " ";
            if($y == 6)
            {
                $nbline -= strlen($tab["f".$i."x".$c]);
                echo "\033[3" . $color . "m" . $tab["f".$i."x".$c] . "\033[0m" ;
            }
        }
        echo "|";
    }
}

function border()
{
    echo "\n";
    for ($y = 1; $y < 94; $y++)
        echo "-";
    echo"\n";
}

function myAffTab($tab)
{
    echo "\n \033[36mProjet Math 1    \033[0m \n";
    border();
    echo "| Fonction      |";
    for($i = 1; $i < 5; $i++)
        echo "       fontion " . $i . "  |";
    border();
    echo "| \033[32m Phase 1\033[0m      |";
    value_tab("VA", $tab, 2);
    echo "\n| \033[37mRectangle    \033[0m |";
    value_tab("Rect", $tab, 7);
    echo "\n| \033[34mTrapezes    \033[0m  |";
    value_tab("Trap", $tab, 4);
    echo "\n| \033[31mSimpson    \033[0m   |";
    value_tab("Simp", $tab, 1);
    border();
    border();
    echo "| Densité       |";
    for($i = 1; $i < 5; $i++)
        echo "       densité " . $i . "  |";
    border();
    echo "| \033[32m  Esperance  \033[0m |";
    value_tab("Esp", $tab, 2);
    echo "\n| \033[34m  Variance  \033[0m  |";
    value_tab("Vari", $tab, 4);
    border();
}

projMath(1,2);
?>
