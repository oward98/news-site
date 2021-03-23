<?php

require 'helpers.php';

function NavSidebar() {
    $currentPage = get_post($ID);
    $topAncestorID = getTopAncestorID($currentPage);
    $topAncestor = get_post($topAncestorID);
    $topLink = makePageLink($topAncestor);

    $pages = getChildrenOfPage($topAncestor);
    
    echo "<ul>";
    echo "<span id='navSidebarHeader'>$topLink</span>";
    foreach($pages as $page) {
        echo "<li>";
        $link = makePageLink($page);
        echo $link;
        $children = getChildrenOfPage($page);
            echo "<ul>";
            foreach($children as $child) {
                echo "<li>";
                $childLink = makePageLink($child);
                echo $childLink;
                    echo "<ul>";
                    $grandchildren = getChildrenOfPage($child);
                    foreach($grandchildren as $grandchild) {
                        $grandchildLink = makePageLink($grandchild);
                        echo "<li>$grandchildLink</li>";
                    }
                    echo "</ul>";
                echo "</li>";
            }
            echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";
}