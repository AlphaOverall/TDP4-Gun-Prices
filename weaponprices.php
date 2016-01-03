<?php
header('Content-Type: application/json');
$weapon = $_REQUEST['weapon'];
$discount = $_REQUEST['discount'];
$weapons = array(
          array("Glock 18", "/glock/", 650, 0), array("Colt King Cobra", "/cobra|colt/", 1000, 0),
          array("Gold Eagle", "/gold|eagle/", 0, 26), array("10mm SOP", "/10mm|sop/", 9900, 20),
          array("Mini-Uzi", "/uzi/", 1800, 0), array("Skorpion vz. 61", "/skorpion/", 4000, 0),
          array("MP5", "/mp5/", 4500, 6),array("Calico M960", "/calico|m960/", 3900, 0),
          array("9A-91", "/9a.?91/", 8500, 9), array("PPSh-41", "/ppsh/", 6000, 7),
          array("MP-40", "/mp.?40/", 6000, 7), array("Winchester", "/winchester/", 3500, 0),
          array("Beneli M4", "/ben(a|e)li/", 3900, 0), array("Jackhammer", "/jackhammer/", 9000, 11),
          array("Pop Gun", "/pop.?gun/", 3745, 11), array("AA-12", "/aa.?12/", 21000, 32),
          array("SPAS 12", "/spas/", 45000, 78), array("AK-47", "/ak.?47/", 9900, 7),
          array("M16", "/m16/", 10000, 10), array("Steyr Aug", "/steyr|aug/", 12000, 15),
          array("Assassin", "/as.?as.?in/", 8900, 45), array("OICW XM8", "/oicw|oixw|xm8/", 28000, 85),
          array("M-29 IncisoR", "/m.?29|incisor/", 23800, 25), array("Gauss Rifle", "/gauss/", 39000, 96),
          array("FN-SCAR", "/scar/", 10000, 10), array("WA 2000", "/wa.?2000/", 30000, 75),
          array("Dragunov", "/dragunov/", 40000, 85), array("Barrett", "/bar.?et.?/", 45500, 90),
          array("HK PSG1", "/psg/", 22750, 35), array("CheyTac M200", "/cheytac|m200/", 45000, 75),
          array("VSS Vintorez", "/vss|vintorez/", 60000, 105), array("RPD", "/rpd/", 20000, 15),
          array("M60E4", "/m60e4/", 22000, 20), array("M249 SAW", "/m249|saw/", 22700, 24),
          array("Gatling Gun", "/^((?!medieval).)*gatling/", 43500, 70), array("NEGEV NG7", "/negev|ng7/", 22000, 20),
          array("Laser LGM", "/lgm/", 35000, 30),array("Laser LGH", "/lgh/", 45000, 50),
          array("Plasma Shocker", "/plasma|shocker/", 40900, 70), array("PG Mark 1", "/pg[a-z\s]*1/", 68250, 96),
          array("PSL Pistol", "/psl/", 5600, 0), array("Railgun", "/rail/", 58500, 196),
          array("PG Mark 2", "/pg[a-z\s]*2/", 0, "1-Infinity"), array("H.Z.", "/h.?z.?/", 18200, 32),
          array("6G30", "/6g30|potato/", 27300, 42), array("SMAW", "/smaw/", 33400, 51),
          array("M202A2", "/m2/", 54000, 96),array("Snowman", "/snowman/", 15000, 18),
          array("Cupido Gun", "/cupid/", 15000, 18), array("RPG-32", "/rpg/", 16000, 22),
          array("Jack-x'plosion", "/jack.?x|x.?plosion/", 25000, 35), array("D-Walt Sound [X-M]", "/d.?walt|sound(.?)*x.?m/", 27000, 38),
          array("Thunderbringer", "/thunder|bringer/", 60000, 100), array("Firestarter", "/.starter/", 27000, 52),
          array("Tesla 1945", "/tesla/", 130000, 150), array("Flamethrower", "/flame|thrower/", 45000, 50),
          array("Toxic Gun", "/toxic/", 40000, 55), array("Crossbow", "/cross.?bow/", 14000, 14), array("Demon Hunter", "/demon|hunter/", 20000, 25),
          array("Medieval Gatling Gun", "/med.?e.?val.?gatling/", 35400, 60));
$match = false;
for ($x = 0; $x < sizeof($weapons); $x++) {
  if (preg_match($weapons[$x][1], $weapon)) {
    $match = true;
    $result = "The cost of " . $weapons[$x][0] . " is ";
    $coins = $weapons[$x][2];
    $cash = $weapons[$x][3];
    $sale = "";
    if ($discount) {
      $coins -= floor($coins * ($discount/100));
      if ($cash != "1-Infinity") {
        $cash -= floor($cash * ($discount/100));
      }
      $sale = " with " . $discount . "% discount";
    }
    if ($coins > 0) {
      $result = $result . $coins . " coins";
    }
    if ($cash > 0 || cash == "1-Infinity") {
      if ($coins > 0) {
        $result = $result . " and ";
      }
      $result = $result . $cash . " cash";
    }
    if ($cash == 0 && $coins == 0) {
      $result = $result . "absolutely nada with a 100% discount!";
    }
    else {
      $result = $result . $sale;
    }
    echo json_encode(array("result" => $result));
  }
}
if (!$match) echo json_encode(array("error" => "No weapon named '" . $weapon . "'"));
