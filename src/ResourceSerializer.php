<?php

namespace Aic\Hub\Foundation;

use League\Fractal\Serializer\DataArraySerializer;

class ResourceSerializer extends DataArraySerializer
{
   /**
    * Serialize a collection.
    *
    * @param string $resourceKey
    *
    * @return array
    */
    public function collection(?string $resourceKey, array $data): array
    {
        if ($resourceKey === false) {
            return $data;
        }

        return [$resourceKey ?: 'data' => $data];
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     *
     * @return array
     */
    public function item(?string $resourceKey, array $data): array
    {
        if ($resourceKey === false) {
            return $data;
        }

        return [$resourceKey ?: 'data' => $data];
    }
}
