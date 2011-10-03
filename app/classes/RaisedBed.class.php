<?php

/**
 * @author Justin Burger <justin@loudisrelative.com>
 *
 * A Raised bed is defined as one of many areas within a garden which can be planted. The user has the ability to
 * change the size and segments of a raised bed.
 */
class RaisedBed extends Garden{
    /** Height Of the raised bed in Pixels */
    private $height;

    /** Width Of the raised bed in Pixels */
    private $width;

    /** Number of roles this bed is split into */
    private $row;

    /** Number of columns this bed is split into */
    private $columns;

    /** Name of this raised bed */
    private $name;

    /** Short description for this raised bed */
    private $description;

    /** Garden this raised bed is part of. */
    private $garden_id;

    /** Identifier for this raised bed. */
    private $bed_id;

    /** Last time this raised bed was modified */
    private $modified_ts;

    /** Who last modified this raised bed. */
    private $modified_by;

    /** Array of Sqft Objects. */
    private $sqft_items;
}
