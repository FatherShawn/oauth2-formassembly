<?php
/**
 * @author Shawn P. Duncan <code@sd.shawnduncan.org>
 * @date   8/2/17,  6:41 AM
 *
 * @brief FormAssembly does not support Resource Owner but the League abstract client requires it.
 *
 * Copyright 2017 by Shawn P. Duncan.  This code is
 * released under the GNU General Public License.
 * Which means that it is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * http://www.gnu.org/licenses/gpl.html
 */

namespace Fathershawn\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class ResourceOwnerUnsupported implements ResourceOwnerInterface {

    /**
     * Returns null.
     *
     * @return mixed
     */
    public function getId()
    {
        return null;
    }

    /**
     * Returns an empty array.
     *
     * @return array
     */
    public function toArray()
    {
        return [];
    }

}