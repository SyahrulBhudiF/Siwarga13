<?php

/**
 * @param $warga
 * convert TTL
 */
function convertTTL($warga)
{
    $ttl = $warga['ttl'];
    $ttl_parts = explode(',', $ttl);

    $warga['tempat_lahir'] = trim($ttl_parts[0]);
    $warga['tanggal'] = trim($ttl_parts[1]);

    return $warga;
}
