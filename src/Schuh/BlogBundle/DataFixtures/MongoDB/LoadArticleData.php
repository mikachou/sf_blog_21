<?php

namespace Schuh\BlogBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Schuh\BlogBundle\Document\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $j = 0;
        for ($i = 0; $i <= 3; $i++) {
            foreach ($this->getData() as $data) {
                $article[$j] = new Article();
                $article[$j]->setTitle($data['title']);
                $article[$j]->setText($data['text']);
                $article[$j]->setAuthor($this->getReference('admin-user'));
                $manager->persist($article[$j]);
                $j++;
            }
        }

        $manager->flush();
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
    
    protected function getData()
    {
        $data = array(
            array(
                'title' => 'Le coût des inégalités',
                'text' => <<<EOF
<p style="text-align: justify; padding-left: 90px;">
    <img src="http://3.bp.blogspot.com/-zJN7cmReHSA/Tp3GvM-v74I/AAAAAAAACZo/T12UuAxOf-I/s1600/money.jpg" class="noAlign" style=
    "padding-right: 8px; padding-top: 8px; padding-bottom: 8px; border: 0px solid #000; margin: 0px 0px;" id="il_fi" name="il_fi" height="294" width="520">
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">Stewart Lansley, auteur de <em>The Cost of Inequality: Why Economic Equality is Essential for Recovery</em>, a
    publié trois articles (<a href="http://oecdinsights.org/2012/06/11/inequality-the-crash-and-the-crisis-part-1-the-defining-issue-of-our-times/">ici</a>, <a href=
    "http://oecdinsights.org/2012/06/13/inequality-the-crash-and-the-crisis-part-2-a-model-of-capitalism-that-fails-to-share-the-fruits-of-growth/">là</a> et <a href=
    "http://oecdinsights.org/2012/06/15/inequality-the-crash-and-the-crisis-part-3-the-limit-to-inequality/">encore là</a>) sur le blog de l’OCDE où il examine l'implication des inégalités comme
    source d’instabilité macroéconomique. Il poursuit ainsi les récentes réflexions de <a href=
    "http://illusio.over-blog.com/article-inegalites-et-faiblesse-de-l-epargne-aux-etats-unis-101641232.html">Rajan</a>, de Krugman, ou encore <a href=
    "http://illusio.over-blog.com/article-les-inegalites-sont-elles-responsables-de-la-crise-financiere-102445908.html">de Kumhof et de Rancière</a> sur le sujet. Il rappelle tout d’abord que,
    jusqu’à ces dernières années, les réflexions sur les propriétés déstabilisatrices des inégalités ne furent menées que par les seules franges hétérodoxes des économistes. Ce manque d’intérêt de la
    part des théoriciens orthodoxes s’explique par leur certitude que les inégalités sont une condition nécessaire à l’efficacité économique. L’accélération de la croissance et la réduction des
    inégalités s’excluraient l’une l’autre. Cette vision orthodoxe émergea lors de la crise des années soixante-dix et participa à faire apparaître celle-ci comme la conséquence d’une trop grande
    recherche d’égalité ; une dose accrue d’inégalités pousserait les économies sur un sentier de croissance haussier et soutenable. Cette théorie est mise en application dès la fin des années
    soixante-dix. Les écarts de revenu s’accroissent depuis à des niveaux inobservés durant l’entre-guerre, mais les performances économiques attendues en théorie ne s’actualisent pas. Les taux de
    croissance et de productivité britanniques ne s’élèvent par exemple depuis 1980 qu’au tiers de leur valeur d’après-guerre. En outre, les récessions consécutives à 1979 furent plus sévères que
    celles d’après-guerre.</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">La vue dominante ne considère pas que les inégalités aient joué un rôle dans l'émergence de la crise actuelle.
    Durant deux ans, seule une minorité d’économistes a affirmé que les inégalités constituent sa cause réelle. L’opinion commence toutefois à changer, notamment au sein d’institutions globales
    telles que le FMI ou l’ODCE. <a href="http://www.imf.org/external/pubs/ft/fandd/2011/09/pdf/berg.pdf">Andrew Berg et Jonathan Ostry (2011)</a>, deux économistes du FMI, ont reconnu que l’égalité
    apparaît être un important ingrédient dans la promotion et le soutien de la croissance. Non seulement la hausse des inégalités n’a finalement pas accéléré la croissance, mais les inégalités
    semblent historiquement associées à l’instabilité macroéconomique. Les récessions consécutives à 1929 et 2009 suivent chacune une période où les inégalités se sont fortement accrues, tandis que
    la période prolongée de croissance d’après-guerre est synchrone avec une réduction des inégalités.&nbsp;</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">Pour Lansley, les déformations dans le partage de la valeur ajoutée entre les facteurs de production ont joué un
    rôle moteur dans l’accroissement de l’écart de revenus ces trois dernières décennies. Dans l’après-guerre, un nouveau modèle de capitalisme avait émergé dans les économies développées. La part du
    revenu du travail aux Etats-Unis s’éleva et participa au nivellement des revenus. Le modèle du capitalisme subit une nouvelle transformation à partir des années soixante-dix et la <a href=
    "http://illusio.over-blog.com/article-les-inegalites-de-revenu-aux-etats-unis-100738689.html">distribution des fruits de la croissance fut réorientée</a>. En Grande-Bretagne, alors la part du
    revenu du travail se maintenait entre 58 et 60 % de la valeur ajoutée durant l’après-guerre, elle tombe à 53 % en 2007. La part du travail fut davantage réduite aux Etats-Unis.</span>
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">Parallèlement, les dividendes augmentèrent plus rapidement que le taux de marge.</span> <span style=
    "font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">Les autres pays avancés connurent des évolutions similaires, quoique plus atténuées.&nbsp;</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">La disjonction entre les dynamiques des salaires et de la production a eu plusieurs répercussions adverses sur le
    fonctionnement économique. Tout d’abord, le recul salarial, en réduisant le pouvoir d’achat, entraîna une déflation globale. Les économies ne purent maintenir leur capacité de consommation qu’à
    travers l’explosion de la dette privée. Celle-ci passa par exemple de 45 à 157 % du PIB entre 1981 et 2009 au Royaume-Uni. Le gonflement de la dette aux Etats-Unis alimenta un insoutenable boom
    domestique à partir du milieu des années quatre-vingt-dix.&nbsp; Avant le krach de 1929, le ratio de la dette des ménages sur le revenu nation avait augmenté de 70 points de pourcentage en moins
    d’une décennie. Ensuite, la plus grande concentration des revenus mena à l’apparition d’une vzgue massive de capitaux extrêmement mobile au niveau international. Ces excédents auraient dû
    conduire selon les théoriciens orthodoxes à un boom dans l’investissement productif ; en fait, l’érosion des niveaux de vie et l’accumulation d’excédents de liquidités mondiales furent à
    l’origine des bulles spéculatives qui firent vaciller l’économie globale. Les années vingt avaient également vu la formation de bulles sur les marchés immobiliers et boursiers. Enfin, une
    minorité concentra la richesse et la prise de décision économique, notamment en aiguillonnant les politiques économiques en faveur de ses intérêts. L’accroissement des inégalités n’a pas
    seulement fait basculer l’économie mondiale dans une profonde récession en 1929 et en 2008 ; elle diffère la sortie de crise.</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;"><a href=
    "http://oecdinsights.org/2012/06/15/inequality-the-crash-and-the-crisis-part-3-the-limit-to-inequality/">Stewart Lansley</a> dresse enfin les leçons de ces diverses tendances lourdes. Selon lui,
    la théorie dominante lors de ces trois dernières décennies a échoué à saisir comment fonctionne l’économie. La demande dans la plupart des économies est induite par les salaires et non par les
    profits. Une plus faible part des revenus du travail affaiblit donc la croissance. L’expérience de ces cent dernières années démontre selon lui que les fluctuations du cycle d’affaires sont
    atténuées dans les sociétés les plus égalitaires, tandis qu’elles sont amplifiées dans les sociétés les plus polarisées. Une trop forte déformation de la valeur ajoutée en faveur des plus hauts
    revenus entraîne une déprime de la demande, une hausse de l’endettement et une appréciation des prix d’actifs propres à générer une crise. Les plus riches sont les principaux gagnants de la
    récession. Depuis 2008, les profits et les dividendes ont augmenté, tandis que les salaires réels ont diminué. En 2010, aux Etats-Unis, 10 % des ménages les plus riches se sont accaparés la
    totalité des revenus supplémentaires ; le plus riche pourcent s’est accaparé 93 % de ces nouvelles richesses. Le Royaume-Uni a connu les mêmes dynamiques, moins extrêmes toutefois.</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 10pt;">La sortie de crise et l’orientation de l’économie mondiale sur une trajectoire soutenable implique une réduction des
    inégalités de revenus. La majorité des pays connaissent encore aujourd’hui un niveau d’inégalités incompatible avec la stabilité macroéconomique. Selon Lansley, il importe d’établir une
    répartition plus égale des revenus de marché, c’est-à-dire celle précédant la redistribution. Les gouvernements élus doivent davantage s’impliquer dans la distribution factorielle des revenus et
    la distribution salariale. Le rapport de force doit être réorienté en faveur du travail, notamment en accroissant le pourvoir de négociation salariale. L’imposition doit être davantage
    progressive et les niches fiscales éliminées. De tels changements ne seront pas faciles à mettre en place, notamment en raison de l’opposition qu’ils rencontreront de la part de ceux qui ont le
    plus à perdre, mais ils s’avèrent nécessaires pour faire émerger un modèle de capitalisme soutenable.</span>
  </p>
  <p style="text-align: justify; padding-left: 90px;">
    &nbsp;
  </p>
  <p style="text-align: justify; padding-left: 150px;">
    <span style="font-size: 12pt;"><strong><span style="font-family: tahoma,arial,helvetica,sans-serif;">Références&nbsp; <span style="color: #ffffff;">Martin ANOTA</span></span></strong></span>
  </p>
  <p style="text-align: justify; padding-left: 150px;">
    <span style="font-size: 8pt;"><a href="http://www.imf.org/external/pubs/ft/fandd/2011/09/pdf/berg.pdf"><span style="font-family: tahoma,arial,helvetica,sans-serif;"><strong>BERG, Andrew G., &amp;
    Jonathan D. OSTRY (2011)</strong>, « Equality and Efficiency », in <em>Finance &amp; Development</em>, vol. 48, n° 3.</span></a></span>
  </p>
  <p style="text-align: justify; padding-left: 150px;">
    <span style="font-size: 8pt;"><a href="http://oecdinsights.org/2012/06/11/inequality-the-crash-and-the-crisis-part-1-the-defining-issue-of-our-times/"><span style=
    "font-family: tahoma,arial,helvetica,sans-serif;"><strong>LANSLEY, Stewart (2012a)</strong>, « Inequality, the crash and the crisis. Part 1: The defining issue of our times », in <em>OECD
    Insights</em> (blog), 11 juin.</span></a></span>
  </p>
  <p style="text-align: justify; padding-left: 150px;">
    <span style="font-size: 8pt;"><a href="http://oecdinsights.org/2012/06/13/inequality-the-crash-and-the-crisis-part-2-a-model-of-capitalism-that-fails-to-share-the-fruits-of-growth/"><span style=
    "font-family: tahoma,arial,helvetica,sans-serif;"><strong>LANSLEY, Stewart (2012b)</strong>, « Inequality, the crash and the crisis. Part 2: A model of capitalism that fails to share the fruits
    of growth »</span><span style="font-family: tahoma,arial,helvetica,sans-serif;">, in <em>OECD Insights</em> (blog)</span><span style="font-family: tahoma,arial,helvetica,sans-serif;">, 13
    juin.</span></a></span>
  </p>
  <p style="text-align: justify; padding-left: 150px;">
    <span style="font-size: 8pt;"><a href="http://oecdinsights.org/2012/06/15/inequality-the-crash-and-the-crisis-part-3-the-limit-to-inequality/"><span style=
    "font-family: tahoma,arial,helvetica,sans-serif;"><strong>LANSLEY, Stewart (2012c)</strong>, « Inequality, the crash and the crisis. Part 3: The Limit to Inequality »</span><span style=
    "font-family: tahoma,arial,helvetica,sans-serif;">, in <em>OECD Insights</em> (blog)</span><span style="font-family: tahoma,arial,helvetica,sans-serif;">, 15 juin.</span></a></span>
  </p>			<div class="clear center"></div>     
EOF
                ,
            ), array(
                'title' => 'Un petit mot de droit norvégien',
                'text' => <<<EOF
<p>À la suite d&#8217;un article paru semble-t-il dans la presse russe, le bruit court que la personne soupçonnée des deux attaques terroristes d&#8217;hier encourrait au maximum 21 ans de prison.</p>


<p>Comme la Norvège semble être devenue une nouvelle source d&#8217;incompréhension pour les Français, un peu d&#8217;éclairage.</p>


<p>La Norvège est un pays connaissant une criminalité plutôt basse, notamment les crimes violents&#160;: 0,6 meurtre pour 100.000 habitants, la France étant un pays où on se tue très peu ayant un taux de 1.31 meurtres pour 100.000 habitants (à titre de comparaison&#160;: le record est au Salvador avec 71, les Etats-Unis ont 5.0, le Vatican, Monaco, l&#8217;Islande et Palau étant les 4 pays ayant un score de 0 - mais il suffit qu&#8217;un meurtre se commette à Monaco pour que la Principauté bondisse à 3.1, ce qui est un très mauvais score).</p>


<p>Son droit pénal est très avancé, comme dans les pays scandinaves. Elle a aboli la peine de mort dès 1905 (dernière exécution en 1876), et ne connaît pas la réclusion criminelle à perpétuité.</p>


<p>Pour les crimes les plus graves (et nous allons considérer, pour l&#8217;intérêt de cette note, que commettre en quelques minutes autant de meurtres qu&#8217;il s&#8217;en commet en plus de deux ans entre dans la catégorie des crimes les plus graves), la justice norvégienne peut prononcer deux types de peines&#160;: les peines déterminées et les peines indéterminées.</p>


<p>La peine déterminée est la peine fixée ab initio&#160;: x années de prison. Le maximum prévu par la loi norvégienne est en effet de 21 ans, sachant en outre qu&#8217;au bout d&#8217;un tiers de la peine (soit 7 ans pour le max), la plupart des condamnés bénéficient d&#8217;amples permission de sorties, notamment des libérations sans supervision le week end, et qu&#8217;ils bénéficient d&#8217;une libération conditionnelle aux deux tiers, soit 14 ans, les prisonniers détenus plus de 14 ans étant rarissimes. J&#8217;ajoute que les conditions de détention en Norvège sont sans comparaison avec les culs de basse fosse que la République ose appeler ses prisons.</p>


<p>La peine indéterminée (&#8220;forvaring&#8221; en norvégien, &#8220;confinement&#8221;) vise à incarcérer le condamné jusqu&#8217;à ce qu&#8217;il soit considéré comme n&#8217;étant plus dangereux pour la société. Elle a aussi un maximum théorique de 21 ans et pose un minimum de 10 ans avant de pouvoir bénéficier d&#8217;une libération conditionnelle. S&#8217;il est toujours considéré dangereux, cette libération peut lui être refusée. Au bout de 21 ans, s&#8217;il est considéré comme toujours dangereux, il peut se voir rajouter 5 ans d&#8217;emprisonnement, puis encore 5 ans et ainsi de suite, sans limitation de durée autre que la vie du condamné, donc la prison à vie est théoriquement possible en Norvège. Cependant, le prisonnier, une fois ces 21 ans écoulés, peut être libéré à tout moment s&#8217;il est démontré qu&#8217;il ne constitue plus un danger pour la société. Le forvaring est donc très souple une fois écoulé le délai de 10 ans.</p>


<p>J&#8217;ajoute que tous les excités de la répression en France contempleront avec horreur les statistiques de la criminalité et notamment de la récidive dans ce pays, qui a démontré que traiter les prisonniers de manière humaine est une façon originale et efficace de ne pas les transformer en animaux. Ils pourront toutefois mettre leurs préjugés à l&#8217;abri de toute remise en question en invoquant l&#8217;argument de sociologie de comptoir en disant que la culture scandinave et la nôtre ne sont pas comparables et compatibles. Le même argument déjà sorti pour mettre en doute la capacité génétique d&#8217;une candidate d&#8217;être candidate. La mode est au recyclage.</p>

EOF
            ), array(
                'title' => 'Angleterre: sur la piste du corps du Roi Richard III',
                'text' => <<<EOF
Ces derniers jours, la nouvelle a fait sensation en angleterre: Les archéologues seraient sur la piste de la tombe de Richard III.<br />
<br />
Une étape vient d'être franchie: les chercheurs ont confirmé avoir trouvé le couvent <i>Greyfriars</i> où il est censé avoir été enterré. Il s'agit d'un lieu assez improbable: sous un parking de voitures à Leicester.<br />
<br />
<div class="separator" style="clear: both; text-align: center;">
<a href="http://2.bp.blogspot.com/-4D7b-njsPuA/UEInC_rGZ5I/AAAAAAAAKHo/RE1K5P5-De4/s1600/tombe_richard_3_parking.jpg" imageanchor="1" style="margin-left: 1em; margin-right: 1em;"><img border="0" src="http://2.bp.blogspot.com/-4D7b-njsPuA/UEInC_rGZ5I/AAAAAAAAKHo/RE1K5P5-De4/s1600/tombe_richard_3_parking.jpg" /></a></div>
<div style="text-align: center;">
&nbsp;<span style="font-size: x-small;"><i><b>Richard Buckley</b> de l'Université de Leicester avec un morceau du couvent médiéval qui devrait mener, espère l'équipe, au corps du roi Richard III.</i></span></div>
<div style="background-color: white; border: medium none; color: black; overflow: hidden; text-align: left; text-decoration: none;">
<br /></div>
L'équipe à découvert un entrelac de fenêtre médiévale, des fragments de tuiles de plancher vitrées, une partie de ce qui pourrait être la promenade du cloitre de Greyfriars et un pan de mur.<br />
<br />
Les chercheurs ont creusé deux tranchées de 30 mètres dans le parc à voitures du conseil municipal de Leicester qui est censé recouvrir le site de Greyfriars où Richard a été pris à l'issu de la bataille de Bosworth.<br />
<br />
L'équipe pense que l'Église est le lieu le plus probable pour la sépulture d'un monarque; aussi, la prochaine étape sera de creuser une autre tranchée dans le but de localiser l'église elle-même.<br />
<br />
<br />
<b>Localiser l'église pour retrouver le corps.</b><br />
<br />
<b>Richard Buckley</b>, co-directeur des <a href="http://www.le.ac.uk/ulas/">Services Archéologiques de l'Université de Leicester</a> , a déclaré: "<i>Aujourd'hui, nous avons trouvé les Greyfriars et nous avons découvert des indices alléchants quant à l'emplacement de l'église.
 Elle est située à peu près à l'endroit que nous pouvions espérer</i>.<br />
<i>Notre objectif est de creuser une tranchée en urgence pour voir si ces murs sont ceux de l'église. Si c'est le cas, nous pourrons localiser la zone où Richard III a pu être enterré.</i>"<br />
<br />
<br />
Les chercheurs pensent que le roi Richard III a été enterré dans un couvent franciscain dans la région après avoir été tué par l'armée d'Henri Tudor au cours de la bataille de Bosworth en 1485.<br />
&nbsp;Le couvent a été, cependant, renversé lors de la dissolution des monastères sous Henry VIII, et depuis, l'emplacement exact du site d'enfouissement a été l'un des grands mystères historiques de la Grande-Bretagne.<br />
<br />
C'est après un examen attentif des anciennes cartes que les archéologues ont supposé que le site le plus probable pour l'église était le parking d'un bureau des services sociaux dans le centre de Leicester.<br />
<br />
<br />
<b>Un règne de deux ans...</b><br />
<br />
Richard fut roi d'Angleterre pendant deux ans, de 1483 jusqu'à la bataille de Bosworth.

Sa mort à l'âge de 32 ans a marqué la fin de 30 ans de guerre civile, connue sous le nom de Guerre des deux-Roses, à la fin du moyen âge.<br />
Elle a également marqué le début de la dynastie des Tudor et de la disparition des Plantagenets.<br />
<br />
Ses vêtements et armures ont été enlevés et son corps nu trainé à cheval à Leicester, où le cadavre a été affiché en public pendant trois jours.

Il a ensuite été enterré dans le monastère franciscain, connu sous le nom de Greyfriars. Mais, un peu plus de 50 ans plus tard, l'église fut détruite.<br />
<br />
Selon la légende, le corps a été enlevé et jeté dans la rivière Soar, mais les historiens espèrent prouver le contraire et contester cette version des événements.<br />
<br />
<div class="separator" style="clear: both; text-align: center;">
<a href="http://1.bp.blogspot.com/-ypWsC0Hxm5U/UEzujXQ8DYI/AAAAAAAAKOQ/rBAytDrMsLI/s1600/roi_richard_3.jpg" imageanchor="1" style="margin-left: 1em; margin-right: 1em;"><img border="0" src="http://1.bp.blogspot.com/-ypWsC0Hxm5U/UEzujXQ8DYI/AAAAAAAAKOQ/rBAytDrMsLI/s1600/roi_richard_3.jpg" /></a></div>
<div style="text-align: center;">
<span style="font-size: x-small;"><i>&nbsp;Un portrait du roi Richard III à la cathédrale de Leicester.</i></span></div>
<br />
Les archéologues, de l'Université de Leicester, ainsi que les membres de la Société historique Richard III, espèrent trouver les restes ce qui aidera à changer la façon dont le monarque est considéré sur le plan historique.<br />
<br />
Richard III est traditionnellement considéré comme un tyran qui a assassiné pour faire son chemin vers le trône, bossu et ayant un bras atrophié.

De nombreux historiens affirment cependant qu'une image déformée du roi a été créée délibérément par les Tudors, l'exemple le plus notoire en est la pièce de Shakespeare à son sujet.<br />
<br />
La Société historique Richard III a déclaré qu'elle espérait ces fouilles, qui devraient durer deux semaines, afin de mettre fin à &#171;l'énorme dénigrement&#187; de sa réputation.<br />
<br />
<br />
<b>Espérer trouver des ossements pour les faire parler.</b><br />
<br />
Les archéologues vont commencer par creuser deux longues tranchées de l'autre côté du parking, dans l'espoir de trouver des restes de l'église et de restreindre la recherche.<br />
Ils pourront également utiliser un géoradar pour trouver les meilleurs endroits pour creuser.<br />
<br />
<b>Richard Buckley</b> a déclaré: &#171;Nous ne savons pas exactement où le corps a pu être enterré, mais nous pensons qu'il pourrait être dans le chœur ou près de l'autel.Si des ossements sont découverts, ils seront analysés pour évaluer les traumatismes du squelette.

Richard a été taillé en pièces après avoir été ceinturé et un récit historique suggère que le coup fatal était si fort que des fragments de son casque se sont incrustés dans son crâne.<br />
Ils seront également soumis à une analyse ADN. Les restes seront comparés à l'ADN de Joy Ibsen, une descendante de la 16e génération de Anne d'York, la sœur de Richard III. Mme Ibsen est morte il y a quatre ans, âgée de 82 ans.<br />
<br />
<b>Source</b>:<br />
<ul>
<li><b>Mail online:</b> "<a href="http://www.dailymail.co.uk/sciencetech/article-2196353/Archaeologists-digging-council-car-park-Leicester-confirm-friary-King-Richard-III-believed-buried-in.html">Breakthrough in the search for King Richard III as archaeologists find 'tantalising clues' to the location of his body (and it really could be under a council car park in Leicester)</a>"&nbsp;</li>
</ul>
<br />
EOF
                ), array(
                    'title' => 'La situation sur le marché du travail en France',
                    'text' => <<<EOF
<p>L’économie française fait face à de nombreux déséquilibres dont les deux principaux sont :</p>
<p>- le déficit public qui devrait s’établir fin 2012 à près de 4,5 points de PIB, soit près de 100 milliards d’euros ;</p>
<p>- le déficit d’emplois qui induit un chômage de masse.</p>
<p><span id="more-2478"></span></p>
<p>Si le premier fait l’objet de toutes les attentions, s&#8217;il fut et reste la préoccupation principale pour ne pas dire unique de tous les sommets européens depuis 3 ans et s’inscrit au cœur de la stratégie européenne de sortie de crise, force est malheureusement de reconnaître qu’il n&#8217;en est pas de même pour le second. Or, on est en droit de se demander si la priorité dans un pays aussi riche que la France est réellement de réduire les déficits publics coûte que coûte au risque d’aggraver le sort des plus fragiles et de rendre encore plus difficile l’accès au marché du travail.</p>
<p>Car depuis le début de la crise qui a débuté en début d’année 2008, l’économie française a détruit plus de 300 000 emplois et le nombre de chômeurs a augmenté de 755 000 au sens du Bureau International du Travail, touchant plus de 2 millions 700 mille Français soit 9,6 % de la population active.</p>
<p>Et ce chiffre sous-estime sans aucun doute la réalité : actuellement l’économie française ne crée que des mini jobs à temps partiel et de durée très faible : au cours du dernier trimestre, 4,5 millions de contrats ont été signés : 3 sur 4 sont des contrats de moins de 1 mois (essentiellement de 1 jour à 1 semaine). Ainsi donc, une personne ayant signé ce type de contrat au cours du mois et étant à la recherche d’un emploi à la fin du même mois n’est pas considérée comme chômeur. Leur prise en compte alourdirait le bilan et enfoncerait un peu plus l’économie française dans un chômage de masse.</p>
<p>Par ailleurs, et cela est plus inquiétant, ces chômeurs vieillissent au chômage – le nombre de chômeurs de longue durée continue à exploser – et ce faisant perdent à la fois en termes de compétence mais aussi en termes financier en sortant de l’indemnisation chômage et en tombant dans les minima sociaux ; dans une étude que nous avons effectué à l’OFCE pour l’Observatoire national sur la pauvreté et l’exclusion sociale, nous avons estimé qu’en France, 100 chômeurs supplémentaires au cours de cette crise entraîneraient une augmentation de 45 pauvres en 2012. Ainsi, même une stabilisation du chômage ne serait pas le signe de l’arrêt de la dégradation de la situation des Français, bien au contraire.</p>
<p>Il est donc urgent d’inverser la tendance sur le front de l’emploi et du chômage.</p>
<p>La façon la plus sûre d’y arriver est de remettre l’économie française sur un sentier de croissance dynamique : rappelons qu’une croissance positive mais faible ne suffit pas pour que l’économie française recommence à créer des emplois : compte tenu des gains de productivité, l’activité dans l’hexagone doit progresser de plus de 1% pour  que s’enclenche la spirale des créations d’emplois. Par ailleurs, eu égard à une démographie toujours dynamique et au report de l’âge légal de la retraite, la population active progresse de 150 000 personnes chaque année. Il faut donc créer plus de 150 000 emplois pour que le chômage commence à baisser en France, ce qui correspond à une croissance supérieure à 1,5 %.</p>
<p>Or compte tenu des politiques d’austérité mises en place en France et chez nos partenaires européens, une telle croissance semble inenvisageable en 2012 et en 2013.</p>
<p>Comment alors empêcher le chômage d’exploser à cet horizon ?</p>
<p>La première solution est de changer la stratégie européenne en définissant, entre autres choses, une austérité « plus tempérée ».</p>
<p>La deuxième solution est d’adopter la stratégie allemande au cours de la crise, c’est-à-dire réduire le temps de travail en recourant massivement au travail à temps partiel et aux dispositifs de chômage partiel. Rappelons que 35 % des salariés allemands sont embauchés à temps partiels contre 17 % en France et qu’au cours de la crise 1,6 million d’Allemands sont passés dans un dispositif de chômage partiels contre 235 000 en France, ce qui leur a permis de continuer à réduire le chômage pendant la crise.</p>
<p>La dernière solution vise à recourir au traitement social du chômage. Le secteur privé continuant à détruire des emplois, le secteur public compenserait une partie de ces destructions avec la création d’emplois aidés.</p>
<p>Le gouvernement semble s’engager dans cette dernière voie : 100 000 emplois d’avenir devraient voir le jour en 2013 et 50 000 en 2014.</p>
<p>A court terme, et compte tenu de la conjoncture, cette stratégie semble être la plus efficace et la moins onéreuse. Cependant, à moyen terme, elle ne pourra pas remplacer une politique de croissance.</p>   
EOF
            ), array(
                'title' => 'Symfony 2.1.0 released',
                'text' => <<<EOF
<p>I'm very happy to announce the immediate availability of Symfony 2.1.0.</p>

<p>Since the release of Symfony 2.0, the Symfony community has been hard at work.
We've merged more than 1,100 pull requests for Symfony 2.1 (3,500+ commits),
and more than 6,000 unit tests have been added. The documentation has also
improved a lot and more than 3,000 new lines of documentation have been added.</p>

<p>Symfony2 has been used in production on very large websites for more than 2
years now, and the new Symfony 2.1 brings even more stability and nice
features.</p>

<p>If you have not tried to upgrade yet, first read the
<a href="https://github.com/symfony/symfony-standard/blob/master/UPGRADE.md">UPGRADE</a>
file that comes with Symfony Standard Edition, then the
<a href="https://github.com/symfony/symfony/blob/master/UPGRADE-2.1.md">UPGRADE</a> file
that comes with Symfony.</p>

<p>After upgrading, run the <code>web/config.php</code> script from your browser and the
<code>app/check.php</code> script from the CLI to check if your PHP environment is setup
properly.</p>
EOF
            )
        );
        
        return $data;
    }
}