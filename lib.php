<?php 

class mathLib {

	public function dens1($x)
	{
	    return (4 * pow($x, 2) * exp(-2 * $x));
	}

	public function dens2($x)
	{
	    return ($x * (3 / (pow($x, 4))));
	}

	public function dens3($x)
	{
	    return (2 * pow($x, 2) * exp(-pow($x, 2)));
	}

	public function dens4($x)
	{
	    return ($x * (1 / sqrt(2 * pi())) * exp(-(1 / 2) * pow(($x - 2), 2)));
	}

	public function func1($x)
	{
	    return (pow($x, 2));
	}

	public function func2($x)
	{
	    return (1 / (1 + $x));
	}

	public function func3($x)
	{
	    return (exp($x));
	}

	public function func4($x)
	{
	    return (sin($x));
	}

	public function variance1($x, $e)
	{
	    return (pow(($x - $e), 2) * (4 * $x * exp(-2 * $x)));
	}

	public function variance2($x, $e)
	{
	    return (pow(($x - $e), 2) * (3 / (pow($x, 4))));
	}

	public function variance3($x, $e)
	{
	    return (pow(($x - $e), 2) * (2 * $x* exp(-pow($x, 2))));
	}

	public function variance4($x, $e)
	{
	    return (pow(($x - $e), 2) * (1 / sqrt(2 * pi())) * exp(-(1 / 2) * pow(($x - 2), 2)));
	}

	public function rect($a, $b, $func)
	{
	    $lib = new mathLib;
	    $res = 0;
	    $n = 20 * ($b - $a);
	    $h = (($b - $a) / $n);
	    for ($index = 0; $index < $n; $index++)
	        $res += $lib->$func($a + $index * $h);
	    return (round($res * $h, 4));
	}

	public function trap($a, $b, $func)
	{
	    $lib = new mathLib;
	    $res = 0;
	    $n = 20 * ($b - $a);
	    $h = (($b - $a) / $n);
	    for ($index = 1; $index < $n; $index++)
	        $res += $lib->$func($a + $index * $h);
	    return (round(($res + ($lib->$func($a) + $lib->$func($b)) / 2) * $h, 4));
	}

	public function simp($a, $b, $f, $e = 1)
	{
	    $lib = new mathLib;
	    $res1 = 0;
	    $res2 = 0;
	    $n = 20 * ($b - $a);
	    $h = ($b - $a) / $n;
	    for ($index = 1; $index < $n; $index++)
	        $res1 += $lib->$f($a + $index * $h, $e);
	    for ($jindex = 0; $jindex < $n; $jindex++)
	    {
	        $xi = $a + $jindex * $h + ($h / 2);
	        $res2 += $lib->$f($xi, $e);
	    }
	    return (round($h / 6 * ($lib->$f($a, $e) + $lib->$f($b, $e) + (2 * $res1) + (4 * $res2)), 4));
	}

	public function absVal($inf, $sup)
	{
	    $res = array();
	    $funcRes = array();
	    for ($x = $inf; $x < $sup + 1; $x++)
	    {
	        $res["f1x".$x] = pow($x, 3)/3;
	        $res["f2x".$x] = log($x + 1);
	        $res["f3x".$x] = exp($x);
	        $res["f4x".$x] = -cos($x);               
	    }
	    $funcRes["f1xVA"] = round($res["f1x2"] - $res["f1x1"], 3);
	    $funcRes["f2xVA"] = round($res["f2x2"] - $res["f2x1"], 3);
	    $funcRes["f3xVA"] = round($res["f3x2"] - $res["f3x1"], 3);
	    $funcRes["f4xVA"] = round($res["f4x2"] - $res["f4x1"], 3);
	    return($funcRes);
	}


}