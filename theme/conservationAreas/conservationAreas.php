<?php
    class ConservationArea {
        public $name;
        public $id;
        public $span;
        public $description;
        public $designated;
        public $significance;
        public $threat;
        public $pageID;

        function __construct($args) {
            $this->name = $args['name'];
            $this->id = $args['id'];
            $this->span = $args['span'];
            $this->description = $args['description'];
            $this->designated = $args['designated'];
            $this->significance = $args['significance'];
            $this->threat = $args['threat'];
            $this->pageID = $args['pageID'];
        }

        function returnCard() {
            ?>
                <a id=<?=$this->id?> aria-label='<?=$this->name?> Conservation Area' class='pagePreview conservationAreaCard' href=<?=get_permalink($this->pageID)?>>
                    <div class='pageThumbnailContainer'>
                    <?=get_the_post_thumbnail($this->pageID, 'full')?>
                    </div>
                    <div class='padded verticalFlex'>
                        <header>
                            <h3><?=$this->name?></h3>
                            <span><?=$this->span?></span>
                        </header>
                        <div class=''>
                            <?=$this->description?>
                        </div>
                        <div class='conservationAreaDetails padded'>
                            <ul class='spaced'>
                                <li>Designated: <?=$this->designated?></li>
                                <li>Significance: <mark class='<?=$this->significance?>Significance'><?=ucfirst($this->significance)?></mark></li>
                                <li>Threat Level: <mark class='<?=$this->threat?>Threat'><?=ucfirst($this->threat)?></mark></li>
                            </ul>
                        </div>
                    </div>
                </a>
            <?php
        }
    }

    $bloomsburyArgs = array (
        "name"=>"Bloomsbury",
        "id"=>"bloomsbury",
        "span"=>"One of the country's most significant conservation areas",
        "description"=>"<p>The Bloomsbury Conservation Area was designated in 1968, just a year after conservation areas were created with the Civic Amenities Act 1967. It is often referred to as an internationally significant example of town planning, with its garden squares, Georgian terraces, and grand buildings being world-famous.</p> <p>Despite being a heritage asset of international importance, the Bloomsbury Conservation Area is under immense threat from irreperable harm due to overdevelopment, and is one of our most at-risk conservation areas.</p>",
        "designated"=>"1968",
        "significance"=>"exceptional",
        "threat"=>"high",
        "pageID"=>1061
    );

    $bloomsburyCA = new ConservationArea($bloomsburyArgs);

    $charlotteStreetArgs = array (
        "name"=>"Charlotte Street", 
        "id"=>"charlotteStreet",
        "span"=>"A dynamic and densely packed conservation area in the heart of Fitzrovia",
        "description"=>"<p>The Charlotte Street Conservation Area makes Fitzrovia what it's famous for. Packed with Georgian terraces with varied independent businesses trading on the ground floors, it is an interesting place to be and to live. It unfortunately has suffered in recent years from a lack of investment in the public realm.</p>",
        "designated"=>"1972",
        "significance"=>"high",
        "threat"=>"medium",
        "pageID"=>1090
    );

    $charlotteStreetCA = new ConservationArea($charlotteStreetArgs);

    $denmarkStreetArgs = array (
        "name"=>"Denmark Street", 
        "id"=>"denmarkStreet",
        "span"=>"Seven centuries of historic London",
        "description"=>"<p>The Denmark Street Conservation Area is home to London's only street with Stuart terraces on both sides. Its winding alleys and streets are an important remnant of medieval London. Thanks to Crossrail and subsequent overdevelopment, it has suffered an immense decline in the quality of the urban fabric, and is our most at-risk conservation area.</p>",
        "designated"=>"1984",
        "significance"=>"medium",
        "threat"=>"high",
        "pageID"=>1092
    );

    $denmarkStreetCA = new ConservationArea($denmarkStreetArgs);

    $fitzroySquareArgs = array (
        "name"=>"Fitzroy Square", 
        "id"=>"fitzroySquare",
        "span"=>"A stately Georgian square in Fitzrovia",
        "description"=>"<p>The Fitzroy Square Conservation Area is home to a marvellous Georgian square designed by the renowned Adam Brothers. It retains some of the most consistent and well-preserved Georgian streets to be found in Central London.</p>",
        "designated"=>"1968",
        "significance"=>"high",
        "threat"=>"low",
        "pageID"=>1094
    );

    $fitzroySquareCA = new ConservationArea($fitzroySquareArgs);

    $hanwayStreetArgs = array (
        "name"=>"Hanway Street", 
        "id"=>"hanwayStreet",
        "span"=>"A curious backwater",
        "description"=>"<p>The Hanway Street Conservation Area is possibly London's smallest conservation area, comprising just two streets. Its curious winding street-pattern is an important remnant of London's pre-Georgian development.</p>",
        "designated"=>"1989",
        "significance"=>"low",
        "threat"=>"high",
        "pageID"=>1096
    );

    $hanwayStreetCA = new ConservationArea($hanwayStreetArgs);

    $kingswayArgs = array (
        "name"=>"Kingsway", 
        "id"=>"kingsway",
        "span"=>"Edwardian commercial magnificence",
        "description"=>"<p>The Kingsway represents one of the most ambitious commercial building projects in London's history. It retains its Edwardian character remarkably well, although is blighted by traffic and has suffered from poor investment in the public realm.</p>",
        "designated"=>"1981",
        "significance"=>"high",
        "threat"=>"low",
        "pageID"=>1098
    );

    $kingswayCA = new ConservationArea($kingswayArgs);

    $sevenDialsArgs = array (
        "name"=>"Seven Dials", 
        "id"=>"sevenDials",
        "span"=>"An icon of heritage-led regeneration",
        "description"=>"<p>The Seven Dials Conservation Area is an exemplar of heritage-led regeneration. After being threatened with demolition in the late sixties, the Seven Dials Trust saved the area and restored it to its former glory, and continue to curate and care for the area</p>",
        "designated"=>"1974",
        "significance"=>"high",
        "threat"=>"low",
        "pageID"=>1100
    );

    $sevenDialsCA = new ConservationArea($sevenDialsArgs);
    
    $conservationAreas = array (
        $bloomsburyCA,
        $charlotteStreetCA,
        $denmarkStreetCA,
        $fitzroySquareCA,
        $hanwayStreetCA,
        $kingswayCA,
        $sevenDialsCA
    )
?>