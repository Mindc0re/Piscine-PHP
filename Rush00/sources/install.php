#!/usr/bin/php
<?php
	if (!file_exists("../data"))
		mkdir("../data");
	$fd = fopen("../data/items.csv",'w');
	fwrite($fd, "M4;\"http://14544-presscdn-0-64.pagely.netdna-cdn.com/wp-content/uploads/2012/12/colt_m4_0329111.jpg\";\"The classic M4, emblematic weapon of counter terrorists in Counter-Strike. Good precision, perfect to defend B.\";750
D-Mag.44;\"https://s-media-cache-ak0.pinimg.com/736x/47/a5/f8/47a5f8a341d583ef95fb7db9e9b0e263.jpg\";\"Double Magnum.44. Classic, but efficient. Seen in famous games like the Resident Evil saga.\";550
Kbar-tanto;\"http://www.barringtons-swords.com/media/catalog/product/cache/1/image/1200x1200/9df78eab33525d08d6e5fb8d27136e95/k/a/ka-bar_knives_short_tanto_leather_sheath_kb-1254_image_1.jpg\";\"The Tanto blade shape, of Asian influence, has a thick pointed blade that's good for penetration.\";75
SWMP9;\"https://www.budsgunshop.com/catalog/images/82836_1.jpg\";\"The new Smith and Wesson . Slim, lightweight, good grip, reliable. Perfect for kid's training.\";321
SWM637;\"https://www.budsgunshop.com/catalog/images/26309_2.jpg\";\"One of the most popular self defense revolver on the market, .22 caliber, Smith and Wesson. What else ?\";412
AK47;\"http://media-2.web.britannica.com/eb-media/70/123170-004-E7FBD22B.jpg\"; \"The unique, one and only AK-47, Soviet design ! Now, cyka blyat and rush B !!\";649
Mav88;\"https://www.slickguns.com/sites/default/files/121104_FP4_17a.JPG\";\"Maverick 88, ideal if you want to hunt deers... or people. Man, I just sell the gun.\";206
Horbox;\"https://www.budsgunshop.com/catalog/images/52504.jpg\";\"Hornady box for Winchester, standard. Compatible with any rifle, M4 to AK 47 (normally).\";28
Deagle;\"https://www.budsgunshop.com/catalog/images/95623_1.jpg\";\"The ONE gun to rule them all : the f*cking Deagle. Do I need to say more ? That's what I thought.\";720
Beretta;\"https://www.budsgunshop.com/catalog/images/30865_1.jpg\";\"Beretta, stainless, 9mm, good finish, seen in Resident Evil, perfect for zombie parties.\";698
MossCruiser;\"http://assets.academy.com/mgen/29/10172929.jpg\";\"Mossverg cruiser, excellent shotgun, number one for home protection, perfect for performance, reliability, and power.\";359
HuntsmanKnife;\"http://images.akamai.steamusercontent.com/ugc/774932114796221413/9465FE6CC4214442371C07E36239D3C96A54BD39/?interpolation=lanczos-none&output-format=jpeg&output-quality=95&fit=inside%7C1024:688&composite-to=*,*%7C1024:688&background-color=black\";\"Excellent design, much colors, wow ! Cheaper than in Counter-Strike, no hesitation possible !\";99
Marbleknife;\"http://66.media.tumblr.com/174d5b69fd93efead88ee3e6fe648e3c/tumblr_ns7uufo3Bw1u9i2hbo1_1280.jpg\";\"Wonderful handmade knife, extremely sharp, and wonderful skin. Charisma +50, such style ! Much wow !\";105
Grenadeexp;\"http://www.militaryfactory.com/smallarms/imgs/m61-hand-grenade.jpg\";\"Military grenade, fragmentation, old school, perfect to empty bunkers or kills grouped units\";50
Grenmustard;\"http://thumbs.worthpoint.com/zoom/images1/1/0307/28/inert-hand-grenade-mustard-gas-similar-to_1_0b7baa317da9491fc47dc01cfaafa5b6.jpg\";\"Mustard gas grenade, extremely lethal, be careful with the winds (and the laws ? Kidding...)\";75
C4;\"https://s-media-cache-ak0.pinimg.com/736x/2b/43/0d/2b430d43b7b0e76096aa4f007e767233.jpg\";\"C4, explosive, strong charge, ideal for terrorism. Where to plant it ? Go B of course (A is for retards...).\";120;
Bproofjacket;\"http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/J08AAOxyOlhSsRhH/$_35.JPG?set_id=2\";\"Bulletproof jacket, high resistance, pure kevlar, very important if you want to go to late game\";250
Helmetgasmask;\"http://absolute-health.co.uk/wp-content/uploads/2014/11/gas-mask.jpg\";\"Helmet with gas mask, full protection form many injuries and painful death. And it looks badass, which is nice.\";107
Gatlingammo;\"http://browningmgs.com/AmmoCans/T-Chial/AmmoBoxes2/Box_031-3.jpg\";\"Box full of ammo for gatling, compatible with every model (yes it is, I've seen it in video games).\";34
Rlauncher;\"http://orig08.deviantart.net/e223/f/2012/187/5/6/rpg_7_rocket_launcher__resident_evil_4__by_enfield9346-d566a63.jpg\";\"Rocker launcher, when you have no time for any sh*t. Infinite ammo, because sometimes, f*ck it.\";1200
ZF1pod;\"http://www.propstore.com/content/collectionimages/element/zf1/img2.jpg\";\"For a full explanation -><a href=https://www.youtube.com/watch?v=1Pb1Voc85ac>ZF1pod</a>. Any questions ? Oh, just...Beware of the little red button, and all will be fine.\";42000
Goldeneye;\"http://vignette2.wikia.nocookie.net/jamesbond/images/3/37/Petya_Satellite.png/revision/latest?cb=20120930160856\";\"Goldeneye, a fully operational satellite with plenty options to disturb global economy start wars. Soviet quality.\";346722874
");
	fclose($fd);
	$fd = fopen("../data/categories.csv",'w');
fwrite($fd, "Rifles;M4;AK47
Guns;D-Mag.44;SWMP9;SWM637;Deagle;Beretta
Shotguns;Mav88;MossCruiser
Knives;Kbar-tanto;HuntsmanKnife;Marbleknife
Ammunition;Horbox;Gatlingammo;
Counter-Strike;M4;AK47;Deagle;HuntsmanKnife;Marbleknife;C4
Resident-Evil;Beretta;D-Mag.44;Bproofjacket;Rlauncher
Grenades/explosives;Grenadeexp;Grenmustard;C4
Protection;Bproofjacket;Helmetgasmask
Very big weapons;Rlauncher;ZF1pod;Goldeneye
");
	fclose($fd);
	$fd = fopen("../data/accounts", 'w');

	fwrite($fd, "a:2:{i:0;s:187:\"a:2:{s:5:\"login\";s:11:\"ChuckNorris\";s:6:\"passwd\";s:128:\"6b70e47937a0d965f86e619841b2771637dc44cd1a71d1dacf029b9054e58b18d0871dbd65ab81529475e4797c4b162128ed932c8dae73780d694de8ffabfee5\";}\";i:1;s:188:\"a:2:{s:5:\"login\";s:12:\"TimMcJohnson\";s:6:\"passwd\";s:128:\"6b642a9a7d1ea7e2e3e9d0cecbf0d5c8288ae3860d1a853513b825cfaad98fea35a11516f7877fd056b65cbbe062c17cf6eb764fbe395799a05c36195bfbc02d\";}\";}");
	fclose($fd);
?>
