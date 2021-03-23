<?php

function filterTitle($title) {
    $conservationAreas = Array (
        "Bloomsbury Conservation Area",
        "Charlotte Street Conservation Area",
        "Denmark Street Conservation Area",
        "Fitzroy Square Conservation Area",
        "Hanway Street Conservation Area",
        "Kingsway Conservation Area",
        "Seven Dials Conservation Area"
    );
    if (in_array($title, $conservationAreas)) {
        return str_replace(" Conservation Area", "", $title);
    } else {
        return $title;
    }
}

function makePageLink($page) {
    $pageTitle = $page->post_title;
    $pageTitleFiltered = filterTitle($pageTitle);
    $pageLink = get_permalink($page);
    return "<a href=$pageLink>$pageTitleFiltered</a>";
}

function getChildrenOfPage($page) {
    $args = array(parent => $page->ID);
    $children = get_pages($args);
    return $children;
}

function getTopAncestorID($page) {
    $ancestorIDs = get_post_ancestors($page->ID);
    if (sizeof($ancestorIDs) == 0) {
        return $page->ID;
    } else {
        $ancestorIDsOrdered = array_reverse($ancestorIDs);
        $topAncestorID = $ancestorIDsOrdered[0];
        return $topAncestorID;
    }
}